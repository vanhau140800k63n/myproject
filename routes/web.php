<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LessonController;
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
Route::post('/submit', [HomeController::class, 'submit'])->name('submit');
Route::get('/test', [HomeController::class, 'test'])->name('test');

Route::prefix('learn')->name('learn.')->group(function () {
    Route::get('/{lang}/{slug}', [LessonController::class, 'getLessonDetail'])->name('lesson_detail');
});

Route::middleware(['check.logged_out'])->group(function () {
    Route::get('/login', [AuthController::class, 'getLogin'])->name('login');
    Route::post('/post-login', [AuthController::class, 'postLogin'])->name('post_login');
    Route::get('/register', [AuthController::class, 'getRegister'])->name('register');
    Route::post('/post-register', [AuthController::class, 'postRegister'])->name('post_register');
    Route::get('/confirm-register', [AuthController::class, 'confirmRegister'])->name('confirm_register');
    Route::get('/change-password', [AuthController::class, 'changePassword'])->name('change_password');
    Route::post('/post-change-password', [AuthController::class, 'postChangePassword'])->name('post_change_password');
    Route::get('/forgot-password', [AuthController::class, 'forgotPassword'])->name('forgot_password');
    Route::post('/post-forgot-password', [AuthController::class, 'postForgotPassword'])->name('post_forgot_password');
    Route::get('/confirm-reset-password', [AuthController::class, 'confirmResetPassword'])->name('confirm_reset_password');
});

Route::middleware(['check.logged'])->group(function () {
    Route::get('/logout', [AuthController::class, 'getLogout'])->name('logout');
});

Route::prefix('admin')->middleware(['check.logged'])->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'getDashboard'])->name('dashboard');
    Route::prefix('course')->name('course.')->group(function () {
        Route::get('/', [LessonController::class, 'getCourseListAdmin'])->name('list');
        Route::get('/{name}', [LessonController::class, 'getLessonListAdmin'])->name('lesson_list');
        Route::prefix('lesson')->name('lesson.')->group(function () {
            Route::get('/add', [LessonController::class, 'addLessonAdmin'])->name('add');
            Route::post('/add_lesson_info', [LessonController::class, 'addLessonInfoAdmin'])->name('add_lesson_info');
            Route::post('/update_lesson_info', [LessonController::class, 'updateLessonInfoAdmin'])->name('update_lesson_info');
            Route::post('/add_lesson_item', [LessonController::class, 'addLessonItemAdmin'])->name('add_lesson_item');
            Route::post('/update_lesson_item', [LessonController::class, 'updateLessonItemAdmin'])->name('update_lesson_item');
            Route::post('/del_lesson_item', [LessonController::class, 'delLessonItemAdmin'])->name('del_lesson_item');
            Route::get('/detail', [LessonController::class, 'lessonDetailAdmin'])->name('detail');
        });
    });
});
