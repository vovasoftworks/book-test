<?php

namespace Feature;

use Tests\TestCase;
use App\Models\Book;
use App\Models\Sale;
use App\Models\Author;
use Illuminate\Testing\Fluent\AssertableJson;
use Illuminate\Foundation\Testing\RefreshDatabase;

class GetSoldBooksTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic test example.
     */
    public function test_get_sold_books()
    {
        $author = Author::factory()->create();

        $book1 = Book::factory()->create();
        $book2 = Book::factory()->create();
        $book3 = Book::factory()->create();

        $author->books()->attach($book1->id);
        $author->books()->attach($book2->id);
        $author->books()->attach($book3->id);

        Sale::factory()->create([
            'author_id' => $author->id,
            'book_id' => $book1->id,
            'price' => 15000
        ]);
        Sale::factory()->create([
            'author_id' => $author->id,
            'book_id' => $book2->id,
            'price' => 20000
        ]);
        Sale::factory()->create([
            'author_id' => $author->id,
            'book_id' => $book3->id,
            'price' => 25000
        ]);

        $response = $this->json('GET', 'api/sold-books');
        $response->assertSuccessful();

        $response->assertJson(fn (AssertableJson $json) => $json->has('data', 3));
    }

    public function test_get_sold_books_with_search()
    {
        $author = Author::factory()->create();

        $book1 = Book::factory()->create(['title' => 'War and peace']);
        $book2 = Book::factory()->create(['title' => 'Harry Potter']);

        $author->books()->attach($book1->id);
        $author->books()->attach($book2->id);

        Sale::factory()->create([
            'author_id' => $author->id,
            'book_id' => $book1->id,
            'price' => 15000
        ]);
        Sale::factory()->create([
            'author_id' => $author->id,
            'book_id' => $book2->id,
            'price' => 20000
        ]);

        $response = $this->json('GET', 'api/sold-books?search_by=War');
        $response->assertSuccessful();

        $response->assertJson(fn (AssertableJson $json) => $json->has('data', 1)
            ->has('data.0', fn(AssertableJson $json) =>
                $json->where('id', $book1->id)
                    ->where('title', $book1->title)
                    ->where('description', $book1->description)
                    ->where('cover_url', $book1->cover_url)
                    ->where('price', $book1->price)
                    ->where('quantity', $book1->quantity)
                ->etc()
            )
        );
    }
}
