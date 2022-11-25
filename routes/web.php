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

Route::get('main-menu', function() {
    return view('main-menu');
})->name('main-menu');

Route::get('/play', function() {
    return view('play');
})->name('play');

Route::get('/highscores', function() {
    return view('highscores');
})->name('highscores');

require __DIR__.'/auth.php';
