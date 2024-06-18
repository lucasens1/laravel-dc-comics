<?php

use App\Http\Controllers\ComicController;
use App\Http\Controllers\ComicTrashController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('home');
});

Route::resource('comics', ComicController::class);

/* 
Rotte per il cestino 
*/
Route::get('/trash', [ComicTrashController::class, 'index'])->name('comics.trash');
Route::post('/comics/{id}/restore', [ComicTrashController::class, 'restore'])->name('comics.restore');
Route::delete('/comics/{id}/force-delete', [ComicTrashController::class, 'forceDelete'])->name('comics.force-delete');