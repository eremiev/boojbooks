@extends('layouts.app')

@section('content')
    <div class="jumbotron">
        <div class="row">
            <div class="col-lg-2"></div>
            <div class="col-lg-8 col-lg-push-3">
                <p><b>Title:</b> {{ $book->title}}</p>
                <p><b>Description:</b> {{ $book->description }}</p>
                <p><b>Rating:</b> {{ $book->rating}}</p>
                <hr class="my-4">
                <p><b>Author:</b> {{ $book->author->name }}</p>
                <div class="text-left">
                    <a href="{{route('books.index')}}">
                        <button class="source-button btn btn-primary btn-xs">Back</button>
                    </a>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection