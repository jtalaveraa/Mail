<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Fine;

class FineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Fine::create(['member_id' => 1, 'amount' => 10.50, 'paid' => false]);
        Fine::create(['member_id' => 2, 'amount' => 15.75, 'paid' => true]);
        Fine::create(['member_id' => 3, 'amount' => 5.00, 'paid' => false]);
        Fine::create(['member_id' => 4, 'amount' => 20.00, 'paid' => false]);
        Fine::create(['member_id' => 5, 'amount' => 7.50, 'paid' => true]);
        Fine::create(['member_id' => 6, 'amount' => 12.25, 'paid' => false]);
        Fine::create(['member_id' => 7, 'amount' => 9.00, 'paid' => true]);
        Fine::create(['member_id' => 8, 'amount' => 14.00, 'paid' => false]);
        Fine::create(['member_id' => 9, 'amount' => 11.50, 'paid' => false]);
        Fine::create(['member_id' => 10, 'amount' => 8.00, 'paid' => true]);
    }
}
