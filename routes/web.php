<?php

use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MathController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;
use App\Http\Controllers\UserController;

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

Route::get('/test', [TestController::class, 'index'])->name('home')->middleware('auth');

Route::redirect('/', '/login');
Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/login', [LoginController::class, 'login']);
Route::get('/logout', function () {
    return redirect()->route('login');
});
Route::post('/logout', [LoginController::class, 'logout']);

Route::middleware('auth')->group(function () {
    Route::resource('/user', UserController::class);
    Route::resource('/buku', BukuController::class);
    Route::resource('/author', AuthorController::class);

    Route::get('/math', [MathController::class, 'index']);
    Route::post('/math/prima', [MathController::class, 'prima']);
    Route::post('/math/fibonacci', [MathController::class, 'fibonacci']);
});
