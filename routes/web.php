<?php

use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\PublisherController;
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

//Route::get('/', function () {
//    return view('home', [BookController::class, 'getAllBooks']);
//});

Route::get('/', [BookController::class, 'getAllBooks'])->name('home');

Route::get('/authors/create', [AuthorController::class, 'createAuthor'])->name('create_author');
Route::get('/authors', [AuthorController::class, 'getAllAuthors'])->name('authors');
Route::get('/authors/{id}', [AuthorController::class, 'getAuthor'])->name('get_author');
Route::delete('/authors/{id}', [AuthorController::class, 'deleteAuthor'])->name('delete_author');
Route::put('/authors/{id}', [AuthorController::class, 'updateAuthor'])->name('update_author');
Route::post('/authors', [AuthorController::class, 'addAuthor'])->name('add_author');

Route::get('/publishers/create', [PublisherController::class, 'createPublisher'])->name('create_publisher');
Route::get('/publishers/{id}', [PublisherController::class, 'getPublisher'])->name('get_publisher');
Route::delete('/publishers/{id}', [PublisherController::class, 'deletePublisher'])->name('delete_publisher');
Route::put('/publishers/{id}', [PublisherController::class, 'updatePublisher'])->name('update_publisher');
Route::get('/publishers', [PublisherController::class, 'getAllPublishers'])->name('publishers');

Route::get('/books', [BookController::class, 'getAllBooks'])->name('books');
Route::delete('/books/{id}', [BookController::class, 'deleteBook'])->name('delete_book');
Route::get('/books/{id}', [BookController::class, 'getBook'])->name('get_book');
Route::put('/books/{id}', [BookController::class, 'updateBook'])->name('update_book');

