<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class GuruSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');
        for ($i = 1; $i <= 3; $i++) {
            DB::table('guru')->insert([
                // 'nign' => $faker->numberBetween(1000000000000, 9999999999999),
                'nama_guru' => $faker->name,
                // 'user_id' => $faker->numberBetween(2, 100),
                'jenis_kelamin' => $faker->randomElement($array = array('Laki-Laki', 'Perempuan')),
                'agama' => $faker->randomElement($array = array('Islam', 'Kristen', 'Katolik', 'Hindu', 'Buddha')),
                'email' => $faker->unique()->email,
                'alamat_lengkap' => $faker->address,
                // 'tempat_lahir' => $faker->city,
                // 'tanggal_lahir' => $faker->dateTimeThisCentury()->format('Y-m-d'),
                'nomor_telepon' => $faker->phoneNumber,
                // 'pendidikan' => $faker->randomElement($array = array('D3', 'S1', 'S2'))
            ]);
        }
    }
}
