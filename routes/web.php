<?php

use App\Http\Controllers\QuestionController;
use App\Http\Controllers\CategoryController;
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

Route::get('system-control', function(){
    return view('system-control');
});

/*
Route::get('/question-edit', [QuestionController::class, 'edit'])->name('question-edit');
Route::get('/question-delete', [QuestionController::class, 'delete'])->name('question-delete');
Route::get('/question-update', [QuestionController::class, 'update'])->name('question-update');

//Catalog Seite entspricht index Method
Route::resource('questions', QuestionController::class)
    ->only(['index', 'edit', 'store', 'delete', 'update'])
    ->middleware(['auth', 'verified']);

*/

Route::get('/question-add', [QuestionController::class, 'questionAdd']);

Route::resource('question', QuestionController::class)
    ->only(['index', 'edit', 'delete', 'update', 'store'])
    ->middleware(['auth', 'verified']);

Route::resource('category', CategoryController::class)
    ->only(['index', 'edit', 'update', 'success'])
    ->middleware(['auth', 'verified']);

Route::get('/category-edit-success',function(){
    return view('category-edit-success');
})->name('category-edit-success');

require __DIR__.'/auth.php';
