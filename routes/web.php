<?php

namespace App\Http\Controllers;

use App\Http\Controllers\PagesController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BiodataController;
use App\Http\Controllers\WaliController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\OrmawaController;
use Database\Factories\DosenFactory;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Support\Facades\Route;
use Maatwebsite\Excel\Row;

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
Route::post('login', [UserController::class, 'login_action'])->name('login.action');

Route::get('/password', [UserController::class, 'password'])->name('password');
Route::post('password', [UserController::class, 'password_action'])->name('password.action');
Route::post('logout', [UserController::class, 'logout'])->name('logout');

Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();

    return redirect('/dashboard');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::get('/dashboard', [DashboardController::class, 'dashboard'])->middleware(['auth', 'verified']);

Route::middleware('auth')->group(function () {
    Route::middleware(['auth', 'only_admin'])->group(function () {
        Route::resource('mahasiswa', MahasiswaController::class);
        Route::get('/mahasiswa/{slug}/details', [MahasiswaController::class, 'show']);
        Route::get('/mahasiswa/{mahasiswa:slug}/edit', [MahasiswaController::class, 'edit']);

        Route::resource('kelas', KelasController::class);
        Route::get('/kelas/{id}/edit', [KelasController::class, 'edit']);
        Route::put('/kelas/{id}', [KelasController::class, 'update']);
        Route::delete('/kelas/{kelas}/delete', [KelasController::class, 'destroy']);

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
        Route::get('/post/create/checkslug', [PostController::class, 'show']);
    });

    Route::get('/print/mhs', [PrintController::class, 'printPdf']);
    Route::get('/export/mhs', [MahasiswaController::class, 'exportExcel']);
    Route::get('/jurusan/print', [PrintController::class, 'downloadPdf']);
    Route::get('/jurusan/export', [BiodataController::class, 'export']);
    Route::get('/print/wali', [PrintController::class, 'printWali']);
    Route::get('/export/wali', [WaliController::class, 'export']);
    Route::get('/print/dosen', [PrintController::class, 'printDosen']);
    Route::get('/export/dosen', [DosenController::class, 'exportExcel']);
    Route::get('/users/print', [PrintController::class, 'printUser']);
    Route::get('/users/export', [UsersController::class, 'exportExcel']);

    Route::get('/jurusan', [BiodataController::class, 'index']);
    Route::get('/jurusan/add', [BiodataController::class, 'create']);
    Route::post('/jurusan', [BiodataController::class, 'store']);
    Route::delete('/jurusan/{jurusan}/delete', [BiodataController::class, 'destroy']);
    Route::get('/jurusan/{jurusan:slug}/edit', [BiodataController::class, 'edit']);
    Route::put('/jurusan/{jurusan}', [BiodataController::class, 'update']);
    Route::get('/jurusan/{jurusan:slug}/details', [BiodataController::class, 'show']);
});
