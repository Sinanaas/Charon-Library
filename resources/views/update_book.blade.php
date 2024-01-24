@extends('layout')
@section('content')
    <div class="container">
        <h1>Update Book</h1>
        <form action="{{ route('update_book', ['id' => $book->id]) }}" method="post">
            @csrf
            @method('PUT')
            <div class="d-flex gap-4">
                <div class="w-25 d-flex flex-column gap-2">
                    <img class="w-100" src="{{ asset('images/' . $image_url) }}" alt="">
                    <input class="form-control" type="file">
                </div>
                <div class="w-50 mb-3 d-flex flex-column gap-2">
                    <label for="id">ID</label>
                    <input type="text" class="form-control" id="id" name="id" value="{{ $book->id }}" readonly>
                    <label for="isbn">ISBN</label>
                    <input type="text" class="form-control" id="isbn" name="isbn" value="{{ $book->isbn }}" readonly>
                    <label for="title" class="form-label">Title</label>
                    <input type="text" class="form-control" id="title" name="title" value="{{ $book->title }}">
                    <label for="stock">Stock</label>
                    <input type="text" class="form-control" id="stock" name="stock" value="{{ $book->stock }}" readonly>
                    <label for="author">Author</label>
                    <select class="form-select" name="author" id="author">
                        @foreach($authors as $author)
                            <option value="{{ $author->id }}" {{ $author->id == $book->author_id ? 'selected' : '' }}>
                                {{ $author->name }}
                            </option>
                        @endforeach
                    </select>
                    <label for="book_publisher">Publisher</label>
                    <select class="form-select" name="publisher" id="publisher">
                        @foreach($publishers as $publisher)
                            <option value="{{ $publisher->id }}" {{ $publisher->id == $book->publisher_id ? 'selected' : '' }}>
                                {{ $publisher->name }}
                            </option>
                        @endforeach
                    </select>
                    <button type="submit" class=" mt-2 btn btn-primary">Update</button>
                </div>
            </div>
        </form>
    </div>
@endsection
