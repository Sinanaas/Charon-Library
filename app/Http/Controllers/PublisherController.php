<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Publisher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PublisherController extends Controller
{
    public function getAllPublishers() {
        $publishers = Publisher::all();
        return view('view_publishers', ['publishers' => $publishers]);
    }

    public function deletePublisher($id) {
        $publisher = Publisher::find($id);
        $bookcount = Book::where('publisher_id', $id)->count();

        if ($bookcount > 0) {
            return redirect()->route('publishers')->with('error', 'Publisher cannot be deleted because there are books associated with this publisher.');
        }

        if ($publisher) {
            $publisher->delete();
            return redirect()->route('publishers')->with('success', 'Publisher deleted successfully.');
        } else {
            Session::flash('error', 'Publisher not found.');
            return redirect()->route('publishers');
        }
    }

    public function getPublisher($id) {
        $publisher = Publisher::find($id);
        return view('update_publisher', ['publisher' => $publisher]);
    }

    public function updatePublisher($id, Request $request) {
        $publisher = Publisher::find($id);
        if ($publisher) {
            $publisher->name = $request->publisher_name;
            $publisher->save();
            Session::flash('success', 'Publisher updated successfully');
            return redirect()->route('publishers');
        } else {
            Session::flash('error', 'Publisher not found!');
            return redirect()->route('publishers');
        }
    }

    public function createPublisher() {
        return view('create_publisher');
    }

    public function addPublisher(Request $request) {
        $publisher = new Publisher();
        $publisher->name = $request->publisher_name;
        $publisher->save();
        return redirect()->route('publishers')->with('success', 'Publisher added successfully.');
    }
}
