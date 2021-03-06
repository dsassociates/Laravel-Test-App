<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CompanyController;
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

Route::get('login',function(){
    return View::make ('login');
});

Route::post('login',[LoginController::class, 'authenticate'])->name('login');
Route::post('logout',[LoginController::class, 'logout'])->name('logout');


Route::group(['middleware' => ['auth']], function () { 
    Route::get('dashboard',[DashboardController::class, 'index'])->name('dashboard');
    Route::resource('company',  CompanyController::class);
    Route::resource('employee',  EmployeeController::class);
});