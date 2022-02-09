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
Route::get('/', [\App\Http\Controllers\UserAuthController::class, 'login']);

Route::get('/login', [\App\Http\Controllers\UserAuthController::class, 'index']);//->name('login');
Route::post('/login', [\App\Http\Controllers\UserAuthController::class, 'login'])->name('login');
Route::get('/signup', [\App\Http\Controllers\UserAuthController::class, 'signup'])->name('signup');
Route::post('/signup', [\App\Http\Controllers\UserAuthController::class, 'signup']);


Route::group(['middleware' => 'auth_user'], function () {
    Route::get('/logout', [\App\Http\Controllers\UserAuthController::class, 'logout']);
    Route::get('/changePassword', [\App\Http\Controllers\UserAuthController::class, 'updatePassword'])->name('change-password');
    Route::put('/changePassword', [\App\Http\Controllers\UserAuthController::class, 'updatePassword']);

    Route::get('/tasks?status=[status]', [\App\Http\Controllers\TaskController::class, 'index'])->name('tasks-list');
    Route::get('/tasks', [\App\Http\Controllers\TaskController::class, 'index'])->name('tasks-list');
    Route::get('/tasks/create', [\App\Http\Controllers\TaskController::class, 'create'])->name('create-task');
    Route::post('/tasks/create', [\App\Http\Controllers\TaskController::class, 'create']);
    Route::get('/tasks/edit/{id}', [\App\Http\Controllers\TaskController::class, 'update']);
    Route::put('/tasks/update', [\App\Http\Controllers\TaskController::class, 'update'])->name('update');
    Route::delete('/tasks/delete/{id}', [\App\Http\Controllers\TaskController::class, 'destroy'])->name('Task.destroy');

});





