<?php

use Illuminate\Database\Seeder;
use App\Ruangan;
use Carbon\Carbon;

class RuanganSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Ruangan::insert([

            // [
            //     'nama_kelas' => 'X-IPS 1',
            //     'guru_id' => 1,
            //     'created_at' => Carbon::now('Asia/Jakarta')
            // ],
            // [
            //     'nama_kelas' => 'X-IPS 2',
            //     'guru_id' => 2,
            //     'created_at' => Carbon::now('Asia/Jakarta')
            // ],
            // [
            //     'nama_kelas' => 'X-IPS 3',
            //     'guru_id' => 3,
            //     'created_at' => Carbon::now('Asia/Jakarta')
            // ],

            // [
            //     'nama_kelas' => 'XI-IPS 1',
            //     'guru_id' => 4,
            //     'created_at' => Carbon::now('Asia/Jakarta')
            // ],
            // [
            //     'nama_kelas' => 'XI-IPS 2',
            //     'guru_id' => 5,
            //     'created_at' => Carbon::now('Asia/Jakarta')
            // ],
            // [
            //     'nama_kelas' => 'XI-IPS 3',
            //     'guru_id' => 6,
            //     'created_at' => Carbon::now('Asia/Jakarta')
            // ],

            // [
            //     'nama_kelas' => 'XII-IPS 1',
            //     'guru_id' => 7,
            //     'created_at' => Carbon::now('Asia/Jakarta')
            // ],
            // [
            //     'nama_kelas' => 'XII-IPS 2',
            //     'guru_id' => 8,
            //     'created_at' => Carbon::now('Asia/Jakarta')
            // ],
            // [
            //     'nama_kelas' => 'XII-IPS 3',
            //     'guru_id' => 9,
            //     'created_at' => Carbon::now('Asia/Jakarta')
            // ],

            // [
            //     'nama_kelas' => 'X-IPA 1',
            //     'guru_id' => 10,
            //     'created_at' => Carbon::now('Asia/Jakarta')
            // ],
            // [
            //     'nama_kelas' => 'X-IPA 2',
            //     'guru_id' => 11,
            //     'created_at' => Carbon::now('Asia/Jakarta')
            // ],
            // [
            //     'nama_kelas' => 'X-IPA 3',
            //     'guru_id' => 12,
            //     'created_at' => Carbon::now('Asia/Jakarta')
            // ],

            // [
            //     'nama_kelas' => 'XI-IPA 1',
            //     'guru_id' => 13,
            //     'created_at' => Carbon::now('Asia/Jakarta')
            // ],
            // [
            //     'nama_kelas' => 'XI-IPA 2',
            //     'guru_id' => 14,
            //     'created_at' => Carbon::now('Asia/Jakarta')
            // ],
            // [
            //     'nama_kelas' => 'XI-IPA 3',
            //     'guru_id' => 15,
            //     'created_at' => Carbon::now('Asia/Jakarta')
            // ],

            // [
            //     'nama_kelas' => 'XII-IPA 1',
            //     'guru_id' => 16,
            //     'created_at' => Carbon::now('Asia/Jakarta')
            // ],
            // [
            //     'nama_kelas' => 'XII-IPA 2',
            //     'guru_id' => 17,
            //     'created_at' => Carbon::now('Asia/Jakarta')
            // ],
            // [
            //     'nama_kelas' => 'XII-IPA 3',
            //     'guru_id' => 18,
            //     'created_at' => Carbon::now('Asia/Jakarta')
            // ],

            // [
            //     'nama_kelas' => 'X-Bahasa 1',
            //     'guru_id' => 19,
            //     'created_at' => Carbon::now('Asia/Jakarta')
            // ],
            // [
            //     'nama_kelas' => 'X-Bahasa 2',
            //     'guru_id' => 20,
            //     'created_at' => Carbon::now('Asia/Jakarta')
            // ],
            // [
            //     'nama_kelas' => 'X-Bahasa 3',
            //     'guru_id' => 21,
            //     'created_at' => Carbon::now('Asia/Jakarta')
            // ],

            // [
            //     'nama_kelas' => 'XI-Bahasa 1',
            //     'guru_id' => 22,
            //     'created_at' => Carbon::now('Asia/Jakarta')
            // ],
            // [
            //     'nama_kelas' => 'XI-Bahasa 2',
            //     'guru_id' => 23,
            //     'created_at' => Carbon::now('Asia/Jakarta')
            // ],
            // [
            //     'nama_kelas' => 'XI-Bahasa 3',
            //     'guru_id' => 24,
            //     'created_at' => Carbon::now('Asia/Jakarta')
            // ],

            // [
            //     'nama_kelas' => 'XII-Bahasa 1',
            //     'guru_id' => 25,
            //     'created_at' => Carbon::now('Asia/Jakarta')
            // ],
            // [
            //     'nama_kelas' => 'XII-Bahasa 2',
            //     'guru_id' => 26,
            //     'created_at' => Carbon::now('Asia/Jakarta')
            // ],
            // [
            //     'nama_kelas' => 'XII-Bahasa 3',
            //     'guru_id' => 27,
            //     'created_at' => Carbon::now('Asia/Jakarta')
            // ],

            [
                'nama_kelas' => 'Test 2',
                'guru_id' => 4,
                'created_at' => Carbon::now('Asia/Jakarta')
            ],
            [
                'nama_kelas' => 'Test 3',
                'guru_id' => 2,
                'created_at' => Carbon::now('Asia/Jakarta')
            ],
            [
                'nama_kelas' => 'Test 4',
                'guru_id' => 3,
                'created_at' => Carbon::now('Asia/Jakarta')
            ]
        ]);
    }
}
