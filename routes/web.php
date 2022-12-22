<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\GameController;
use App\Http\Controllers\LeaderboardController;
use App\Http\Controllers\QuestionController;
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

Route::get('/', function (){
    return view('home-page');
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/game', [GameController::class, 'index'])->name('game');
    Route::get('/game/result/{id}', [GameController::class, 'result'])->name('game.result');
    Route::get('/game/end', [GameController::class, 'end'])->name('game.end');
    Route::get('/game/end/intended', [GameController::class, 'end_intended'])->name('game.end.intended');
    Route::get('/game/won', [GameController::class, 'won'])->name('game.won');
    Route::get('/answer/{id}', [GameController::class, 'answer'])->name('answer');

    Route::get('/gameover', [GameController::class, 'gameover'])->name('game.over');

    Route::get('/leaderboard', [LeaderboardController::class, 'show'])->name('leaderboard');

    Route::get('main-menu', function() {
        return view('main-menu');
    })->name('main.menu');
});

Route::middleware(['auth', 'isAdmin'])->group(function () {
    Route::resource('question', QuestionController::class)
        ->only(['index', 'edit', 'delete', 'update', 'store','destroy']);

    Route::get('/question-add', [QuestionController::class, 'questionAdd'])->name('question.add');

    Route::get('/question-filter', [QuestionController::class, 'questionFilter']
    )->name('question.filter');

    Route::post('/question-filter', [QuestionController::class, 'questionFilter']
    )->name('question.filter');

    Route::get('/question-delete/{id}', [QuestionController::class, 'questionDeletePage'])->name('question.delete');

    Route::resource('category', CategoryController::class)
        ->only(['index', 'edit', 'store', 'update', 'success']);

    Route::get('/category-edit-success',function(){
        return view('category-edit-success');
    })->name('category.edit.success');

    Route::get('/category-add', function(){
        return view('category-add');
    })->name('category.add');

    Route::get('category-add-success', function(){
        return view('category-add-success');
    });

    Route::get('system-control', function () {
        return view('system-control');
    })->name('system');
});

require __DIR__.'/auth.php';
