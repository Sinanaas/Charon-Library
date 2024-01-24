<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;
use App\Models\Publisher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class BookController extends Controller
{
    //
    public function getAllBooks() {
        $books = Book::all();
        return view('view_books', ['books' => $books]);
    }

    public function deleteBook($id) {
        $book = Book::find($id);
        if ($book) {
            $book->delete();
            return redirect()->route('books')->with('success', 'Book deleted successfully!');
        } else {
            Session::flash('error', 'Book is not exist!');
            return redirect()->route('books');
        }
    }

    public function getBook($id) {
        $book = Book::find($id);
        $publishers = Publisher::all();
        $authors = Author::all();
        $image_url = $book->image;
        if ($book) {
            return view('update_book', ['book' => $book, 'publishers' => $publishers, 'authors' => $authors, 'image_url' => $image_url]);
        }
    }

    public function updateBook($id, Request $request) {
        $book = Book::find($id);
        if ($book) {
            if ($request->title == null) {
                $book->title = $request->title;
            }
            if ($request->description == null) {
                $book->description = $request->description;
            }
            if ($request->publisher_id == null) {
                $book->publisher_id = $request->publisher;
            }
            if ($request->author_id == null) {
                $book->author_id = $request->author;
            }
            $book->save();
            return redirect()->route('books')->with('success', 'Book updated successfully!');
        } else {
            Session::flash('error', 'Book is not exist!');
            return redirect()->route('books');
        }
    }
}
