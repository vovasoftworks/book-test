<?php

namespace App\Services\Actions;

use App\Repositories\Write\Books\BookWriteRepositoryInterface;

class DeleteBookAction
{
    public function __construct(
        protected BookWriteRepositoryInterface $bookWriteRepository
    ) {
    }

    public function run(int $id): void
    {
        $this->bookWriteRepository->delete($id);
    }

}
