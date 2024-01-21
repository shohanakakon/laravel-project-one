<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SuperAdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DivisionController;
use App\Http\Controllers\DistrictController;
use App\Http\Controllers\ThanaCorntroller;
use App\Http\Controllers\UpazillaController;

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
//frontend
Route::get('/', [HomeController::class,'index']);
Route::get('/admin', [HomeController::class,'admin']);

//backend

Route::get('/admin', [AdminController::class,'index']);
Route::post('/admin-dashboard', [AdminController::class,'showDashboard']);
Route::get('/dashboard', [SuperAdminController::class,'dashboard']);
Route::post('/logout', [SuperAdminController::class,'logout']);

//division

Route::resource('/division',DivisionController::class);
Route::get('/div-status/{division}', [DivisionController::class,'changeStatus']);

//district
Route::resource('/district',DistrictController::class);
Route::get('/dic-status/{district}', [DistrictController::class,'changeStatus']);

//thana
Route::resource('/thana',ThanaCorntroller::class);
Route::get('/than-status/{thana}', [ThanaCorntroller::class,'changeStatus']);

//upazilla
Route::resource('/upazilla',UpazillaController::class);
Route::get('upa-status/{upazilla}',[UpazillaController::class,'changeStatus']);
