<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WaliController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\OrmawaController;
use App\Http\Controllers\JurusanController;
use App\Http\Controllers\DashboardController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;


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



// Route::get('/', function () {
//     return view('home', ['title' => 'Home']);
// })->name('home');

Route::get('/', [PagesController::class, 'home']);
Route::get('/about', [PagesController::class, 'about']);

Route::get('register', [UserController::class, 'register'])->name('register')->middleware('guest');
Route::post('register', [UserController::class, 'register_action'])->name('register.action');

Route::get('login', [UserController::class, 'login'])->name('login')->middleware('guest');
Route::post('login', [UserController::class, 'login_action'])->name('login.action')->middleware('throttle:login');

Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
    return redirect('/dashboard');
})->middleware(['auth', 'signed'])->name('verification.verify');


Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/password', [UserController::class, 'password'])->name('password');
    Route::post('password', [UserController::class, 'password_action'])->name('password.action');
    Route::post('logout', [UserController::class, 'logout'])->name('logout');

    Route::middleware(['auth', 'only_admin'])->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'dashboard']);
        Route::resources([
            'students'  => MahasiswaController::class,
            'classes'   => KelasController::class,
        ]);

        Route::controller(MahasiswaController::class)->group(function () {
            Route::get('/student/{slug}/details', 'show');
            Route::get('/student/{student:slug}/edit', 'edit');
        });

        Route::controller(KelasController::class)->group(function () {
            Route::get('/class/edit/{id}', 'edit');
            Route::put('/kelas/update', 'update')->name('classes.update');
        });

        Route::resource('wali', WaliController::class);
        Route::get('/wali/create/checkSlug', [WaliController::class, 'show']);
        Route::get('/wali/{wali:slug}/edit', [WaliController::class, 'edit']);
        Route::get('autocomplete', [WaliController::class, 'autocomplete'])->name('searchmhs');

        Route::resource('dosen', DosenController::class);
        Route::get('/dosen/{dosen:slug}/details', [DosenController::class, 'show']);
        Route::get('/dosen/{dosen:slug}/edit', [DosenController::class, 'edit']);
        Route::get('/dosen/create/checkSlug', [DosenController::class, 'checkSlug']);

        Route::resource('user', UsersController::class);

        Route::get('/user/{users:name}/details', [UsersController::class, 'show']);
        Route::resource('/ormawa', OrmawaController::class);

        Route::resource('post', PostController::class);
        Route::get('/post/{post:slug}/edit', [PostController::class, 'edit']);
        Route::get('/post/create/checkslug', [PostController::class, 'show'])->name('checkSlug');
    });

    Route::get('/print/mhs', [PrintController::class, 'printPdf']);
    Route::get('/export/mhs', [MahasiswaController::class, 'exportExcel']);
    Route::get('/jurusan/print', [PrintController::class, 'downloadPdf']);
    Route::get('/jurusan/export', [JurusanController::class, 'export']);
    Route::get('/print/wali', [PrintController::class, 'printWali']);
    Route::get('/export/wali', [WaliController::class, 'export']);
    Route::get('/print/dosen', [PrintController::class, 'printDosen']);
    Route::get('/export/dosen', [DosenController::class, 'exportExcel']);
    Route::get('/users/print', [PrintController::class, 'printUser']);
    Route::get('/users/export', [UsersController::class, 'exportExcel']);

    Route::get('/jurusan', [JurusanController::class, 'index']);
    Route::get('/jurusan/add', [JurusanController::class, 'create']);
    Route::post('/jurusan', [JurusanController::class, 'store']);
    Route::delete('/jurusan/{jurusan}/delete', [JurusanController::class, 'destroy']);
    Route::get('/jurusan/{jurusan:slug}/edit', [JurusanController::class, 'edit']);
    Route::put('/jurusan/{jurusan}', [JurusanController::class, 'update']);
    Route::get('/jurusan/{jurusan:slug}/details', [JurusanController::class, 'show']);
});
