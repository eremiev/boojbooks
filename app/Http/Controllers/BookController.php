<?php

namespace App\Http\Controllers;

use App\Enums\ResponseCode;
use App\Queries\Book\Index;
use App\Queries\Book\Show;
use App\Queries\Book\Store;
use App\Queries\Book\Update;
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
        $inputs = $request->only('column', 'order', 'per_page');

        $books = (new Index($inputs))->run();

        return response()->json($books, ResponseCode::OK);
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
        $book = (new Store())->run($inputs);

        return response()->json($book, ResponseCode::CREATED);
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

        return response()->json($book, ResponseCode::OK);
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
        $book = (new Update())->run($id, $request);

        return response()->json($book, ResponseCode::OK);
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

        return response()->json(null,ResponseCode::OK);
    }
}
