<?php

namespace App\Http\Controllers;

use App\Http\Resources\BookResource;
use App\Services\Actions\GetAuthorWithAvatarsBooksAction;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class GetAuthorWithAvatarsBooksController extends Controller
{
    public function __invoke(
        GetAuthorWithAvatarsBooksAction $getAuthorWithAvatarsBooksAction
    ): AnonymousResourceCollection {
        $books = $getAuthorWithAvatarsBooksAction->run();

        return BookResource::collection($books);
    }
}
