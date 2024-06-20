<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\CatalogController;
use App\Http\Controllers\PublisherController;

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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/catalog/{id}', [CatalogController::class, 'index'])->name('catalog');



Route::resource('/authors', App\Http\Controllers\AuthorController::class);
Route::get('/books', [BookController::class, 'index'])->name('books');
Route::get('/members', [MemberController::class, 'index'])->name('members');
Route::get('/publishers', [PublisherController::class, 'index'])->name('publishers');

Route::get('/catalogs', [CatalogController::class, 'index'])->name('catalogs');
Route::get('/catalogs/create', [CatalogController::class, 'create'])->name('catalog.create');
Route::post('/catalogs', [CatalogController::class, 'store'])->name('catalog.create');
Route::get('/catalogs/{catalog}/edit', [App\Http\Controllers\CatalogController::class, 'edit']);
Route::put('/catalogs/{catalog}', [App\Http\Controllers\CatalogController::class, 'update']);
Route::delete('/catalogs/{catalog}', [App\Http\Controllers\CatalogController::class, 'destroy']);


