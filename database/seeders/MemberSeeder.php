<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Member;

class MemberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Member::create(['name' => 'Alice Johnson', 'email' => 'alice@example.com', 'joining_date' => '2023-01-15']);
        Member::create(['name' => 'Bob Smith', 'email' => 'bob@example.com', 'joining_date' => '2022-05-10']);
        Member::create(['name' => 'Charlie Brown', 'email' => 'charlie@example.com', 'joining_date' => '2021-09-12']);
        Member::create(['name' => 'David Williams', 'email' => 'david@example.com', 'joining_date' => '2020-07-25']);
        Member::create(['name' => 'Emma Davis', 'email' => 'emma@example.com', 'joining_date' => '2019-03-02']);
        Member::create(['name' => 'Frank Miller', 'email' => 'frank@example.com', 'joining_date' => '2018-11-28']);
        Member::create(['name' => 'Grace Lee', 'email' => 'grace@example.com', 'joining_date' => '2023-07-14']);
        Member::create(['name' => 'Henry Clark', 'email' => 'henry@example.com', 'joining_date' => '2021-05-22']);
        Member::create(['name' => 'Ivy Moore', 'email' => 'ivy@example.com', 'joining_date' => '2022-12-19']);
        Member::create(['name' => 'Jack Harris', 'email' => 'jack@example.com', 'joining_date' => '2020-04-03']);
    }
}
