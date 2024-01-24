@extends('layout')
@section('content')
    <div class="container">
        <h1>Update Publisher</h1>
        <form action="{{ route('update_publisher', ['id' => $publisher->id]) }}" method="post">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="author_name" class="form-label">Publisher Name</label>
                <input type="text" class="form-control" id="publisher_name" name="publisher_name" value="{{ $publisher->name }}">
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
