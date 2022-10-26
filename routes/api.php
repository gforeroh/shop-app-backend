<?php

use App\Http\Controllers\Api\V1\OrderController;
use App\Http\Controllers\Api\V1\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });


Route::group([
    "prefix" => "v1",
    "namespace" => "Api/V1"
], function(){
    Route::post('user/register', [UserController::class, 'register'])->name('user-register');

    Route::prefix('/order')->group(function(){
        Route::get('/', [OrderController::class, 'index'])->name('order.index');
        Route::get('/{id}', [OrderController::class, 'show'])->name('order.show');
        Route::get('/date_order/{date_order}', [OrderController::class, 'showByDate'])->name('order.date');
    });
});
