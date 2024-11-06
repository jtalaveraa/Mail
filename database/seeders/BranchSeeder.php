<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Branch;


class BranchSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Branch::create(['name' => 'Main Branch', 'location' => '123 Main St']);
        Branch::create(['name' => 'West Branch', 'location' => '456 West Rd']);
        Branch::create(['name' => 'East Branch', 'location' => '789 East Ave']);
        Branch::create(['name' => 'North Branch', 'location' => '101 North Blvd']);
        Branch::create(['name' => 'South Branch', 'location' => '202 South Ln']);
        Branch::create(['name' => 'City Center Branch', 'location' => '303 City Rd']);
        Branch::create(['name' => 'University Branch', 'location' => '404 University Ave']);
        Branch::create(['name' => 'Library Square Branch', 'location' => '505 Library St']);
        Branch::create(['name' => 'River Side Branch', 'location' => '606 River Rd']);
        Branch::create(['name' => 'Parkside Branch', 'location' => '707 Park St']);
    }
}
