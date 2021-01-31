<?php

namespace Tests\Unit\Books;

use App\Models\Book;
use App\Enums\ResponseCode;
use Illuminate\Pagination\Paginator;


class ListBooksTest extends BaseBookTest
{

    /**
     * @group books
     * @group books-list
     */
    public function testListBooksOfNonExistingPage()
    {
        $page = 9999;

        Paginator::currentPageResolver(function () use ($page) {
            return $page;
        });

        $books = Book::paginate($this->perPage)->toArray();

        $this->get('/api/books?page=' . $page, $this->headers)
            ->assertStatus(ResponseCode::OK)
            ->assertJson([
                'data' => $books['data']
            ]);
    }

    /**
     * @group books
     * @group books-list
     */
    public function testListFirstTwoBooks()
    {
        $books = Book::paginate(2)->toArray();

        $this->get('/api/books?per_page=2&page=1', $this->headers)
            ->assertStatus(ResponseCode::OK)
            ->assertJson([
                'data' => $books['data']
            ]);
    }

    /**
     * @group books
     * @group books-list
     */
    public function testListBooksSortedByTitleDesc()
    {

        $books = Book::orderBy('title', 'desc')->paginate($this->perPage)->toArray();

        $this->get('/api/books?column=title&order=desc', $this->headers)
            ->assertStatus(ResponseCode::OK)
            ->assertJson([
                'data' => $books['data']
            ]);
    }

}
