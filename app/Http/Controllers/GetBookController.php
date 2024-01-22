<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\BookResource;
use App\Services\Actions\GetBookAction;

class GetBookController extends Controller
{
    public function __invoke(Request $request, GetBookAction $getBookAction): BookResource
    {
        $bookId = $request->route('id');
        $book = $getBookAction->run($bookId);

        return new BookResource($book);
    }
}
