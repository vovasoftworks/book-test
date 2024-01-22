<?php

namespace App\Http\Controllers;

use App\Http\Resources\BookResource;
use App\Http\Requests\GetSoldBooksRequest;
use App\Services\Actions\GetSoldBooksAction;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class GetSoldBooksController extends Controller
{
    public function __invoke(
        GetSoldBooksRequest $request,
        GetSoldBooksAction $getSoldBooksAction
    ): AnonymousResourceCollection {
        $search = $request->getSearchBY();
        $sortBy = $request->getSortBy();

        $books = $getSoldBooksAction->run($search, $sortBy);

        return BookResource::collection($books);
    }
}
