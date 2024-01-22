<?php

namespace App\Services\Actions;

use App\Models\Book;
use App\Repositories\Write\Books\BookWriteRepositoryInterface;

class CreateBookAction
{
    public function __construct(
        protected BookWriteRepositoryInterface $bookWriteRepository
    ) {
    }

    public function run(
        int $authorId,
        string $title,
        ?string $description,
        ?string $coverUrl,
        ?float $price,
        ?int $quantity
    ): Book {
        $book = new Book();

        $book->title = $title;
        $book->description = $description;
        $book->cover_url = $coverUrl;
        $book->price = $price;
        $book->quantity = $quantity;

        $this->bookWriteRepository->save($book);

        $book->authors()->attach($authorId);

        return $book;
    }

}
