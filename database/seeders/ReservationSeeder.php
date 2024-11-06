<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Reservation;

class ReservationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Reservation::create(['book_id' => 1, 'member_id' => 1, 'reservation_date' => '2023-05-05']);
        Reservation::create(['book_id' => 2, 'member_id' => 2, 'reservation_date' => '2022-06-01']);
        Reservation::create(['book_id' => 3, 'member_id' => 3, 'reservation_date' => '2021-07-10']);
        Reservation::create(['book_id' => 4, 'member_id' => 4, 'reservation_date' => '2020-11-01']);
        Reservation::create(['book_id' => 5, 'member_id' => 5, 'reservation_date' => '2019-09-15']);
        Reservation::create(['book_id' => 6, 'member_id' => 6, 'reservation_date' => '2023-02-05']);
        Reservation::create(['book_id' => 7, 'member_id' => 7, 'reservation_date' => '2022-08-20']);
        Reservation::create(['book_id' => 8, 'member_id' => 8, 'reservation_date' => '2021-03-12']);
        Reservation::create(['book_id' => 9, 'member_id' => 9, 'reservation_date' => '2023-04-10']);
        Reservation::create(['book_id' => 10, 'member_id' => 10, 'reservation_date' => '2020-10-22']);
    }
}
