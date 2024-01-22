<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use App\Http\Requests\BookBuyRequest;
use App\Services\Actions\BookBuyAction;
use App\Exceptions\BookNotFoundException;
use App\Exceptions\IncorrectMoneyAmountException;

class BookBuyController extends Controller
{
    /**
     * @throws BookNotFoundException
     * @throws IncorrectMoneyAmountException
     */
    public function __invoke(BookBuyRequest $request, BookBuyAction $bookBuyAction): JsonResponse
    {
        $bookBuyAction->run(
            $request->getBookId(),
            $request->getAuthorId(),
            $request->getMoney()
        );

        return response()->json(['Book is bought successfully']);
    }
}
