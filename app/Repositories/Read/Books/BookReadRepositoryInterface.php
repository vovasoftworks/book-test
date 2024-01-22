<?php

namespace App\Repositories\Read\Books;

use App\Models\Book;
use Illuminate\Database\Eloquent\Collection;

interface BookReadRepositoryInterface
{
    public function getById(int $id): ?Book;
    public function searchByTitleOrDescription(string $search): Collection;
    public function getByIdsWithSearchAndSort(array $ids, ?string $sortBy, ?string $search);
    public function getByIds(array $ids): Collection;
}
