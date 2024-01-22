<?php

namespace App\Http\Controllers;

use App\Http\Resources\AuthorResource;
use App\Http\Requests\SearchAuthorRequest;
use App\Services\Actions\SearchAuthorAction;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class SearchAuthorController extends Controller
{
    public function __invoke(
        SearchAuthorRequest $request,
        SearchAuthorAction $searchAuthorAction
    ): AnonymousResourceCollection {
        $authors = $searchAuthorAction->run($request->getFullName());

        return AuthorResource::collection($authors);
    }
}
