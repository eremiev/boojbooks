<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Queries\Book\Show;
use App\Queries\Book\Index;
use App\Queries\Book\Store;
use App\Queries\Book\Update;
use App\Queries\Book\Destroy;
use App\Http\Requests\BookRequest;
use Illuminate\Support\Facades\Redirect;

class BookListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param BookRequest $request
     * @return \Illuminate\Http\Response
     */
    public function index(BookRequest $request)
    {
        $inputs = $request->only('column', 'order', 'per_page');
        $books = (new Index($inputs))->run();

        return view('book.index', compact(['books']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $authors = Author::all();

        return view('book.create', compact(['authors']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param BookRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(BookRequest $request)
    {
        $inputs = $request->only('title', 'description', 'rating', 'author_id', 'position');
        (new Store())->run($inputs);

        return Redirect::route('books.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $book = (new Show())->run($id);

        return view('book.show', compact(['book']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $book = (new Show())->run($id);

        return view('book.edit', compact(['book']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param BookRequest $request
     * @param  int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(BookRequest $request, $id)
    {
        (new Update())->run($id, $request);

        return Redirect::route('books.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        (new Destroy())->run($id);

        return Redirect::route('books.index');

    }

}
