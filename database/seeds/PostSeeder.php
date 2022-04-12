<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');

        for ($i = 1; $i <= 50; $i++) {

            // insert data ke table pegawai menggunakan Faker
            DB::table('post')->insert([
                'content' => $faker->realText($maxNbChars = 100, $indexSize = 2),
                'title' => $faker->sentence,
                'date' => $faker->dateTimeThisCentury()->format('Y-m-d')
            ]);
        }
    }
}
