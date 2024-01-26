<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AuthorController extends Controller
{
    //
    public function getAllAuthors() {
        $authors = Author::all();
        return view('view_authors', ['authors' => $authors]);
    }

    public function updateAuthor($id, Request $request) {
        $author = Author::find($id);
        if ($author) {
            $author->name = $request->author_name;
            $author->save();
            return redirect()->route('authors')->with('success', 'Author updated successfully.');
        } else {
            return redirect()->route('authors')->with('error', 'Author not found.');
        }
    }

    public function getAuthor($id) {
        $author = Author::find($id);
        return view('update_author', ['author' => $author]);
    }

    public function deleteAuthor($id) {
        $author = Author::find($id);
        $booksCount = Book::where('author_id', $id)->count();

        if ($booksCount > 0) {
            return redirect()->route('authors')->with('error', 'Author cannot be deleted because there are books associated with this author.');
        }

        if ($author) {
            $author->delete();
            return redirect()->route('authors')->with('success', 'Author deleted successfully.');
        } else {
            return redirect()->route('authors')->with('error', 'Author not found.');
        }
    }

    public function addAuthor(Request $request) {
        $author = new Author();
        $author->name = $request->author_name;
        $author->save();
        return redirect()->route('authors')->with('success', 'Author added successfully.');
    }

    public function createAuthor() {
        return view('create_author');
    }
}
