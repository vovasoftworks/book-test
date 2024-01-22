<?php

namespace App\Repositories\Write\Books;

use App\Models\Book;
use Illuminate\Database\Eloquent\Builder;

class BookWriteRepository implements BookWriteRepositoryInterface
{
    private function query(): Builder
    {
        return Book::query();
    }

    public function save(Book $book): bool
    {
        return $book->save();
    }

    public function delete(int $id): int
    {
        return $this->query()->where('id', $id)->delete();
    }
}
