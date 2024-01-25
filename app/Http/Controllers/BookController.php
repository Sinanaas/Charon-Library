<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;
use App\Models\Publisher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

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
            $book->title = $request->title;
            $book->description = $request->description;
            $book->publisher_id = $request->publisher;
            $book->author_id = $request->author;
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $name = $image->getClientOriginalName();
                $destinationPath = public_path('/images');
                $image->move($destinationPath, $name);
                $book->image = $name;
            }

            $book->save();
            return redirect()->route('books')->with('success', 'Book updated successfully!');
        } else {
            Session::flash('error', 'Book is not exist!');
            return redirect()->route('books');
        }
    }

    public function createBook() {
        $publishers = Publisher::all();
        $authors = Author::all();
        return view('create_book', ['publishers' => $publishers, 'authors' => $authors]);
    }

    public function addBook(Request $request) {
//        $request->validate([
//            'isbn' => 'required|unique:books',
//            'title' => 'required',
//            'description' => 'required',
//            'publisher' => 'required',
//            'author' => 'required',
//        ]);

        $book = new Book();

        if ($request->hasFile('image')) {
//            dd($request->all());
            $file = $request->file('image');
            $fileName = uniqid() . '_' . $file->getClientOriginalName();
            $subDirectory = 'images';
            $path = $file->storeAs($subDirectory, $fileName, 'public');
            Storage::disk('local')->put('images', $file);
            $book->image = $path;
        }
        $book->isbn = $request->isbn;
        $book->title = $request->title;
        $book->description = $request->description;
        $book->publisher_id = $request->publisher;
        $book->author_id = $request->author;
        $book->stock = $request->stock;
        $book->save();
        return redirect()->route('books')->with('success', 'Book added successfully!');
    }

    public function searchBooks(Request $request) {
//        dd($request);
        $books = Book::where('title', 'like', '%' . $request->input('search') . '%')->get();
        return view('search', ['books' => $books]);
    }
}
