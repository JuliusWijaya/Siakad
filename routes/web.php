<?php

namespace App\Http\Controllers;

use App\Http\Controllers\PagesController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BiodataController;
use App\Http\Controllers\WaliController;
use App\Http\Controllers\DashboardController;
use Database\Factories\DosenFactory;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
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

Route::resource('mahasiswa', MahasiswaController::class);
Route::get('/mahasiswa/{slug}/details', [MahasiswaController::class, 'show'])->middleware('auth');
Route::get('/mahasiswa/{mahasiswa:slug}/edit', [MahasiswaController::class, 'edit'])->middleware('auth');

Route::resource('wali', WaliController::class);
Route::get('/wali/{wali:slug}/edit', [WaliController::class, 'edit'])->middleware('auth');
Route::get('autocomplete', [WaliController::class, 'autocomplete'])->name('searchmhs');

Route::resource('dosen', DosenController::class);
Route::get('/dosen/{dosen:slug}/details', [DosenController::class, 'show'])->middleware('auth');
Route::get('/dosen/{dosen:slug}/edit', [DosenController::class, 'edit'])->middleware('auth');

Route::resource('user', UsersController::class);

Route::get('/user/{users:name}/details', [UsersController::class, 'show'])->middleware('auth');
Route::get('/print/mhs', [PrintController::class, 'printPdf'])->middleware('auth');
Route::get('/export/mhs', [MahasiswaController::class, 'exportExcel'])->middleware('auth');
Route::get('/jurusan/print', [PrintController::class, 'downloadPdf'])->middleware('auth');
Route::get('/jurusan/export', [BiodataController::class, 'export'])->middleware('auth');
Route::get('/print/wali', [PrintController::class, 'printWali'])->middleware('auth');
Route::get('/export/wali', [WaliController::class, 'export'])->middleware('auth');
Route::get('/print/dosen', [PrintController::class, 'printDosen'])->middleware('auth');
Route::get('/export/dosen', [DosenController::class, 'exportExcel'])->middleware('auth');
Route::get('/users/print', [PrintController::class, 'printUser'])->middleware('auth');
Route::get('/users/export', [UsersController::class, 'exportExcel'])->middleware('auth');

Route::get('/jurusan', [BiodataController::class, 'index'])->middleware('auth');
Route::get('/jurusan/add', [BiodataController::class, 'create'])->middleware('auth');
Route::post('/jurusan', [BiodataController::class, 'store'])->middleware('auth');
Route::delete('/jurusan/{jurusan}/delete', [BiodataController::class, 'destroy']);
Route::get('/jurusan/{jurusan:slug}/edit', [BiodataController::class, 'edit'])->middleware('auth');
Route::put('/jurusan/{jurusan}', [BiodataController::class, 'update']);
Route::get('/jurusan/{jurusan:slug}/details', [BiodataController::class, 'show'])->middleware('auth');