<?php

namespace App\Queries\Book;


use App\Models\Book;

class Index
{
    private $column;
    private $order;
    private $perPage;

    public function __construct($inputs)
    {
        $this->column = isset($inputs['column']) && in_array($inputs['column'], (new Book())->getTableColumns()) ? $inputs['column'] : null;
        $this->order = isset($inputs['order']) ? $inputs['order'] : 'asc';
        $this->perPage = isset($inputs['per_page']) ? $inputs['per_page'] : 10;
    }

    public function run()
    {
        if (!empty($this->column)) {
            $query = Book::orderBy($this->column, $this->order);
        } else {
            $query = Book::orderBy('position');
        }

        $books = $query->paginate($this->perPage);

        return $books;
    }
}