<?php

namespace App\Queries\Book;


use App\Models\Book;

class Destroy {

	/**
	 * @param $id
	 */
	public function run($id) {
		$book = Book::findOrFail($id);
		$book->delete();
	}
}