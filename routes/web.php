<?php

use App\Http\Middleware\CheckLanguage;
use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});
Route::post("/search", [\App\Http\Controllers\SearchController::class, "movies"])->name('ajax');
Route::get("/movie/{id}", [\App\Http\Controllers\MoviesController::class, "show"])->name('show-movie');
Route::get("/list", [\App\Http\Controllers\SearchController::class, "listing"])->middleware(CheckLanguage::class)->name('movie_list');
