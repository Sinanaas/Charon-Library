@extends('layout')
@section('content')
    <div class="container">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        <table class="table">
            <thead>
            <tr>
{{--                <th>ID</th>--}}
                <th>ISBN</th>
                <th>Title</th>
                <th>Stock</th>
                <th>Author</th>
                <th>Publisher</th>
                <th>Description</th>
                <th>Image</th>
                <th>Action</th>
            </tr>
            </thead>
            @foreach($books as $book)
                <tbody>
                <tr>
{{--                    <td>{{ $book->id }}</td>--}}
                    <td>{{ $book->isbn }}</td>
                    <td>{{ $book->title }}</td>
                    <td>{{ $book->stock }}</td>
                    <td>{{ $book->author->name }}</td>
                    <td>{{ $book->publisher->name }}</td>
                    <td>{{ $book->description }}</td>
                    <td><img src="images/{{ $book->image }}" alt=""></td>
                    <td class="d-flex gap-2">
                        <a class="btn btn-primary" href="{{ route('get_book', ['id' => $book->id]) }}">Update</a>
                        <form action="{{ route('delete_book', ['id' => $book->id]) }}" method="post" onsubmit="return confirm('Are you sure you want to delete this book?');">
                            @csrf
                            @method('DELETE')
                            <input class="btn btn-danger" type="submit" value="Delete">
                        </form>
                    </td>
                </tr>
                </tbody>
            @endforeach
        </table>
    </div>
@endsection
