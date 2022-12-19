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

Route::get('main-menu', function() {
    return view('main-menu');
})->name('main.menu');

Route::get('/game', function() {
    return view('play');
})->name('game');

Route::get('/leaderboard', function() {
    return view('leaderboard');
})->name('leaderboard');

Route::get('/home', function (){
    return view('home-page');
});

Route::get('/menu', function() {
    return view('menu');
})->name('menu');

Route::get('/system-control', function() {
    return view('system-control');
})->name('system');



Route::get('system-control', function(){
    return view('system-control');
});

Route::get('/question-add', [QuestionController::class, 'questionAdd'])->middleware(['auth', 'verified'])->name('question-add');

Route::resource('question', QuestionController::class)
    ->only(['index', 'edit', 'delete', 'update', 'store','destroy'])
    ->middleware(['auth', 'verified']);

Route::get('/question-filter', [QuestionController::class, 'questionFilter']
)->name('question-filter');

Route::post('/question-filter', [QuestionController::class, 'questionFilter']
)->name('question-filter');

Route::get('/question-delete/{id}', [QuestionController::class, 'questionDeletePage'])->name('question-delete');

/*
Route::get('/question-delete', function($question){
    return view('question-delete', [
        'question' => $question
    ]);

})->name('question-delete');
*/

Route::resource('category', CategoryController::class)
    ->only(['index', 'edit', 'store', 'update', 'success'])
    ->middleware(['auth', 'verified']);

//Route::get('/category-edit-overview', [CategoryController::class, 'index'])->name('category-edit-overview');

Route::get('/category-edit-success',function(){
    return view('category-edit-success');
})->name('category-edit-success');

Route::get('/category-add', function(){
    return view('category-add');
})->middleware(['auth', 'verified'])->name('category-add');

//Route::post('category-add', [CategoryController::class, 'store'])->name('category-add.store');

Route::get('category-add-success', function(){
    return view('category-add-success');
})->middleware(['auth', 'verified']);

Route::get('logout', '\App\Http\Controllers\Auth\AuthenticatedSessionController@logout');

require __DIR__.'/auth.php';
