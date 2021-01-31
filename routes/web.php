<?php

use App\Http\Controllers\BookListController;
use Illuminate\Support\Facades\Route;

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
    return view('home');
});


Route::resource('book', BookListController::class, [
    'only' => ['index', 'create', 'store', 'show', 'edit', 'update', 'destroy']
]);