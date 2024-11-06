<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create(['name' => 'Fantasy']);
        Category::create(['name' => 'Science Fiction']);
        Category::create(['name' => 'Mystery']);
        Category::create(['name' => 'Adventure']);
        Category::create(['name' => 'Horror']);
        Category::create(['name' => 'Romance']);
        Category::create(['name' => 'Non-Fiction']);
        Category::create(['name' => 'Thriller']);
        Category::create(['name' => 'Classic']);
        Category::create(['name' => 'Biography']);
    }
}
