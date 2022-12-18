<?php

use App\Http\Controllers\GameController;
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

Route::get('/game', [GameController::class, 'index'])->name('game');
Route::post('/answer', [GameController::class, 'answer'])->name('answer');

Route::get('/game-over', function() {
    return view('game-over');
})->name('game-over');

Route::get('/highscores', function() {
    return view('highscores');
})->name('highscores');

Route::get('/menu', function() {
    return view('menu');
})->name('menu');

require __DIR__.'/auth.php';
