<?php

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


//Route::get('/questions-overview', [QuestionController::class, 'index'])->name('questions-overview');

Route::get('/question-edit', [QuestionController::class, 'edit'])->name('question-edit');
Route::get('/question-delete', [QuestionController::class, 'delete'])->name('question-delete');
Route::get('/question-update', [QuestionController::class, 'update'])->name('question-update');


//Catalog Seite entspricht index Method
Route::resource('questions', QuestionController::class)
    ->only(['index', 'edit', 'store', 'delete', 'update'])
    ->middleware(['auth', 'verified']);

require __DIR__.'/auth.php';
