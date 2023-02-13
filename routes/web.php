<?php

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

Route::get('/chara',[App\Http\Controllers\MarvelController::class,'index']);
Route::get('/pattern',[App\Http\Controllers\PatternController::class,'index']);
Route::get('/anagram',[App\Http\Controllers\AnagramController::class,'index']);
Route::post('/getAnagram',[App\Http\Controllers\AnagramController::class,'generate']);

