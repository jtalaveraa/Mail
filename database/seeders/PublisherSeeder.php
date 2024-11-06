<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Publisher;


class PublisherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Publisher::create(['name' => 'Bloomsbury', 'address' => '123 Book St, London']);
        Publisher::create(['name' => 'Penguin Random House', 'address' => '456 Fiction Ave, New York']);
        Publisher::create(['name' => 'HarperCollins', 'address' => '789 Novel Rd, Chicago']);
        Publisher::create(['name' => 'Simon & Schuster', 'address' => '1012 Page Ln, Los Angeles']);
        Publisher::create(['name' => 'Macmillan', 'address' => '1314 Story Dr, San Francisco']);
        Publisher::create(['name' => 'Hachette', 'address' => '1516 Literature Blvd, Paris']);
        Publisher::create(['name' => 'Scholastic', 'address' => '1718 Reading Rd, Toronto']);
        Publisher::create(['name' => 'Random House', 'address' => '1920 Writer’s St, Boston']);
        Publisher::create(['name' => 'Harper Perennial', 'address' => '2122 Poet’s Blvd, Miami']);
        Publisher::create(['name' => 'W.W. Norton & Company', 'address' => '2324 History Dr, Washington']);
    }
}
