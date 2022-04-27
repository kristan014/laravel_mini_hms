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

Route::get('/hotels',[HotelController::class, 'index'])->name('hotels.index');
Route::get('/datatable-hotels',[HotelController::class, 'datatable'])->name('hotels.datatable');
Route::get('/hotels/{id}',[HotelController::class, 'getone'])->name('hotels.getone');
Route::post('/add-hotels',[HotelController::class, 'store'])->name('hotels.store');
Route::post('/update-hotels/{id}',[HotelController::class, 'update'])->name('hotels.update');
Route::post('/delete-hotels/{id}',[HotelController::class, 'destroy'])->name('hotels.delete');

// Route::get('/api/v1/hotels',[HotelController::class, 'datatable'])->name('api.hotels.index');






Route::get('/rooms',[RoomController::class, 'index'])->name('rooms');


Route::get('/room_types',[RoomTypeController::class, 'index'])->name('room_types');


