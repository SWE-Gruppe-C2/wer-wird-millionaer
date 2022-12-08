<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\CategoryController;

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


Route::get('/category-add', function(){
    return view('category-add');
})->middleware(['auth', 'verified']);

Route::post('category-add', [CategoryController::class, 'store'])->name('category-add.store');

Route::get('category-add-success', function(){
    return view('category-add-success');
})->middleware(['auth', 'verified']);






require __DIR__.'/auth.php';
