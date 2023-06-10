<?php

namespace App\Http\Controllers;
use App\Models\Employee;

use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function list(){
        $employees = Employee::select('id', 'name', 'department', 'email', 'net_salary', 'deduct_salary', 'created_at')
        ->get(); 

        return view('employee.list', compact('employees'));
    }

    public function add(){
        return view('employee.add');
    }

    public function store(Request $req){
        $employee = new Employee;
        $employee->name = $req->name;
        $employee->department = $req->department;
        $employee->email = $req->email;
        $netSalary = 0;
        $deductionSalary = 0;
        if(isset($req->net_salary))
        {
            for($i=0; $i < count($req->net_salary); $i++){
                $netSalary = $netSalary + $req->net_salary[$i];
                $deductionSalary = $deductionSalary + $req->deduct_salary[$i];
            }
        }

        $employee->net_salary = $netSalary;
        $employee->deduct_salary = $deductionSalary;

        if($employee->save()){
            return redirect('employee/list');
        }
    }

    public function delete(Request $req){
        $employee = Employee::find($req->id);

        if($employee->delete()){
            return back();
        }
    }
}
