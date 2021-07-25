<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class Mapel_SiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');

        DB::table('mapel_siswa')->insert([
            'siswa_id' => $faker->numerify('8'),
            'mapel_id' => $faker->numerify('1'),
            'nilai' => $faker->numerify('80')
        ]);
    }
}
