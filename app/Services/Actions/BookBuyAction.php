<?php

namespace App\Services\Actions;

use App\Models\Sale;
use App\Events\WebSocket\BookSold;
use App\Exceptions\BookNotFoundException;
use App\Exceptions\IncorrectMoneyAmountException;
use App\Repositories\Read\Books\BookReadRepositoryInterface;
use App\Repositories\Write\Sales\SaleWriteRepositoryInterface;
use App\Repositories\Read\AuthorBook\AuthorBookReadRepositoryInterface;

class BookBuyAction
{
    public function __construct(
        protected BookReadRepositoryInterface $bookReadRepository,
        protected SaleWriteRepositoryInterface $saleWriteRepository,
        protected AuthorBookReadRepositoryInterface $authorBookReadRepository,
    ) {
    }

    /**
     * @throws BookNotFoundException
     * @throws IncorrectMoneyAmountException
     */
    public function run(int $bookId, int $authorId, int $money): Sale
    {
        $isBookBelongsToAuthor = $this->authorBookReadRepository->getByAuthorIdAndBookId($authorId, $bookId);
        if (!$isBookBelongsToAuthor) {
            throw new BookNotFoundException();
        }

        $book = $this->bookReadRepository->getById($bookId);
        if ($money < $book->price) {
            throw new IncorrectMoneyAmountException();
        }

        $sale = $this->saleWriteRepository->create($bookId, $authorId, $money);
        BookSold::dispatch($sale);

        return $sale;
    }
}
