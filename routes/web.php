<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RecipeController;
use App\Http\Controllers\IngredientController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\UserController;

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

Route::get('/', function () {
    return redirect() -> to('login');
});

Route::resource('recipes', RecipeController::class) -> middleware(['auth']);

Route::resource('ingredients', IngredientController::class)-> middleware(['auth']);

Route::resource('categories', CategoryController::class)-> middleware(['auth']);

Route::resource('users', UserController::class)-> middleware(['auth']);

Route::get('/category/{id}',[App\Http\Controllers\CategoryController::class,'show'])-> middleware(['auth']);

Route::get('/ingredient/{id}',[App\Http\Controllers\IngredientController::class,'show'])-> middleware(['auth']);

Route::get('/user/{id}',[App\Http\Controllers\UserController::class,'show'])-> middleware(['auth']);

require __DIR__.'/auth.php';
