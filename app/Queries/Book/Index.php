<?php

namespace App\Queries\Book;


use App\Models\Book;
use App\Http\Requests\BookRequest;

class Index
{
    public function run(BookRequest $request)
    {

        if ($request->has('column')) {
            $query = Book::orderBy($request->get('column'), !empty($request->get('order')) ? $request->get('order') : 'asc');
        } else {
            $query = Book::orderBy('position');
        }

        $books = $query->get();

        return $books;
    }
}