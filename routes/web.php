<?php

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::prefix('test')->group(function () {
    Route::get('/', fn () => view('test.play'));
    Route::get('/login', fn () => view('test.login'));
    Route::get('/menu', fn () => view('test.menu'));
    Route::get('/register', fn () => view('test.register'));
    Route::get('/reset-password', fn () => view('test.reset-password'));
});

require __DIR__.'/auth.php';
