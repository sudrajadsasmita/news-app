<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\UserController;
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


Route::group([
    'middleware' => 'auth'
], function () {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
    
    Route::get('admin-news', [NewsController::class, 'index'])->name('news');
    Route::post('admin-news-post', [NewsController::class, 'store'])->name('news.post');
    Route::post('admin-news-edit/{id}', [NewsController::class, 'edit'])->name('news.edit');
    Route::get('admin-news-delete/{id}', [NewsController::class, 'destroy'])->name('news.destroy');

    Route::get('user', [UserController::class, 'index'])->name('user');
    Route::post('user-post', [UserController::class, 'store'])->name('user.post');
    Route::post('user-edit/{id}', [UserController::class, 'update'])->name('user.update');
    Route::get('user-delete/{id}', [UserController::class, 'destroy'])->name('user.delete');

    Route::post('logout', [AuthController::class, 'logout'])->name('logout');
});

Route::get('/', [LandingController::class, 'index'])->name('landing');
Route::get('news', [LandingController::class, 'news'])->name('landing.news');
Route::get('login', [AuthController::class, 'login'])->name('login');
Route::post('action-login', [AuthController::class, 'actionLogin'])->name('action-login');
Route::get('register', [AuthController::class, 'register'])->name('register');
