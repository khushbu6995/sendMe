<?php

use App\Http\Controllers\CountryCountroller;
use App\Http\Controllers\StateController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\AreaController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
route::get('abc',function(){
    dd('hello');
});

Route::get('user',[UserController::class,'index']);
Route::post('insert-user',[UserController::class,'insertUser']);
Route::post('update-user',[UserController::class,'updateUser']);
Route::post('delete-user',[UserController::class,'deleteUser']);

Route::post('login',[UserController::class,'logIn']);
Route::post('verify-otp',[UserController::class,'verifyOtp']);

Route::get('country',[CountryCountroller::class,'index']);
Route::get('add-country',[CountryCountroller::class,'addCountry']);
Route::post('insert-country',[CountryCountroller::class,'insertCountry']);
Route::post('update-country',[CountryCountroller::class,'updateCountry']);
Route::post('delete-country',[CountryCountroller::class,'deleteCountry']);

Route::get('state',[StateController::class,'index']);
Route::get('add-state',[StateController::class,'addState']);
Route::post('insert-state',[StateController::class,'insertState']);
Route::post('update-state',[StateController::class,'updateState']);
Route::post('delete-state',[StateController::class,'deleteState']);

Route::get('city',[CityController::class,'index']);
Route::get('add-city',[CityController::class,'addCity']);
Route::post('insert-city',[CityController::class,'insertCity']);
Route::post('update-city',[CityController::class,'updateCity']);
Route::post('delete-city',[CityController::class,'deleteCity']);

Route::get('area',[AreaController::class,'index']);
Route::get('add-area',[AreaController::class,'addArea']);
Route::post('insert-area',[AreaController::class,'insertArea']);
Route::post('update-area',[AreaController::class,'updateArea']);
Route::post('delete-area',[AreaController::class,'deleteArea']);

Route::get('category',[CategoryController::class,'index']);
Route::get('add-category',[CategoryController::class,'addCategory']);
Route::post('insert-category',[CategoryController::class,'insertCategory']);
Route::post('update-category',[CategoryController::class,'updateCategory']);
Route::post('delete-category',[CategoryController::class,'deleteCategory']);

Route::get('product',[ProductController::class,'index']);
Route::get('add-product',[ProductController::class,'addProduct']);
Route::post('insert-product',[ProductController::class,'insertProduct']);
Route::post('update-product',[ProductController::class,'updateProduct']);
Route::post('delete-product',[ProductController::class,'deleteProduct']);
