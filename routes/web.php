<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
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

Route::get('/', [HomeController::class, 'getHomePage'])->name('home');

Route::get('/login', [AuthController::class, 'getLogin'])->name('login');
Route::post('/post-login', [AuthController::class, 'postLogin'])->name('post_login');
Route::get('/register', [AuthController::class, 'getRegister'])->name('register');
Route::post('/post-register', [AuthController::class, 'postRegister'])->name('post_register');
Route::get('/logout', [AuthController::class, 'getLogout'])->name('logout');

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'getDashboard'])->name('dashboard');
});
