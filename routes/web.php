<?php

namespace App\Http\Controllers;

use App\Http\Controllers\PagesController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BiodataController;
use App\Http\Controllers\WaliController;
use App\Http\Controllers\DashboardController;
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
Route::get('register', [UserController::class, 'register'])->name('register')->middleware('guest');
Route::post('register', [UserController::class, 'register_action'])->name('register.action');
Route::get('login', [UserController::class, 'login'])->name('login')->middleware('guest');
Route::post('login', [UserController::class, 'login_action'])->name('login.action');
Route::post('password', [UserController::class, 'password_action'])->name('password.action');
Route::post('logout', [UserController::class, 'logout'])->name('logout');
Route::get('/', [PagesController::class, 'home']);
Route::get('/about', [PagesController::class, 'about']);
Route::get('/password', [UserController::class, 'password'])->name('password');

Route::get('/dashboard', [DashboardController::class, 'dashboard'])->middleware('auth');
Route::resource('mahasiswa', MahasiswaController::class);
Route::resource('wali', WaliController::class);
Route::resource('dosen', DosenController::class);
Route::get('/print/mhs', [PrintController::class, 'printPdf'])->middleware('auth');
Route::get('/jurusan/print', [PrintController::class, 'downloadPdf'])->middleware('auth');
Route::get('/print/wali', [PrintController::class, 'printWali'])->middleware('auth');
Route::get('/print/dosen', [PrintController::class, 'printDosen'])->middleware('auth');

Route::get('/jurusan', [BiodataController::class, 'index'])->middleware('auth');
Route::get('/jurusan/add', [BiodataController::class, 'create'])->middleware('auth');
Route::post('/jurusan', [BiodataController::class, 'store'])->middleware('auth');
Route::delete('/jurusan/{jurusan}', [BiodataController::class, 'destroy']);
Route::get('/jurusan/{jurusan}/edit', [BiodataController::class, 'edit'])->middleware('auth');
Route::put('/jurusan/{jurusan}', [BiodataController::class, 'update']);
Route::get('/jurusan/{jurusan}/details', [BiodataController::class, 'show'])->middleware('auth');