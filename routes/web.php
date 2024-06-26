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



Route::resource('/authors', AuthorController::class);
Route::get('/api/authors', [AuthorController::class, 'api'])->name('author.api');


Route::resource('/publishers', PublisherController::class);
Route::get('/api/publishers', [PublisherController::class,'api'])->name('publisher.api');

Route::resource('books', BookController::class);
Route::get('/api/books', [BookController::class, 'api'])->name('book.api');

Route::get('/members', [MemberController::class, 'index'])->name('members');
Route::get('/catalogs', [CatalogController::class, 'index'])->name('catalogs');
Route::get('/catalogs/create', [CatalogController::class, 'create'])->name('catalog.create');
Route::post('/catalogs', [CatalogController::class, 'store'])->name('catalog.create');
Route::get('/catalogs/{catalog}/edit', [App\Http\Controllers\CatalogController::class, 'edit']);
Route::put('/catalogs/{catalog}', [App\Http\Controllers\CatalogController::class, 'update']);
Route::delete('/catalogs/{catalog}', [App\Http\Controllers\CatalogController::class, 'destroy']);


