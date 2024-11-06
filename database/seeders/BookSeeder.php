<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Book;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Book::create(['title' => 'Harry Potter and the Sorcerer\'s Stone', 'author_id' => 1, 'category_id' => 1, 'publisher_id' => 1, 'publication_year' => 1997]);
        Book::create(['title' => 'A Game of Thrones', 'author_id' => 2, 'category_id' => 2, 'publisher_id' => 2, 'publication_year' => 1996]);
        Book::create(['title' => 'The Hobbit', 'author_id' => 3, 'category_id' => 1, 'publisher_id' => 1, 'publication_year' => 1937]);
        Book::create(['title' => 'Murder on the Orient Express', 'author_id' => 4, 'category_id' => 3, 'publisher_id' => 3, 'publication_year' => 1934]);
        Book::create(['title' => 'Adventures of Huckleberry Finn', 'author_id' => 5, 'category_id' => 2, 'publisher_id' => 4, 'publication_year' => 1884]);
        Book::create(['title' => 'The Old Man and the Sea', 'author_id' => 6, 'category_id' => 3, 'publisher_id' => 5, 'publication_year' => 1952]);
        Book::create(['title' => 'The Shining', 'author_id' => 7, 'category_id' => 1, 'publisher_id' => 1, 'publication_year' => 1977]);
        Book::create(['title' => 'Foundation', 'author_id' => 8, 'category_id' => 2, 'publisher_id' => 2, 'publication_year' => 1951]);
        Book::create(['title' => 'Fahrenheit 451', 'author_id' => 9, 'category_id' => 1, 'publisher_id' => 3, 'publication_year' => 1953]);
        Book::create(['title' => 'The Great Gatsby', 'author_id' => 10, 'category_id' => 3, 'publisher_id' => 4, 'publication_year' => 1925]);
    }
}
