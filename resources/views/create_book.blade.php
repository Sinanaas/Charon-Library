@extends('layout')
@section('content')
    <div class="container">
        <h1>Create Book</h1>
        <form action="{{ route('add_book') }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('POST')
            <div class="w-50 mb-3 d-flex flex-column gap-2">
                <label for="isbn">ISBN</label>
                <input type="text" class="form-control" id="isbn" name="isbn">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control" id="title" name="title">
                <label for="stock">Stock</label>
                <input type="text" class="form-control" id="stock" name="stock">
                <label for="author">Author</label>
                <select class="form-select" name="author" id="author">
                    @foreach($authors as $author)
                        <option value="{{ $author->id }}">
                            {{ $author->name }}
                        </option>
                    @endforeach
                </select>
                <label for="publisher">Publisher</label>
                <select class="form-select" name="publisher" id="publisher">
                    @foreach($publishers as $publisher)
                        <option value="{{ $publisher->id }}">
                            {{ $publisher->name }}
                        </option>
                    @endforeach
                </select>
                <label for="image">Image</label>
                <input class="form-control" id="image" name="image" type="file">
                <button type="submit" class=" mt-2 btn btn-primary">Create</button>
            </div>
        </form>
    </div>
@endsection
