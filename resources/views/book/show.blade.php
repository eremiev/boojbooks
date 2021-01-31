@extends('layouts.app')

@section('content')
    <div class="jumbotron">
        <a href="{{route('book.index')}}" ><button class="btn btn-light">Back</button></a>
        <p><b>Title:</b> {{ $book->title}}</p>
        <p><b>Description:</b> {{ $book->description }}</p>
        <p><b>Rating:</b> {{ $book->rating}}</p>
        <hr class="my-4">
        <p><b>Author:</b> {{ $book->author->name }}</p>
    </div>
@endsection