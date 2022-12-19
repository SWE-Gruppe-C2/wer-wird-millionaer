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

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/game', [GameController::class, 'index'])->name('game');
    Route::get('/game/result/{id}', [GameController::class, 'result'])->name('game.result');
    Route::get('/game/end', [GameController::class, 'end'])->name('game.end');
    Route::get('/answer/{id}', [GameController::class, 'answer'])->name('answer');

    Route::get('/gameover', [GameController::class, 'gameover'])->name('game.over');

    Route::get('/highscores', function() {
        return view('highscores');
    })->name('highscores');

    Route::get('/menu', function() {
        return view('menu');
    })->name('menu');
});

//TODO: Testweise da, alle admin Bereiche müssen hier hinzugefügt werden müssen. Vielleicht auch unter auth.php oder admin.php
Route::middleware(['auth', 'isAdmin'])->group(function () {
    /*Route::get('system.control', [SystemController::class, 'index'])
        ->name('admin.dashboard');*/
    Route::get('system.control', function () {
        return view('system-control');
    });
});

require __DIR__.'/auth.php';
