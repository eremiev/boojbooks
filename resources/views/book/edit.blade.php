@extends('layouts.app')

@section('content')
    <div class="jumbotron">
        <div class="row">
            <div class="col-lg-2"></div>
            <div class="col-lg-10 col-lg-push-3">

                {!! Form::open(['route' => ['books.update', $book->id],
                                'method' => 'PUT',
                                'class'=>'form-horizontal']) !!}
                <fieldset>
                    <legend>Update Book Position</legend>

                    @include('errors.validation')

                    <div class="form-group">
                        <label for="title" class="col-lg-2 control-label">Title</label>
                        <div class="col-lg-10">
                            <input type="text" id="title" class="form-control" disabled name="title"
                                   placeholder="Enter title"
                                   value="{{  $book->title }}"/>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="author" class="col-lg-2 control-label">Author</label>
                        <div class="col-lg-10">
                            <input type="text" id="title" class="form-control" disabled name="title"
                                   placeholder="Enter title"
                                   value="{{ $book->author->name }}"/>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="rating" class="col-lg-2 control-label">Rating</label>
                        <div class="col-lg-10">
                            <input type="number" min="0" max="6" id="rating" class="form-control" disabled name="rating"
                                   placeholder="Enter rating" value="{{  $book->rating }}"/>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="position" class="col-lg-2 control-label">Position</label>
                        <div class="col-lg-10">
                            <input type="number" min="0" id="position" class="form-control" name="position"
                                   placeholder="Enter position" value="{{  $book->position }}"/>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="description" class="col-lg-2 control-label">Description</label>
                        <div class="col-lg-10">
                    <textarea id="description" class="form-control" disabled placeholder="Enter description"
                              name="description" cols="50" rows="10">{{  $book->description }}</textarea>
                        </div>
                    </div>

                    <div class="form-group pull-right">
                        <div id="buttons">
                            <button type="submit" class="btn btn-primary">Update</button>
                            <a href="{{route('books.index')}}" class="btn btn-primary btn-xs">Back</a>
                        </div>
                    </div>
                </fieldset>

                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection