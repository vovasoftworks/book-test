<?php

namespace App\Repositories\Write\Books;

use App\Models\Book;

interface BookWriteRepositoryInterface
{
    public function save(Book $book): bool;
    public function delete(int $id): int;

}
