<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateBookRequest;
use App\Http\Resources\BookResource;
use App\Services\Actions\UpdateBookAction;

class UpdateBookController extends Controller
{
    public function __invoke(UpdateBookRequest $request, UpdateBookAction $updateBookAction): BookResource
    {
        $book = $updateBookAction->run(
            $request->getBookId(),
            $request->getTitle(),
            $request->getDescription(),
            $request->getCoverUrl(),
            $request->getPrice(),
            $request->getQuantity()
        );

        return new BookResource($book);
    }

}
