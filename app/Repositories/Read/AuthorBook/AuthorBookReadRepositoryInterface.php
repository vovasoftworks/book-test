<?php

namespace App\Repositories\Read\AuthorBook;

use Illuminate\Database\Eloquent\Collection;

interface AuthorBookReadRepositoryInterface
{
    public function getByAuthorIdAndBookId(int $authorId, int $bookId): bool;
    public function getByAuthorIds(array $authorIds): Collection;
}
