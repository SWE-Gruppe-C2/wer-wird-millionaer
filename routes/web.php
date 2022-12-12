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


Route::get('/question-add', [QuestionController::class, 'questionAdd'])->name('question-add');

Route::resource('question', QuestionController::class)
    ->only(['index', 'edit', 'delete', 'update', 'store','destroy'])
    ->middleware(['auth', 'verified']);

Route::get('/question-filter', [QuestionController::class, 'questionFilter']
)->name('question-filter');

Route::post('/question-filter', [QuestionController::class, 'questionFilter']
)->name('question-filter');

Route::get('/question-delete', [QuestionController::class, 'questionDeletePage'])->name('question-delete');

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

//TEST MERGE

require __DIR__.'/auth.php';
