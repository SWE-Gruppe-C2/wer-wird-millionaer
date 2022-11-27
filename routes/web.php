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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/category-edit-overview',function(){
    return view('category-edit-overview');
})->name('category-edit-overview');

Route::get('/category-edit',function(){
    return view('category-edit');
})->name('category-edit');

Route::get('/category-edit-success',function(){
    return view('category-edit-success');
})->name('category-edit-success');

require __DIR__.'/auth.php';
