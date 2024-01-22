<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GetBookController;
use App\Http\Controllers\BookBuyController;
use App\Http\Controllers\SearchBookController;
use App\Http\Controllers\CreateBookController;
use App\Http\Controllers\DeleteBookController;
use App\Http\Controllers\UpdateBookController;
use App\Http\Controllers\GetSoldBooksController;
use App\Http\Controllers\SearchAuthorController;
use App\Http\Controllers\GetAuthorWithAvatarsBooksController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('book')->group(function () {
    Route::post('/', CreateBookController::class);
    Route::get('/{id}', GetBookController::class);
    Route::put('/{id}', UpdateBookController::class);
    Route::delete('/{id}', DeleteBookController::class);
});

Route::get('books/search', SearchBookController::class);
Route::get('authors/search', SearchAuthorController::class);
Route::post('sale', BookBuyController::class);
Route::get('sold-books', GetSoldBooksController::class);
Route::get('author-avatar/books', GetAuthorWithAvatarsBooksController::class);
