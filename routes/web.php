<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ExamController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\IconController;
use App\Http\Controllers\LessonController;
use App\Http\Controllers\NotiController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\TemplateController;
use App\Http\Controllers\UserController;
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
Route::get('/game-design', [HomeController::class, 'getGameDesignPage'])->name('game_design');
Route::get('/u/{id}', [UserController::class, 'getUserInfoDetail'])->name('user_detail');
// Route::get('/list_user', [UserController::class, 'listUser'])->name('list_user');
Route::get('/test', [HomeController::class, 'test'])->name('test');
Route::get('/update_meta', [HomeController::class, 'updateMeta'])->name('update_meta');
Route::post('/build_code_php', [LessonController::class, 'buildCodePHP'])->name('build_code_php');
Route::post('/search-key', [HomeController::class, 'searchKey'])->name('search_key');
Route::get('/search/{key}', [HomeController::class, 'search'])->name('search');
Route::post('/action', [PostController::class, 'actionPost'])->name('action');
Route::post('/add_comment_post', [PostController::class, 'addComment'])->name('add_comment_post');
Route::post('/del_comment_post', [PostController::class, 'delComment'])->name('del_comment_post');
Route::get('/auto_html', [PostController::class, 'autoHtml'])->name('auto_html');
Route::post('/compile_html', [PostController::class, 'compileHtml'])->name('compile_html');
Route::get('/get_noti', [NotiController::class, 'getNoti'])->name('get_noti');
Route::get('/random_template_banner', [TemplateController::class, 'randomTemplateBanner'])->name('random_template_banner');
Route::get('/auth/google/callback', [AuthController::class, 'authGoogleCallback'])->name('auth_google_callback');
Route::get('/auth/google', [AuthController::class, 'authGoogle'])->name('auth_google');

Route::prefix('template')->name('template.')->group(function () {
    Route::get('/{key}', [TemplateController::class, 'listTemplate'])->name('list');
    Route::get('/{key}-{slug}', [TemplateController::class, 'getTemplateDetail'])->name('detail')->middleware(['check.logged']);
});

Route::prefix('learn')->name('learn.')->group(function () {
    Route::get('/{course}-{slug}', [LessonController::class, 'getLessonDetail'])->name('lesson_detail');
    Route::get('/{course}', [LessonController::class, 'getLessonIntro'])->name('lesson_intro');
});

Route::prefix('post')->name('post.')->group(function () {
    Route::get('/{slug}', [PostController::class, 'getPostDetail'])->name('detail');
});

Route::prefix('exam')->name('exam.')->group(function () {
    Route::get('/', [ExamController::class, 'getExamHome'])->name('home');
    Route::get('/update_exam_list', [ExamController::class, 'updateExamList'])->name('update_exam_list');
    Route::get('/update_practice_list', [ExamController::class, 'updatePracticeList'])->name('update_practice_list');
    Route::get('/challenge-weekly', [ExamController::class, 'getChallengeInfo'])->name('challenge_weekly');
    Route::get('/{language}', [ExamController::class, 'getExerciseInfo'])->name('get_exercise_info');
    Route::get('/{language}/{practice}', [ExamController::class, 'getPracticeDetail'])->name('get_practice_detail');

    // Route::prefix('challenge')->middleware(['check.logged'])->name('challenge.')->group(function () {
    Route::prefix('challenge')->name('challenge.')->group(function () {
        Route::get('/week', [ExamController::class, 'getChallengeWeek'])->name('week');
        Route::post('/run', [ExamController::class, 'runTestCase'])->name('run');
        Route::post('/create_folder_test', [ExamController::class, 'createFolderTest'])->name('creat_folder_test');
        Route::post('/submit', [ExamController::class, 'submitCode'])->name('submit');
    });
});

Route::prefix('icon')->name('icon.')->group(function () {
    Route::get('/', [IconController::class, 'getIconHome'])->name('home');
    Route::get('/search', [IconController::class, 'searchIcon'])->name('search');
    Route::get('/add_path', [IconController::class, 'addIconPath'])->name('add_path');
    Route::post('/save_icon', [IconController::class, 'saveIcon'])->name('save_icon');
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
    Route::get('/change-password-success', [AuthController::class, 'changePasswordSuccess'])->name('change_password_success');
});

Route::middleware(['check.logged'])->group(function () {
    Route::get('/logout', [AuthController::class, 'getLogout'])->name('logout');
    Route::prefix('user')->name('user.')->group(function () {
        Route::get('/info', [AuthController::class, 'getUserInfo'])->name('info');
        Route::post('/update', [AuthController::class, 'updateUserInfo'])->name('update');
    });
});

Route::prefix('admin')->middleware(['check.admin'])->name('admin.')->group(function () {
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
            Route::post('/list_main', [LessonController::class, 'lessonListMainAdmin'])->name('list_main');
            Route::get('/del_lesson', [LessonController::class, 'delLessonAdmin'])->name('del_lesson');
            Route::post('/change_lesson_item_type', [LessonController::class, 'changeLessonItemType'])->name('change_lesson_item_type');
        });
    });
    Route::prefix('post')->name('post.')->group(function () {
        Route::get('/', [PostController::class, 'getPostListAdmin'])->name('list');
        Route::get('/add', [PostController::class, 'addPostAdmin'])->name('add');
        Route::post('/add_post_info', [PostController::class, 'addPostInfoAdmin'])->name('add_post_info');
        Route::post('/update_post_info', [PostController::class, 'updatePostInfoAdmin'])->name('update_post_info');
        Route::post('/add_post_item', [PostController::class, 'addPostItemAdmin'])->name('add_post_item');
        Route::post('/update_post_item', [PostController::class, 'updatePostItemAdmin'])->name('update_post_item');
        Route::post('/del_post_item', [PostController::class, 'delPostItemAdmin'])->name('del_post_item');
        Route::get('/detail/{id}', [PostController::class, 'postDetailAdmin'])->name('detail');
        Route::get('/del', [PostController::class, 'delPostAdmin'])->name('del');
        Route::get('/duplicate/{id}', [PostController::class, 'duplicatePost'])->name('duplicate');
        Route::post('/get_content_url', [PostController::class, 'getContentUrl'])->name('get_content_url');
        // Route::get('/auto_add_url', [PostController::class, 'autoAddUrl'])->name('auto_add_url');
        // Route::get('/auto_add_post', [PostController::class, 'autoAddPost'])->name('auto_add_post');
        // Route::post('/add_url_to_db', [PostController::class, 'autoUrlToDb'])->name('add_url_to_db');
        // Route::get('/auto_update_title_post', [PostController::class, 'autoUpdateTitlePost'])->name('auto_update_title_post');
        Route::post('/update_title_post', [PostController::class, 'updateTitlePost'])->name('pdate_title_post');
    });

    Route::prefix('template')->name('template.')->group(function () {
        Route::get('/', [TemplateController::class, 'getTemplateTypeListAdmin'])->name('type_list');
        Route::get('/{type}', [TemplateController::class, 'getTemplateListAdmin'])->name('list');
        Route::get('detail/{id}', [TemplateController::class, 'getTemplateDetailAdmin'])->name('detail');
        Route::get('/t/add', [TemplateController::class, 'addTemplateAdmin'])->name('add');
        Route::get('/a/add_description', [TemplateController::class, 'addDescriptionAdmin'])->name('add_description');

        // Route::prefix('auto')->name('auto.')->group(function () {
        //     Route::get('/add', [TemplateController::class, 'autoAddTemplateAdmin'])->name('add');
        //     Route::post('/post_add', [TemplateController::class, 'autoPostAddTemplateAdmin'])->name('post_add');
        // });

        Route::prefix('item')->name('item.')->group(function () {
            Route::post('/add', [TemplateController::class, 'postAddTemplateAdmin'])->name('add');
            Route::post('/update', [TemplateController::class, 'postUpdateTemplateAdmin'])->name('update');
        });
    });
});
