<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HotelController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\RoomTypeController;



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


Route::get('/login',[LoginController::class, 'index'])->name('login');
Route::post('/login',[LoginController::class, 'store'])->name('login');


Route::post('/logout',[LogoutController::class, 'store'])->name('logout');

Route::get('/dashboard',[DashboardController::class, 'index'])->name('dashboard');

Route::get('/hotel',[HotelController::class, 'index'])->name('hotel.index');
Route::get('/datatable-hotel',[HotelController::class, 'datatable'])->name('hotel.datatable');
Route::get('/hotel/{id}',[HotelController::class, 'getone'])->name('hotel.getone');
Route::post('/add-hotel',[HotelController::class, 'store'])->name('hotel.store');
Route::post('/update-hotel/{id}',[HotelController::class, 'update'])->name('hotel.update');
Route::post('/delete-hotel/{id}',[HotelController::class, 'destroy'])->name('hotel.delete');

// Route::get('/api/v1/hotels',[HotelController::class, 'datatable'])->name('api.hotels.index');






Route::get('/room',[RoomController::class, 'index'])->name('room');


Route::get('/room_type',[RoomTypeController::class, 'index'])->name('room_type');


