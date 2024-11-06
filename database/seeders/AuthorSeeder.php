<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Author;


class AuthorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Author::create(['name' => 'J.K. Rowling', 'birth_date' => '1965-07-31']);
        Author::create(['name' => 'George R.R. Martin', 'birth_date' => '1948-09-20']);
        Author::create(['name' => 'J.R.R. Tolkien', 'birth_date' => '1892-01-03']);
        Author::create(['name' => 'Agatha Christie', 'birth_date' => '1890-09-15']);
        Author::create(['name' => 'Mark Twain', 'birth_date' => '1835-11-30']);
        Author::create(['name' => 'Ernest Hemingway', 'birth_date' => '1899-07-21']);
        Author::create(['name' => 'Stephen King', 'birth_date' => '1947-09-21']);
        Author::create(['name' => 'Isaac Asimov', 'birth_date' => '1920-01-02']);
        Author::create(['name' => 'Ray Bradbury', 'birth_date' => '1920-08-22']);
        Author::create(['name' => 'F. Scott Fitzgerald', 'birth_date' => '1896-09-24']);
    }
}
