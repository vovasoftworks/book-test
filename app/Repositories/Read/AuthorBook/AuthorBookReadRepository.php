<?php

namespace App\Repositories\Read\AuthorBook;

use App\Models\AuthorBook;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

class AuthorBookReadRepository implements AuthorBookReadRepositoryInterface
{
    private function query(): Builder
    {
        return AuthorBook::query();
    }

    public function getByAuthorIdAndBookId(int $authorId, int $bookId): bool
    {
        return $this->query()
            ->where('author_id', $authorId)
            ->where('book_id', $bookId)
            ->exists();
    }

    public function getByAuthorIds(array $authorIds): Collection
    {
        return $this->query()
            ->whereIn('author_id', $authorIds)
            ->get();
    }
}
