<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Author;
use App\Models\Category;
use App\Models\Book;
use App\Models\Borrow;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create test user
        $user = User::firstOrCreate([
            'email' => 'test@example.com'
        ], [
            'name' => 'Test User',
            'password' => bcrypt('password'),
        ]);

        // Create authors
        $authors = [
            ['name' => 'J.K. Rowling', 'bio' => 'British author, best known for the Harry Potter series.'],
            ['name' => 'George R.R. Martin', 'bio' => 'American novelist and short story writer, known for A Song of Ice and Fire.'],
            ['name' => 'Agatha Christie', 'bio' => 'English writer known for detective novels featuring Hercule Poirot and Miss Marple.'],
        ];

        foreach ($authors as $authorData) {
            Author::create($authorData);
        }

        // Create categories
        $categories = [
            ['name' => 'Fantasy', 'description' => 'Books involving magical or supernatural elements.'],
            ['name' => 'Mystery', 'description' => 'Books involving crime, detective work, and suspense.'],
            ['name' => 'Science Fiction', 'description' => 'Books exploring futuristic concepts and advanced science.'],
        ];

        foreach ($categories as $categoryData) {
            Category::create($categoryData);
        }

        // Create books
        $books = [
            [
                'title' => 'Harry Potter and the Philosopher\'s Stone',
                'description' => 'The first book in the Harry Potter series.',
                'author_id' => 1,
                'category_id' => 1,
                'isbn' => '9780747532699',
                'published_year' => 1997,
            ],
            [
                'title' => 'A Game of Thrones',
                'description' => 'The first book in A Song of Ice and Fire series.',
                'author_id' => 2,
                'category_id' => 1,
                'isbn' => '9780553103540',
                'published_year' => 1996,
            ],
            [
                'title' => 'Murder on the Orient Express',
                'description' => 'A classic detective novel by Agatha Christie.',
                'author_id' => 3,
                'category_id' => 2,
                'isbn' => '9780062693662',
                'published_year' => 1934,
            ],
            [
                'title' => 'Harry Potter and the Chamber of Secrets',
                'description' => 'The second book in the Harry Potter series.',
                'author_id' => 1,
                'category_id' => 1,
                'isbn' => '9780439064873',
                'published_year' => 1998,
            ],
            [
                'title' => 'The Murder of Roger Ackroyd',
                'description' => 'Another famous Hercule Poirot mystery.',
                'author_id' => 3,
                'category_id' => 2,
                'isbn' => '9780062073567',
                'published_year' => 1926,
            ],
        ];

        foreach ($books as $bookData) {
            Book::create($bookData);
        }

        // Create borrows
        $borrows = [
            [
                'user_id' => $user->id,
                'book_id' => 1,
                'borrowed_at' => now()->subDays(5),
                'returned_at' => null,
            ],
            [
                'user_id' => $user->id,
                'book_id' => 3,
                'borrowed_at' => now()->subDays(10),
                'returned_at' => now()->subDays(2),
            ],
        ];

        foreach ($borrows as $borrowData) {
            Borrow::create($borrowData);
        }
    }
}
