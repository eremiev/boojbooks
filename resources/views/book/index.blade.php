@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-lg-12">
            <a href="{{route('books.create')}}">
                <button class="source-button btn btn-primary btn-xs">Add Book</button>
            </a>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-2">
        </div>
        <div class="col-lg-8">
            <div class="bs-component">
                <ul class="list-group">
                    @foreach($books as $book)
                        <li class="list-group-item text-center" href="{{ route('books.edit',[$book->id],false) }}">
                            <div class="row">
                                <div class="col-lg-8" style="margin: auto;">
                                    {{$book->title}}

                                </div>
                                <div class="col-lg-4">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <a href="{{ URL::route('books.edit',[$book->id],false) }}" class="btn btn-xs btn-primary pull-left">Edit</a>
                                        </div>
                                        <div class="col-lg-6">
                                            {!! Form::open([
                                          'route' => ['books.destroy', $book->id],
                                          'method' => 'delete',
                                          'class' => '']) !!}
                                            {!! Form::submit('Delete',
                                            [ 'class' => 'btn btn-xs btn-danger pull-right',
                                            'onclick' => "return confirm('Are you sure?');" ]) !!}
                                            {!! Form::close() !!}
                                        </div>
                                    </div>
                                </div>

                            </div>


                        </li>
                @endforeach

            </div>
        </div>
    </div>
@endsection