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

Route::get('/', [\App\Http\Controllers\UserAuthController::class, 'login']);
Route::get('/api/v1/login', [\App\Http\Controllers\UserAuthController::class, 'index'])->name('login');
Route::post('/api/v1/login', [\App\Http\Controllers\UserAuthController::class, 'login'])->name('login');
Route::get('/api/v1/signup', [\App\Http\Controllers\UserAuthController::class, 'signup'])->name('signup');
Route::post('/api/v1/signup', [\App\Http\Controllers\UserAuthController::class, 'signup']);


Route::group(['middleware' => 'auth_user'], function () {
    Route::get('/api/v1/logout', [\App\Http\Controllers\UserAuthController::class, 'logout']);
    Route::get('/api/v1/changePassword', [\App\Http\Controllers\UserAuthController::class, 'updatePassword'])->name('change-password');
    Route::put('/api/v1/changePassword', [\App\Http\Controllers\UserAuthController::class, 'updatePassword'])->name('updatePassword');

    Route::get('/api/v1/tasks?status=[status]', [\App\Http\Controllers\TaskController::class, 'index'])->name('tasks-list');
    Route::get('/api/v1/tasks', [\App\Http\Controllers\TaskController::class, 'index'])->name('tasks-list');
    Route::get('/api/v1/tasks/create', [\App\Http\Controllers\TaskController::class, 'create'])->name('create-task');
    Route::post('/api/v1/tasks/create', [\App\Http\Controllers\TaskController::class, 'create']);
    Route::get('/api/v1/tasks/edit/{id}', [\App\Http\Controllers\TaskController::class, 'update']);
    Route::put('/api/v1/tasks/update', [\App\Http\Controllers\TaskController::class, 'update'])->name('update');
    Route::delete('/api/v1/tasks/delete/{id}', [\App\Http\Controllers\TaskController::class, 'destroy'])->name('Task.destroy');

});





