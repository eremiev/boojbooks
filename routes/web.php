<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\BookListController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return Redirect::route('books.index');
});


Route::resource('books', BookListController::class, [
    'only' => ['index', 'create', 'store', 'show', 'edit', 'update', 'destroy']
]);