@extends('layouts.app')

@section('content')

    <div class="col-lg-10 col-lg-push-1">

        {!! Form::open(['route' => ['book.store'],
                        'method' => 'POST',
                        'class'=>'form-horizontal'
                        ]) !!}
        <fieldset>
            <legend>Create Book</legend>

            <div class="form-group">
                <label for="title" class="col-lg-2 control-label">Title</label>
                <div class="col-lg-10">
                    <input type="text" id="title" class="form-control" required name="title" placeholder="Enter title"
                           value="{{ old('title') }}"/>
                </div>
            </div>

            <div class="form-group">
                <label for="author" class="col-lg-2 control-label">Author</label>
                <div class="col-lg-10">
                    <select class="custom-select" id="author" name="author_id" required>
                        <option value="">Select author</option>
                        @foreach ($authors as $author)
                            <option value="{{ $author->id }}">{{ $author->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label for="rating" class="col-lg-2 control-label">Rating</label>
                <div class="col-lg-10">
                    <input type="number" min="0" max="6" id="rating" class="form-control" required name="rating"
                           placeholder="Enter rating" value="{{ old('rating') }}"/>
                </div>
            </div>

            <div class="form-group">
                <label for="position" class="col-lg-2 control-label">Position</label>
                <div class="col-lg-10">
                    <input type="number" min="0" id="position" class="form-control" name="position"
                           placeholder="Enter position" value="{{ old('position') }}"/>
                </div>
            </div>

            <div class="form-group">
                <label for="description" class="col-lg-2 control-label">Description</label>
                <div class="col-lg-10">
                    <textarea id="description" class="form-control" required placeholder="Enter description"
                              name="description" cols="50" rows="10">{{ old('description')}}</textarea>
                </div>
            </div>

            <div class="form-group pull-right">
                <div id="buttons">
                    <button type="submit" class="btn btn-primary">Save</button>

                </div>
            </div>
        </fieldset>

        {!! Form::close() !!}
    </div>
@endsection