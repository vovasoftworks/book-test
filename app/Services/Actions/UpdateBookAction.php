<?php

namespace App\Services\Actions;

use App\Events\WebSocket\BookUpdated;
use App\Models\Book;
use App\Repositories\Read\Books\BookReadRepositoryInterface;
use App\Repositories\Write\Books\BookWriteRepositoryInterface;

class UpdateBookAction
{
    public function __construct(
        protected BookWriteRepositoryInterface $bookWriteRepository,
        protected BookReadRepositoryInterface $bookReadRepository,
    ) {
    }

    public function run(
        int $id,
        ?string $title,
        ?string $description,
        ?string $coverUrl,
        ?float $price,
        ?int $quantity
    ): ?Book {
        $book = $this->bookReadRepository->getById($id);

        $book->description = $description;
        $book->cover_url = $coverUrl;
        $book->price = $price;
        $book->quantity = $quantity;

        if ($title) {
            $book->title = $title;
        }
        $this->bookWriteRepository->save($book);

        BookUpdated::dispatch($book);

        return $book;
    }
}
