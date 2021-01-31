<?php

namespace App\Queries\Book;

use App\Models\Book;

class Update
{
    public function run($id, $request)
    {
        $book = Book::where('id', $id);

        if ($request->has('position')) {
            $book->update(['position' => $request->input('position')]);
        }

        return $book;
    }
}