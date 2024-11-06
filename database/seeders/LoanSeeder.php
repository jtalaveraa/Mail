<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Loan;


class LoanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Loan::create(['book_id' => 1, 'member_id' => 1, 'loan_date' => '2023-05-10', 'return_date' => '2023-06-10']);
        Loan::create(['book_id' => 2, 'member_id' => 2, 'loan_date' => '2022-04-01', 'return_date' => '2022-05-01']);
        Loan::create(['book_id' => 3, 'member_id' => 3, 'loan_date' => '2021-08-15', 'return_date' => '2021-09-15']);
        Loan::create(['book_id' => 4, 'member_id' => 4, 'loan_date' => '2020-02-20', 'return_date' => '2020-03-20']);
        Loan::create(['book_id' => 5, 'member_id' => 5, 'loan_date' => '2019-10-10', 'return_date' => '2019-11-10']);
        Loan::create(['book_id' => 6, 'member_id' => 6, 'loan_date' => '2023-06-10', 'return_date' => '2023-07-10']);
        Loan::create(['book_id' => 7, 'member_id' => 7, 'loan_date' => '2022-09-01', 'return_date' => '2022-10-01']);
        Loan::create(['book_id' => 8, 'member_id' => 8, 'loan_date' => '2021-07-22', 'return_date' => '2021-08-22']);
        Loan::create(['book_id' => 9, 'member_id' => 9, 'loan_date' => '2023-03-15', 'return_date' => '2023-04-15']);
        Loan::create(['book_id' => 10, 'member_id' => 10, 'loan_date' => '2020-12-01', 'return_date' => '2021-01-01']);
    }
}
