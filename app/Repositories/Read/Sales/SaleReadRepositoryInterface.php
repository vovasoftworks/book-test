<?php

namespace App\Repositories\Read\Sales;

use Illuminate\Database\Eloquent\Collection;

interface SaleReadRepositoryInterface
{
    public function getAll(): Collection;
}
