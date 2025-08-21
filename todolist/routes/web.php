<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\PostController;

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ExperimentController;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

// use App\Http\Controllers\DashboardController;



// Dashboard routes

// Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard')->middleware('auth');

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth'])
    ->name('dashboard');

// Route::get('/', function () {
//     return view('welcome');
// });

//posts routes i group them because of middleware.
Route::middleware('auth')->group(function () {
    Route::get('/', [PostController::class, 'index'])->name('posts.index');
    Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');
    Route::post('/posts', [PostController::class, 'store'])->name('posts.store');
    Route::get('posts/{post}/edit', [PostController::class, 'edit'])->name('posts.edit');
    Route::put('/posts/{post}', [PostController::class, 'update'])->name('posts.update');
    Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy');
    Route::get('experiments/chat', [ChatController::class, 'index'])->name('chat');
    Route::post('/chat', [ChatController::class, 'store'])->name('chat.store');
});


// group routes

Route::prefix('experiments')->group(function () {
    Route::get('/', [ExperimentController::class, 'index'])->name('experiments.index');
    // Route::get('/test', [ExperimentController::class, 'test'])->name('experiments.test');
     Route::get('experiments/chat', [ChatController::class, 'index'])->name('experiments.chat');
    Route::post('/chat', [ChatController::class, 'store'])->name('experiments.chat.store');
    Route::get('/test2', [ExperimentController::class, 'test2'])->name('experiments.test2');
    Route::get('/experiments/weather', [ExperimentController::class, 'weather'])->name('experiments.weather');
});

// login routes

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
