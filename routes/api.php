<?php

use App\Http\Controllers\CountryCountroller;
use App\Http\Controllers\stateController;
use App\Http\Controllers\cityController;
use App\Http\Controllers\areaController;
use App\Http\Controllers\categoryController;
use App\Http\Controllers\productController;
use App\Http\Controllers\userController;
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

Route::get('user',[userController::class,'index']);
Route::post('insert-user',[userController::class,'insertUser']);
Route::post('update-user',[userController::class,'updateUser']);

Route::post('login',[userController::class,'logIn']);
Route::post('verify-otp',[userController::class,'verifyOtp']);

Route::get('country',[CountryCountroller::class,'index']);
Route::get('add-country',[CountryCountroller::class,'addCountry']);
Route::post('insert-country',[CountryCountroller::class,'insertCountry']);
// Route::get('edit-country',[CountryCountroller::class,'editCountry']);
Route::get('edit-country/{id}',[CountryCountroller::class,'editCountry']);

Route::post('update-country',[CountryCountroller::class,'updateCountry']);
Route::post('delete-country',[CountryCountroller::class,'deleteCountry']);

Route::get('state',[stateController::class,'index']);
Route::get('add-state',[stateController::class,'addState']);
Route::post('insert-state',[stateController::class,'insertState']);
Route::get('edit-state/{id}',[stateController::class,'editState']);
Route::post('update-state',[stateController::class,'updateState']);
Route::post('delete-state',[stateController::class,'deleteState']);

Route::get('city',[cityController::class,'index']);
Route::get('add-city',[cityController::class,'addCity']);
Route::post('insert-city',[cityController::class,'insertCity']);
Route::get('edit-city/{id}',[cityController::class,'editCity']);
Route::post('update-city',[cityController::class,'updateCity']);
Route::post('delete-city',[cityController::class,'deleteCity']);

Route::get('area',[areaController::class,'index']);
Route::get('add-area',[areaController::class,'addArea']);
Route::post('insert-area',[areaController::class,'insertArea']);
Route::get('edit-area/{id}',[areaController::class,'editArea']);

Route::post('update-area',[areaController::class,'updateArea']);
Route::post('delete-area',[areaController::class,'deleteArea']);

Route::get('category',[categoryController::class,'index']);
Route::get('add-category',[categoryController::class,'addCategory']);
Route::post('insert-category',[categoryController::class,'insertCategory']);
Route::get('edit-category/{id}',[categoryController::class,'editCategory']);

Route::post('update-category',[categoryController::class,'updateCategory']);
Route::post('delete-category',[categoryController::class,'deleteCategory']);

Route::get('product',[productController::class,'index']);
Route::get('add-product',[productController::class,'addProduct']);
Route::post('insert-product',[productController::class,'insertProduct']);
Route::get('edit-product/{id}',[productController::class,'editProduct']);

Route::post('update-product',[productController::class,'updateProduct']);
Route::post('delete-product',[productController::class,'deleteProduct']);
