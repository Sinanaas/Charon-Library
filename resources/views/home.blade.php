@extends('layout')
@section('content')
    <div class="container">
        @foreach($books as $book)
            <h1>{{ $book->title }}</h1>

        @endforeach
    </div>
@endsection
