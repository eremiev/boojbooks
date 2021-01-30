<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Queries\Book\Index;
use App\Queries\Book\Store;
use Illuminate\Http\Request;
use App\Queries\Book\Destroy;
use App\Http\Requests\BookRequest;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param BookRequest $request
     * @return \Illuminate\Http\Response
     */
    public function index(BookRequest $request)
    {

        dd('api.index');

        $books = (new Index())->run($request);

        return response()->json($books, 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param BookRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(BookRequest $request)
    {
        dd('api.store');

        $inputs = $request->only('title', 'description', 'rating', 'author', 'position');
        $book = (new Store())->run($inputs);

        return response()->json($book, 202);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        dd('api.show');

        $book = Book::findOrFail($id);

        return response()->json($book, 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        dd('api.update');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        dd('api.destroy');

        (new Destroy())->run($id);

        return response()->json(null,200);
    }
}
