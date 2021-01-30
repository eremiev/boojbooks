<?php

namespace App\Queries\Book;


use App\Models\Book;
use App\Http\Requests\BookRequest;

class Index
{
    public function run(BookRequest $request)
    {
        $books = (new Book)->newQuery();

        if ($request->has('column')) {
            $books = $books->orderBy($request->get('column'), $request->get('order'));
        } else {
            $books = $books->orderBy('position');
        }

        $books->paginate(10);

        return $books;
    }
}