<?php

use Illuminate\Database\Seeder;

class VotesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($x = 0; $x < 100; $x++) {
            DB::table('votes')->insert([
                'applicant_id' => rand(900, 910),
                'created_at' => '2018-' . rand(10, 12) . '-' . str_pad(rand(1, 30), 2, 0, STR_PAD_LEFT) . ' 11:00:00',
            ]);
        }
    }
}
