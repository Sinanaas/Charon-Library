@extends('layout')
@section('content')
    <div class="container">
        <h1>Create Publisher</h1>
        <form action="{{ route('add_publisher') }}" method="post">
            @csrf
            @method('POST')
            <div class="mb-3">
                <label for="author_name" class="form-label">Publisher Name</label>
                <input type="text" class="form-control" id="publisher_name" name="publisher_name">
            </div>
            <button type="submit" class="btn btn-primary">Create</button>
        </form>
    </div>
@endsection
