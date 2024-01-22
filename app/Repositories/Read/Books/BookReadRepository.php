<?php

namespace App\Repositories\Read\Books;

use App\Models\Book;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;

class BookReadRepository implements BookReadRepositoryInterface
{
    private function query(): Builder
    {
        return Book::query();
    }

    public function getById(int $id): ?Book
    {
        /**@var Book $book */
        $book = $this->query()
            ->where('id', $id)
            ->first();

        return $book;
    }

    public function searchByTitleOrDescription(string $search): Collection
    {
        return $this->query()
            ->where('title', 'like', "%{$search}%")
            ->orWhere('description', 'like', "%{$search}%")
            ->orderBy('price')
            ->get();
    }

    public function getByIdsWithSearchAndSort(array $ids, ?string $sortBy, ?string $search): Collection
    {
        return $this->query()
            ->whereIn('id', $ids)
            ->when($search, fn(Builder $query)
               => $query->where('title', 'like', "%$search%")
            )
            ->orderBy($sortBy)
            ->get();
    }

    public function getByIds(array $ids): Collection
    {
        return $this->query()
            ->join('sales', 'books.id', '=', 'sales.book_id')
            ->whereIn('books.id', $ids)
            ->groupBy('books.id')
            ->orderByDesc(DB::raw('COUNT(sales.id)'))
            ->select('books.*')
            ->get();
    }
}
