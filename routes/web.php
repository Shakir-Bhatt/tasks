<?php

use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });

// Auth::routes();

use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\TodoListController;


Route::group(['prefix' => 'employees'],function(){
Route::get('/', [EmployeeController::class, 'employees'])->name('employees');
    Route::get('/{id}', [EmployeeController::class, 'view'])->name('employee.view');
});

Route::group(['prefix' => 'todo'],function(){
    Route::get('/', [TodoListController::class,'index'])->name('todo.index');
    Route::post("/task", [TodoListController::class,'store'])->name('todo.store');
    Route::get("/{id}/complete", [TodoListController::class,'complete'])->name('todo.complete');
    Route::get("/{id}/delete", [TodoListController::class,'destroy'])->name('todo.destroy');
});

