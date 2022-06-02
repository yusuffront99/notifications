<?php

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

Route::get('/login', [UserController::class, 'login'])->name('login');
Route::post('/login_user', [UserController::class, 'login_user'])->name('login_user');

Route::get('/register', [UserController::class, 'register'])->name('register');
Route::post('/register_store', [UserController::class, 'register_store'])->name('register_store');