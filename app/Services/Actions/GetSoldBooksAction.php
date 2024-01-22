<?php

namespace App\Services\Actions;

use Illuminate\Database\Eloquent\Collection;
use App\Repositories\Read\Books\BookReadRepositoryInterface;
use App\Repositories\Read\Sales\SaleReadRepositoryInterface;

class GetSoldBooksAction
{
    private const TITLE = 'title';

    public function __construct(
        protected SaleReadRepositoryInterface $saleReadRepository,
        protected BookReadRepositoryInterface $bookReadRepository,
    ) {
    }

    public function run(?string $searchBy, ?string $sortBy): Collection
    {
        $sales = $this->saleReadRepository->getAll();
        $bookIds = $sales->unique(null, true)->pluck('book_id')->toArray();

        if (!$sortBy) {
            $sortBy = self::TITLE;
        }

        return $this->bookReadRepository->getByIdsWithSearchAndSort($bookIds, $sortBy, $searchBy);
    }
}
