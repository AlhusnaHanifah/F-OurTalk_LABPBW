<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TalkController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\KomentarController;
use App\Http\Controllers\UserController;

//rute untuk user
Route::get('/', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'store']);
Route::post('/', [AuthController::class, 'store']);
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/talks/create', [TalkController::class, 'create'])->name('talks.create');
Route::get('/talks', [TalkController::class, 'index'])->name('talks.index');
Route::post('/talks', [TalkController::class, 'save'])->name('talks.save');
Route::get('/mytalks', [TalkController::class, 'myTalks'])->name('mytalks');
Route::delete('/talks/{id}', [TalkController::class, 'delete'])->name('talks.delete');
// Route untuk menampilkan komentar dan menambahkan komentar
Route::get('/comments/{talk}/{user}', [KomentarController::class, 'show'])->name('comments.show');
Route::post('/comments/{talk}/{user}', [KomentarController::class, 'store'])->name('comments.store');

//rute untuk admin
Route::middleware('admin')->group(function () {
    // Definisikan rute yang memerlukan akses admin di sini
    Route::get('/dashboard', function () {
        return view('pages.dashboard');
    })->name('dashboard');
    Route::get('/users', [UserController::class, 'index'])->name('users.index');
});

