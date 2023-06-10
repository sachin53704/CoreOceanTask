<!DOCTYPE html>
<html lang="en">
  <head>
      <title>Bootstrap Example</title>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
      <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
  </head>
  <body>
      <div class="container mt-2">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <div class="d-flex justify-content-between">
                  <h5>Employee List</h5>
                  <a href="{{url('employee/add')}}" class="btn btn-primary btn-sm">Add</a>
                </div>
              </div>
              <div class="card-body">
                <table class="table">
                  <thead>
                    <tr>
                      <th>Sr No.</th>
                      <th>Name</th>
                      <th>Department</th>
                      <th>Email</th>
                      <th>Net Salary</th>
                      <th>Deduct Salary</th>
                      <th>Date</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                      @php $count = 1; $netSalary = 0; $deductSalary = 0; @endphp
                      @foreach($employees as $employee)
                    <tr>
                        <td>{{$count++}}</td>
                        <td>{{$employee->name}}</td>
                        <td>{{$employee->department}}</td>
                        <td>{{$employee->email}}</td>
                        <td>{{$employee->net_salary}}</td>
                        <td>{{$employee->deduct_salary}}</td>
                        <td>{{date('d-m-Y', strtotime($employee->created_at))}}</td>
                        <td>
                          <form action="{{url('employee/delete')}}" method="post">
                            @csrf
                            <input type="hidden" name="id" value="{{$employee->id}}" />
                            <button onclick="return confirm('Are you sure you want to remove')" class="btn btn-sm btn-danger">Remove</button>
                          </form>
                        </td>
                    </tr>
                    @php 
                      $netSalary = $netSalary + $employee->net_salary;
                      $deductSalary = $deductSalary + $employee->deduct_salary;
                    @endphp
                      @endforeach
                  </tbody>
                  <thead>
                    <tr>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th>{{$netSalary}}</th>
                      <th>{{$deductSalary}}</th>
                      <th></th>
                      <th></th>
                    </tr>
                  </thead>
                </table>
              </div>
            </div>
          </div>
        </div>
          
      </div>

  </body>
</html>
