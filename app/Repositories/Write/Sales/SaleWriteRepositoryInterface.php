<?php

namespace App\Repositories\Write\Sales;

use App\Models\Sale;

interface SaleWriteRepositoryInterface
{
    public function create(int $bookId, int $authorId, float $money): Sale;
}
