<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BranchController;
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

Route::get('/branches', [BranchController::class, 'getall']);

// protected routes
Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::post('/branches', [BranchController::class, 'store']);
    Route::put('/branches/{id}', [BranchController::class, 'update']);
    Route::get('/branches/{id}', [BranchController::class, 'getone']);
    Route::get('/branches', [BranchController::class, 'getall']);
    Route::get('/branches-datatable',[BranchController::class, 'datatable']);

    Route::delete('/branches/{id}', [BranchController::class, 'destroy']);
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


// Route::get('/api/v1/hotels',[BranchController::class, 'datatable'])->name('api.hotels.index');
