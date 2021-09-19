<?php

use App\Http\Controllers\ActivityController;
use App\Http\Controllers\AnnouncementController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\CertificateController;
use App\Http\Controllers\ClassesController;
use App\Http\Controllers\GradeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RecognitionController;
use App\Http\Controllers\ScheduleController;
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

Route::redirect('/', 'home');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/recognitions', [RecognitionController::class, 'index']);

Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [LoginController::class, 'login']);
});

Route::middleware('auth')->group(function () {
    Route::get('/logout', [LoginController::class, 'logout']);

    Route::get('/announcement', AnnouncementController::class);

    Route::get('/grades/{user:id}', [GradeController::class, 'show']);

    Route::get('/class/{user:id}', [ClassesController::class, 'show']);

    Route::get('/class-details/{id}', [ScheduleController::class, 'show']);

    Route::put('/update-profile', [LoginController::class, 'updateProfile']);

    Route::get('messages', [MessageController::class, 'index']);
    Route::get('messages/{message}', [MessageController::class, 'show']);
    Route::get('write-message', [MessageController::class, 'write']);
    Route::put('send-message', [MessageController::class, 'sendMessage']);

    Route::get('/activities', [ActivityController::class, 'index']);

    Route::get('/attendances', [AttendanceController::class, 'index']);

    Route::post('password-change', [ProfileController::class, 'updatePassword']);

    Route::get('user-profile/{user}', [ProfileController::class, 'show']);

    Route::get('certificates', [CertificateController::class, 'index']);
});
