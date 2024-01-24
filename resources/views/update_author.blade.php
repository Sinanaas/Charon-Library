@extends('layout')
@section('content')
    <div class="container">
        <h1>Update Author</h1>
        <form action="{{ route('update_author', ['id' => $author->id]) }}" method="post">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="author_name" class="form-label">Author Name</label>
                <input type="text" class="form-control" id="author_name" name="author_name" value="{{ $author->name }}">
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
