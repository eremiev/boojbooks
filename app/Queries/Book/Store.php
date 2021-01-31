<?php

namespace App\Queries\Book;


use App\Models\Author;
use App\Models\Book;

class Store
{
    public function run($inputs)
    {
        return Book::create([
            'title' => $inputs['title'],
            'description' => $inputs['description'],
            'rating' => $inputs['rating'],
            'position' => isset($inputs['position']) ? $inputs['position'] : null,
            'author_id' => Author::findOrFail($inputs['author_id'])->id
        ]);
    }
}