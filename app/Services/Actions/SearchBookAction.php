<?php

namespace App\Services\Actions;

use Illuminate\Database\Eloquent\Collection;
use App\Repositories\Read\Books\BookReadRepositoryInterface;

class SearchBookAction
{
    public function __construct(
        protected BookReadRepositoryInterface $bookReadRepository
    ) {
    }

    public function run(string $search): Collection
    {
        return $this->bookReadRepository->searchByTitleOrDescription($search);
    }
}
