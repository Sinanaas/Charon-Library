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
                    <input class="form-control" id="image" name="image" type="file">
                </div>
                <div class="w-50 mb-3 d-flex flex-column gap-2">
                    <label for="id">ID</label>
                    <input type="text" class="form-control" id="id" name="id" value="{{ $book->id }}" readonly>
                    <label for="isbn">ISBN</label>
                    <input type="text" class="form-control" id="isbn" name="isbn" value="{{ $book->isbn }}" readonly>
                    @if(auth()->user()->role == 'admin')
                        <label for="title" class="form-label">Title</label>
                        <input type="text" class="form-control" id="title" name="title" value="{{ $book->title }}">
                    @endif
                    @if(auth()->user()->role == 'regular')
                        <label for="title" class="form-label">Title</label>
                        <input type="text" class="form-control" id="title" name="title" value="{{ $book->title }}" readonly>
                    @endif
                    <label for="stock">Stock</label>
                    <input type="text" class="form-control" id="stock" name="stock" value="{{ $book->stock }}" readonly>
                    @if(auth()->user()->role == 'admin')
                        <label for="description">Description</label>
                        <textarea class="form-control" name="description" id="description" cols="30" rows="10">{{ $book->description }}</textarea>
                    @endif
                    @if(auth()->user()->role == 'regular')
                        <label for="description">Description</label>
                        <textarea class="form-control" name="description" id="description" cols="30" rows="10" disabled>{{ $book->description }}</textarea>
                    @endif
                    @if(auth()->user()->role == 'admin')
                        <label for="author">Author</label>
                        <select class="form-select" name="author" id="author">
                            @foreach($authors as $author)
                                <option value="{{ $author->id }}" {{ $author->id == $book->author_id ? 'selected' : '' }}>
                                    {{ $author->name }}
                                </option>
                            @endforeach
                        </select>
                    @endif
                    @if(auth()->user()->role == 'regular')
                        <label for="author">Author</label>
                        <input type="text" class="form-control" id="author" name="author" value="{{ $book->author->name }}">
                    @endif
                    @if(auth()->user()->role == 'admin')
                        <label for="book_publisher">Publisher</label>
                        <select class="form-select" name="publisher" id="publisher">
                            @foreach($publishers as $publisher)
                                <option value="{{ $publisher->id }}" {{ $publisher->id == $book->publisher_id ? 'selected' : '' }}>
                                    {{ $publisher->name }}
                                </option>
                            @endforeach
                        </select>
                    @endif
                    @if(auth()->user()->role == 'regular')
                        <label for="publisher">Publisher</label>
                        <input type="text" class="form-control" id="publisher" name="publisher" value="{{ $book->publisher->name }}">
                    @endif
                    @if(auth()->user()->role == 'admin')
                        <button type="submit" class=" mt-2 btn btn-primary">Update</button>
                    @endif
                </div>
            </div>
        </form>
    </div>
@endsection
