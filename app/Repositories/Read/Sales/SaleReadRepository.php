<?php

namespace App\Repositories\Read\Sales;

use App\Models\Sale;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

class SaleReadRepository implements SaleReadRepositoryInterface
{
    private function query(): Builder
    {
        return Sale::query();
    }

    public function getAll(): Collection
    {
        return $this->query()->get();
    }
}
