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

Route::get('/question-add', [QuestionController::class, 'questionAdd']);

//Catalog Seite entspricht index Method
Route::resource('questions', QuestionController::class)
    ->only(['index', 'edit', 'store', 'delete', 'update'])
    ->middleware(['auth', 'verified']);

Route::get('question-add-success', function () {
    return view('temp-question-add-success');
})->middleware(['auth', 'verified']);

require __DIR__.'/auth.php';
