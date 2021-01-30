<?php

namespace App\Queries\Book;


use App\Models\Book;

class Store
{
    public function run($inputs)
    {
        return Book::create([
            'title' => $inputs['title'],
            'description' => $inputs['description'],
            'rating' => $inputs['rating'],
            'position' => $inputs['position'],
        ]);
    }
}