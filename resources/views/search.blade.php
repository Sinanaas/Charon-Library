@extends('layout')
@section('content')
    <div class="d-flex flex-column">
        <h1>Searched Results</h1>
        <div class="d-flex" style="gap: 1%">
            @foreach($books as $book)
                <div class="card" style="width: 15%">
                    <a class="text-body-tertiary" href="{{ route('get_book', ['id' => $book->id]) }}" style="text-decoration: none">
                        <img class="card-img-top" src="images/{{ $book->image }}" alt="">
                        <div class="card-body">
                            <h5 class="card-title">{{ $book->title }}</h5>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
@endsection
