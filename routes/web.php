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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::resource('recipes', RecipeController::class);

Route::resource('ingredients', IngredientController::class);

Route::resource('categories', CategoryController::class);

Route::resource('users', UserController::class);

Route::get('/recipes/{id}',[App\Http\Controllers\RecipeController::class,'show']);

Route::get('/category/{id}',[App\Http\Controllers\CategoryController::class,'show']);

Route::get('/ingredient/{id}',[App\Http\Controllers\IngredientController::class,'show']);

Route::get('/user/{id}',[App\Http\Controllers\UserController::class,'show']);

require __DIR__.'/auth.php';
