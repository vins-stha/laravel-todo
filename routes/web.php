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
//
//Route::get('/', function () {
//    return view('welcome');
//});
Route::get('/', [\App\Http\Controllers\TaskController::class, 'index']);
Route::get('/login', [\App\Http\Controllers\TaskController::class, 'index']);//->name('login');

Route::post('/login', [\App\Http\Controllers\TaskController::class, 'login'])->name('login');
Route::get('/signup', [\App\Http\Controllers\TaskController::class, 'signup'])->name('signup');
Route::post('/signup', [\App\Http\Controllers\TaskController::class, 'signup']);

Route::group(['middleware'=>'auth_user'], function (){
    Route::post('/tasks/create', [\App\Http\Controllers\TaskController::class, 'index']);
    Route::get('/tasks/update', [\App\Http\Controllers\TaskController::class, 'index']);
    Route::get('/tasks/delete', [\App\Http\Controllers\TaskController::class, 'index']);

});





