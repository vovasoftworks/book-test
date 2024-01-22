<?php

namespace App\Repositories\Write\Sales;

use App\Models\Sale;
use Illuminate\Database\Eloquent\Builder;

class SaleWriteRepository implements SaleWriteRepositoryInterface
{
    private function query(): Builder
    {
        return Sale::query();
    }

    public function create(int $bookId, int $authorId, float $money): Sale
    {
        /**@var Sale $sale */
        $sale = $this->query()->create([
            'author_id' => $authorId,
            'book_id' => $bookId,
            'price' => $money
        ]);

        return $sale;
    }
}
