<?php

namespace App\Services\Actions;

use Illuminate\Database\Eloquent\Collection;
use App\Repositories\Read\Authors\AuthorReadRepositoryInterface;

class SearchAuthorAction
{
    public function __construct(
        protected AuthorReadRepositoryInterface $authorReadRepository
    ) {
    }

    public function run(string $fullName): Collection
    {
        return $this->authorReadRepository->searchByFullName($fullName);
    }
}
