<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::get('employee/list', [EmployeeController::class, 'list']);
Route::get('employee/add', [EmployeeController::class, 'add']);
Route::post('employee/store', [EmployeeController::class, 'store']);
Route::post('employee/delete', [EmployeeController::class, 'delete']);