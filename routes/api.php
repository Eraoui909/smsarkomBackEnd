<?php

use App\Http\Controllers\Admin\ManagerController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\OffersController;

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

Route::prefix("auth")->group(function () {

    Route::post("register", [AuthController::Class, "register"])->name("users.register");

    Route::post('login',[AuthController::class,'login']);


});

Route::post("contact", [\App\Http\Controllers\ContactController::Class, "send"])->name("home.contact");


Route::group(['middleware' => 'auth:sanctum'], function(){
    //All secure URL's
    Route::get('/test',[AuthController::class,'index']);

    Route::post('logout',[AuthController::class,'logout']);

    Route::post('/offer',[OffersController::class,'store'])->name("offer.store");


});

