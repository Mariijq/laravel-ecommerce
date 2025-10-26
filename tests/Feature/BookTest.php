<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Book;
use App\Models\Category;
use App\Models\Author;

class BookTest extends TestCase
{
    use RefreshDatabase; // Resets the database after each test

    /** @test */
    public function it_can_create_a_book()
    {
        $author = Author::factory()->create();
        $category = Category::factory()->create();

        $bookData = [
            'ISBN' => '1234567890',
            'title' => 'Sample Book',
            'description' => 'This is a sample book description.',
            'author_id' => $author->id,
            'category_id' => $category->id,
            'publishing_year' => 2023,
            'init_price' => 19.99,
            'quantity' => 10,
        ];

        $response = $this->post(route('admin.books.store'), $bookData);

        $response->assertRedirect(route('admin.books.index'));
        $this->assertDatabaseHas('books', ['title' => 'Sample Book']);
    }

    /** @test */
    public function it_can_read_a_book()
    {
        $book = Book::factory()->create();

        $response = $this->get(route('books.book-detail', $book->id));

        $response->assertStatus(200);
        $response->assertSee($book->title);
    }

    /** @test */
    public function it_can_update_a_book()
    {
        $book = Book::factory()->create();

        $updatedData = [
            'title' => 'Updated Book Title',
            'description' => 'Updated description.',
            'publishing_year' => 2025,
            'init_price' => 25.99,
            'quantity' => 5,
        ];

        $response = $this->put(route('admin.books.update', $book->id), $updatedData);

        $response->assertRedirect(route('admin.books.index'));
        $this->assertDatabaseHas('books', ['title' => 'Updated Book Title']);
    }

    /** @test */
    public function it_can_delete_a_book()
    {
        $book = Book::factory()->create();

        $response = $this->delete(route('admin.books.destroy', $book->id));

        $response->assertJson(['status' => 'success']);
        $this->assertDatabaseMissing('books', ['id' => $book->id]);
    }
}
