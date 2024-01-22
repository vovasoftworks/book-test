<?php

namespace Database\Seeders;

use App\Models\Book;
use App\Models\Author;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $author1 = Author::factory()->create();
        $author2 = Author::factory()->create();
        $author3 = Author::factory()->create();

        $book1 = Book::factory()->create();
        $book2 = Book::factory()->create();
        $book3 = Book::factory()->create();

        $author1->books()->attach($book1->id);
        $author2->books()->attach($book2->id);
        $author3->books()->attach($book3->id);

        Author::factory()->count(20)->create();
        Book::factory()->count(20)->create();
    }
}
