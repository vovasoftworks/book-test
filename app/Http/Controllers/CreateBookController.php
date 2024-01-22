<?php

namespace App\Http\Controllers;

use App\Http\Resources\BookResource;
use App\Http\Requests\CreateBookRequest;
use App\Services\Actions\CreateBookAction;

/**
 * @OA\Info(
 *     title="Test swagger",
 *     version="1.0.0",
 *     description="Test swagger"
 * )
 */
class CreateBookController extends Controller
{
    /**
     * @OA\Post(
     *    path="/api/book",
     *    summary="Run book create action",
     *    tags={"Book"},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *            @OA\Property(property="author_id", type="int", description="author identifier"),
     *            @OA\Property(property="title", type="string", description="description of book"),
     *            @OA\Property(property="cover_url", type="string", description="cover url"),
     *            @OA\Property(property="price", type="float", description="price of book"),
     *            @OA\Property(property="quantity", type="int", description="quantity of book")
     *         )
     *     ),
     *     @OA\Response(
     *          response=400,
     *          description="Bad request"
     *    )
     * )
     */

    public function __invoke(CreateBookRequest $request, CreateBookAction $createBookAction): BookResource
    {
        $book = $createBookAction->run(
            $request->getAuthorId(),
            $request->getTitle(),
            $request->getDescription(),
            $request->getCoverUrl(),
            $request->getPrice(),
            $request->getQuantity()
        );

        return new BookResource($book);
    }
}
