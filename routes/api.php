<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ApiController;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('register', [ApiController::class, 'register'])->middleware('api.key');
Route::post('login', [ApiController::class, 'login'])->middleware('api.key');

// Route::post('register', 'Api\ApiController@register')->name('register.user');
// Route::post('register', 'Api\ApiController@login')->name('login.user');
