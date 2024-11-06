<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Librarian;


class LibrarianSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Librarian::create(['name' => 'John Doe', 'branch_id' => 1]);
        Librarian::create(['name' => 'Jane Smith', 'branch_id' => 2]);
        Librarian::create(['name' => 'Bob Johnson', 'branch_id' => 3]);
        Librarian::create(['name' => 'Sarah Lee', 'branch_id' => 4]);
        Librarian::create(['name' => 'Michael Brown', 'branch_id' => 5]);
        Librarian::create(['name' => 'Emily Davis', 'branch_id' => 6]);
        Librarian::create(['name' => 'William Wilson', 'branch_id' => 7]);
        Librarian::create(['name' => 'Olivia Clark', 'branch_id' => 8]);
        Librarian::create(['name' => 'David Harris', 'branch_id' => 9]);
        Librarian::create(['name' => 'Sophia Martinez', 'branch_id' => 10]);
    }
}
