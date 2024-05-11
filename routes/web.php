<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('pass',[AuthController::class, 'pass']);

Route::get('date',[AuthController::class, 'calculateDaysBetweenDates']);

Route::post('admin-login',[AuthController::class, 'authlogin']);

Route::group(['middleware'=>'admin'],function()
{
    Route::get('admin/dashboard',[AuthController::class, 'dashboard']);
    Route::get('admin/addjobs',[AuthController::class, 'addjobs']);
    Route::post('admin/insert-job',[AuthController::class, 'insertjob']);

    Route::get('admin/testapi',[AuthController::class, 'testapi']);
    Route::get('admin/testnumber',[AuthController::class, 'testnumber']);
    Route::get('admin/viewjob',[AuthController::class, 'viewjobs']);
    Route::get('admin/pdf/{id}',[AuthController::class, 'viewpdf']);
    

    
  
});
