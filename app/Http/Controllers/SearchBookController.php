<?php

namespace App\Http\Controllers;

use App\Http\Resources\BookResource;
use App\Http\Requests\SearchBookRequest;
use App\Services\Actions\SearchBookAction;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class SearchBookController extends Controller
{
    public function __invoke(
        SearchBookRequest $request,
        SearchBookAction $searchBookAction
    ): AnonymousResourceCollection {
        $books = $searchBookAction->run($request->getSearchBookBy());

        return BookResource::collection($books);
    }
}
