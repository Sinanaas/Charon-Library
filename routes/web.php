<?php

use App\Http\Controllers\AuthController;
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
Route::get('/books', [BookController::class, 'getAllBooks'])->name('books');
Route::get('/publishers', [PublisherController::class, 'getAllPublishers'])->name('publishers');
Route::get('/authors', [AuthorController::class, 'getAllAuthors'])->name('authors');
Route::middleware(['auth', 'isAdmin'])->group(function() {
    Route::get('/authors/create', [AuthorController::class, 'createAuthor'])->name('create_author');
    Route::get('/authors/{id}', [AuthorController::class, 'getAuthor'])->name('get_author');
    Route::delete('/authors/{id}', [AuthorController::class, 'deleteAuthor'])->name('delete_author');
    Route::put('/authors/{id}', [AuthorController::class, 'updateAuthor'])->name('update_author');
    Route::post('/authors', [AuthorController::class, 'addAuthor'])->name('add_author');

    Route::get('/publishers/create', [PublisherController::class, 'createPublisher'])->name('create_publisher');
    Route::get('/publishers/{id}', [PublisherController::class, 'getPublisher'])->name('get_publisher');
    Route::delete('/publishers/{id}', [PublisherController::class, 'deletePublisher'])->name('delete_publisher');
    Route::put('/publishers/{id}', [PublisherController::class, 'updatePublisher'])->name('update_publisher');
    Route::post('/publishers', [PublisherController::class, 'addPublisher'])->name('add_publisher');

    Route::get('/books/create', [BookController::class, 'createBook'])->name('create_book');
    Route::delete('/books/{id}', [BookController::class, 'deleteBook'])->name('delete_book');
    Route::put('/books/{id}', [BookController::class, 'updateBook'])->name('update_book');
    Route::post('/books', [BookController::class, 'addBook'])->name('add_book');
});
Route::get('/books/{id}', [BookController::class, 'getBook'])->name('get_book');

Route::get('/', [AuthController::class, 'home'])->name('home');


Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'checkLogin'])->name('check_login');

Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register', [AuthController::class, 'registerUser'])->name('register_user');

Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/home', [AuthController::class, 'regularHome'])->name('regular_home');

Route::get('/search', [BookController::class, 'searchBooks'])->name('search_books');

