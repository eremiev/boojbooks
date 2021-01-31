<?php

namespace App\Queries\Book;


use App\Models\Book;

class Show
{
    public function run($id)
    {
        return Book::with('author')->findOrFail($id);
    }
}