<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BookController extends Controller
{
    //
    public function getAllBooks() {
        $books = Book::all();
        return view('home', ['books' => $books]);
    }
}
