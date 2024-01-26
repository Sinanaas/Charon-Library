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
                @if(Auth::user()->role == 'admin')
                    <th>Action</th>
                @endif
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
                    <td><img src="../storage/images/{{ $book->image }}" alt="" style="width: 100%;"></td>
                    @if(Auth::user()->role == 'admin')
                        <td class=" gap-2" style="min-height: 100%">
                            <div class="d-flex gap-2">
                                <a class="btn btn-primary" href="{{ route('get_book', ['id' => $book->id]) }}">Update</a>
                                <form action="{{ route('delete_book', ['id' => $book->id]) }}" method="post" onsubmit="return confirm('Are you sure you want to delete this book?');">
                                    @csrf
                                    @method('DELETE')
                                    <input class="btn btn-danger" type="submit" value="Delete">
                                </form>
                            </div>
                        </td>
                    @endif
                </tr>
                </tbody>
            @endforeach
        </table>
    </div>
@endsection
