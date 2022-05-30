<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HotelController;
use App\Http\Controllers\Auth\AuthController;



/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('/login', [AuthController::class, 'login']);


// protected routes
Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::post('/hotels', [HotelController::class, 'store']);
    Route::put('/hotels/{id}', [HotelController::class, 'update']);
    Route::get('/hotels/{id}', [HotelController::class, 'getone']);
    Route::get('/hotels', [HotelController::class, 'getall']);
    Route::delete('/students/{id}', [HotelController::class, 'destroy']);
    Route::post('/logout', [AuthController::class, 'logout']);
});



Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


// Route::post('hotels',function(){
//     return Hotel::create([
//         'region' => 'region1',
//         'city' => 'city1',
//         'street' => 'street',
//         'contact_no' => 'contact_no1',
//         'email' => 'email',
//         'manager' => 'manager',

//     ]);

// });


// Route::get('/api/v1/hotels',[HotelController::class, 'datatable'])->name('api.hotels.index');
