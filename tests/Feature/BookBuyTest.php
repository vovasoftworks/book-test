<?php

namespace Feature;

use Tests\TestCase;
use App\Models\Book;
use App\Models\Author;
use Illuminate\Foundation\Testing\RefreshDatabase;

class BookBuyTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic test example.
     */
    public function test_buy_book_successfully()
    {
        $author = Author::factory()->create();
        $book = Book::factory()->create();

        $author->books()->attach($book->id);

        $response = $this->json('POST', '/api/sale', [
            'author_id' => $author->id,
            'book_id' => $book->id,
            'money' => 1100.55
        ]);
        $response->assertSuccessful();

        $this->assertDatabaseHas('sales', [
            'book_id' => $book->id,
            'author_id' => $author->id
        ]);
    }

    public function test_buy_book_with_incorrect_amount_money()
    {
        $author = Author::factory()->create();
        $book = Book::factory()->create();

        $author->books()->attach($book->id);

        $response = $this->json('POST', '/api/sale', [
            'author_id' => $author->id,
            'book_id' => $book->id,
            'money' => 900.55 //less amount of money
        ]);
        $response->assertSee("Incorrect money amount");

        $this->assertDatabaseMissing('sales', [
            'book_id' => $book->id,
            'author_id' => $author->id
        ]);
    }

    public function test_buy_book_not_belong_to_author()
    {
        $author = Author::factory()->create();
        $book = Book::factory()->create();

        $response = $this->json('POST', '/api/sale', [
            'author_id' => $author->id,
            'book_id' => $book->id,
            'money' => 900.55
        ]);
        $response->assertSee("No book found for given Author");

        $this->assertDatabaseMissing('sales', [
            'book_id' => $book->id,
            'author_id' => $author->id
        ]);
    }
}
