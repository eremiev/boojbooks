<?php

namespace App\Queries\Book;

use App\Models\Book;

class Update
{
    public function run($id, $inputs)
    {
        return Book::where('id', $id)
            ->update([
                'title' => $inputs['title'],
                'description' => $inputs['description'],
                'rating' => $inputs['rating'],
                'position' => $inputs['position'],
            ]);
    }
}