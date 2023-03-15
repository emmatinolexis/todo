<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('todo.index');
});

Route::group(['middleware' => 'auth'], function () {
    Route::get('/', [App\Http\Controllers\TodoController::class, 'index'])->name('task.index');
    Route::post('/', [App\Http\Controllers\TodoController::class, 'store'])->name('task.store');
    Route::post('/update/{task}', [App\Http\Controllers\TodoController::class, 'update'])->name('task.update');
});

Auth::routes();


