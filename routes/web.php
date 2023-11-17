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
    Route::get('user', [UserController::class, 'index'])->name('user');
    Route::post('logout', [AuthController::class, 'logout'])->name('logout');
});

Route::get('/', [LandingController::class, 'index'])->name('landing');
Route::get('news', [LandingController::class, 'news'])->name('landing.news');
Route::get('login', [AuthController::class, 'login'])->name('login');
Route::post('action-login', [AuthController::class, 'actionLogin'])->name('action-login');
Route::get('register', [AuthController::class, 'register'])->name('register');
