<?php

namespace App\Services\Actions;

use App\Models\Book;
use App\Repositories\Read\Books\BookReadRepositoryInterface;

class GetBookAction
{
    public function __construct(
       protected BookReadRepositoryInterface $bookReadRepository
    ) {
    }

    public function run(int $id): ?Book
    {
        return $this->bookReadRepository->getById($id);
    }

}
