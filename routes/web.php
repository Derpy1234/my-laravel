<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;


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
Route::middleware('isGuest')->group(function () {
    Route::get('/', [TodoController::class,'index']);
    Route::post('/login', [LoginController::class, 'login'])->name('login-baru');
    Route::get('/register', [TodoController::class,'register']);
    route::post('/register', [RegisterController::class,'register']);
    
});

Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::middleware('isLogin')->group(function () {
    Route::get('/dashboard', [TodoController::class, 'dashboard'])->name('dashboard');
    Route::get('/create', [TodoController::class, 'create'])->name('create');
    Route::post('/store', [TodoController::class, 'store'])->name('store');
    Route::get('/data', [TodoController::class, 'data'])->name('data');
});







