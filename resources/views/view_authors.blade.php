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
                    <th>ID</th>
                    <th>Author Name</th>
                    <th>Action</th>
                </tr>
            </thead>
            @foreach($authors as $author)
            <tbody>
                <tr>
                    <td>{{ $author->id }}</td>
                    <td>{{ $author->name }}</td>
                    <td class="d-flex gap-2">
                        <a class="btn btn-primary" href="{{ route('get_author', ['id' => $author->id]) }}">Update</a>
                        <form action="{{ route('delete_author', ['id' => $author->id]) }}" method="post" onsubmit="return confirm('Are you sure you want to delete this author?');">
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
