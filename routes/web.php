<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GameController;

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

//Routes für Leaderboard && Spieleende

Route::get('/leaderboard', function () {
    return view('leaderboard');
})->middleware(['auth', 'verified']);

Route::get('/game-end', function () {
    return view('game-end');
})->middleware(['auth', 'verified']);


Route::post('/game-end', 'GameController@store')->name('storeGame');



/**
 * Hier müsste ggf. noch die Nutzung des Controllers für die Spielendeseite eingebaut werden?
 */

require __DIR__.'/auth.php';
