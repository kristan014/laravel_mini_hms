<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\BranchController;
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



Route::prefix('branches')->group(function () {

    Route::get('/',[BranchController::class, 'index'])->name('branches.index');
    Route::get('/datatable',[BranchController::class, 'datatable'])->name('branches.datatable');
    Route::get('/get-one/{id}',[BranchController::class, 'getone'])->name('branches.getone');
    Route::post('/create',[BranchController::class, 'store'])->name('branches.store');
    Route::put('/update/{id}',[BranchController::class, 'update'])->name('branches.update');
    Route::delete('/delete/{id}',[BranchController::class, 'destroy'])->name('branches.delete');
});
// Route::get('/api/v1/hotels',[BranchController::class, 'datatable'])->name('api.hotels.index');



Route::prefix('room_types')->group(function () {

    Route::get('/',[RoomTypeController::class, 'index'])->name('room_types.index');
    Route::get('/datatable',[RoomTypeController::class, 'datatable'])->name('room_types.datatable');
    Route::get('/get-one/{id}',[RoomTypeController::class, 'getone'])->name('room_types.getone');
    Route::post('/create',[RoomTypeController::class, 'store'])->name('room_types.store');
    Route::put('/update/{id}',[RoomTypeController::class, 'update'])->name('room_types.update');
    Route::delete('/delete/{id}',[RoomTypeController::class, 'destroy'])->name('room_types.delete');
});



Route::prefix('rooms')->group(function () {

    Route::get('/',[RoomController::class, 'index'])->name('rooms.index');
    Route::get('/datatable',[RoomController::class, 'datatable'])->name('rooms.datatable');
    Route::get('/get-one/{id}',[RoomController::class, 'getone'])->name('rooms.getone');
    Route::post('/create',[RoomController::class, 'store'])->name('rooms.store');
    Route::put('/update/{id}',[RoomController::class, 'update'])->name('rooms.update');
    Route::delete('/delete/{id}',[RoomController::class, 'destroy'])->name('rooms.delete');
    Route::get('/image/{filename}',[RoomController::class, 'image'])->name('rooms.image');

});


Route::get('login/google/redirect', [LoginController::class, 'redirectToProvider']);

Route::get('login/google/callback', [LoginController::class, 'redirectToProvider']);







