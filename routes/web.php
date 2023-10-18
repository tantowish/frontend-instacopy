<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\AuthenticationController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


// Routing posts
Route::get('/',[PostController::class, 'index']);
Route::resource('posts',PostController::class);
// Route::patch('/posts/{id}',[PostController::class, 'update'])->name('posts.update');

// Routing Account & Auth
Route::get('/login',[AuthenticationController::class, 'login']);
Route::post('/login/auth',[AuthenticationController::class, 'auth']);
Route::post('/logout',[AuthenticationController::class, 'logout']);
Route::get('/register',[AccountController::class, 'register']);
Route::post('/register/store',[AccountController::class, 'store']);
Route::get('/profile', [AccountController::class, 'profile']);

// Routing Comments
Route::get('/comments/create/{id}',[CommentController::class, 'create']);

