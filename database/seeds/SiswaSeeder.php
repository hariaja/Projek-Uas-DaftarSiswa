<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class SiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');

        for ($i = 1; $i <= 25; $i++) {
            DB::table('siswa')->insert([
                'nama_siswa' => $faker->name,
                'kelas_id' => $faker->numerify('27'),
                'jenis_kelamin' => $faker->randomElement($array = array('Laki-Laki', 'Perempuan')),
                'agama' => $faker->randomElement($array = array('Islam', 'Kristen', 'Katolik', 'Hindu', 'Buddha')),
                'email' => $faker->unique()->email,
                'alamat_lengkap' => $faker->address,
                'tempat_lahir' => $faker->city,
                'tanggal_lahir' => $faker->dateTimeThisCentury()->format('Y-m-d'),
                'nomor_telepon' => $faker->phoneNumber,
                'nama_wali' => $faker->name
            ]);
        }
    }
}
