@extends('layout')
@section('content')
    <div class="container">
        <h1>Create Author</h1>
        <form action="{{ route('add_author') }}" method="post">
            @csrf
            @method('POST')
            <div class="mb-3">
                <label for="author_name" class="form-label">Author Name</label>
                <input type="text" class="form-control" id="author_name" name="author_name">
            </div>
            <button type="submit" class="btn btn-primary">Create</button>
        </form>
    </div>
@endsection
