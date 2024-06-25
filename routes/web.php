<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DashboardController;

Auth::routes();

Route::get('/',[HomeController::class, 'index']);
Route::get('/{id}', [HomeController::class, 'detail'])->name('detail');
Route::group(['prefix' => 'posts'], function () {
    Route::get('dashboard', [PostController::class, 'index']);
    Route::get('create', [PostController::class, 'create']);
    Route::post('/', [PostController::class, 'store']);
    Route::get('edit/{id}', [PostController::class, 'edit'])->where('id', '[0-9]+');
    Route::get('show/{id}', [PostController::class, 'show'])->where('id', '[0-9]+');
    Route::put('update/{id}', [PostController::class, 'update'])->where('id', '[0-9]+');
    Route::delete('/{id}', [PostController::class, 'destroy'])->where('id', '[0-9]+');
    Route::get('/{id}', [PostController::class, 'destroy'])->where('id', '[0-9]+');
});
