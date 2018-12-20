<?php

use Illuminate\Database\Seeder;

class ApplicantsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($x = 900; $x <= 910; $x++) {
            DB::table('applicants')->insert([
                'id' => $x,
                'name' => str_random(10),
                'email' => str_random(10).'@gmail.com',
                'photo' => 'candidatos/fotos/8.jpeg',
            ]);
        }

    }
}
