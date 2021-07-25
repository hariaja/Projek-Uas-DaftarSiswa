<?php

use Illuminate\Database\Seeder;
use App\Mapel;
use Carbon\Carbon;

class MapelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Mapel::insert([
            [
                'kode_mapel' => 'MTK-XII-2021',
                'nama_mapel' => 'Matematika XII',
                'tahun_ajaran' => '2021/2022',
                'created_at' => Carbon::now('Asia/Jakarta')
            ],
            [
                'kode_mapel' => 'IND-XII-2021',
                'nama_mapel' => 'Bahasa Indonesia XII',
                'tahun_ajaran' => '2021/2022',
                'created_at' => Carbon::now('Asia/Jakarta')
            ],
            [
                'kode_mapel' => 'PPKn-XII-2021',
                'nama_mapel' => 'Pendidikan Kewarganegaraan XII',
                'tahun_ajaran' => '2021/2022',
                'created_at' => Carbon::now('Asia/Jakarta')
            ],
            [
                'kode_mapel' => 'PAI-XII-2021',
                'nama_mapel' => 'Pendidikan Agama Islam XII',
                'tahun_ajaran' => '2021/2022',
                'created_at' => Carbon::now('Asia/Jakarta')
            ],
            [
                'kode_mapel' => 'ING-XII-2021',
                'nama_mapel' => 'Bahasa Inggris XII',
                'tahun_ajaran' => '2021/2022',
                'created_at' => Carbon::now('Asia/Jakarta')
            ],
            [
                'kode_mapel' => 'SPK-XII-2021',
                'nama_mapel' => 'Seni dan Prakarya XII',
                'tahun_ajaran' => '2021/2022',
                'created_at' => Carbon::now('Asia/Jakarta')
            ],
            [
                'kode_mapel' => 'PENJ-XII-2021',
                'nama_mapel' => 'Pendidikan Jasmani XII',
                'tahun_ajaran' => '2021/2022',
                'created_at' => Carbon::now('Asia/Jakarta')
            ],
            [
                'kode_mapel' => 'IT-XII-2021',
                'nama_mapel' => 'Informatika Dasar XII',
                'tahun_ajaran' => '2021/2022',
                'created_at' => Carbon::now('Asia/Jakarta')
            ],
            [
                'kode_mapel' => 'PPK-XII-2021',
                'nama_mapel' => 'Pendidikan Pengembangan Karakter XII',
                'tahun_ajaran' => '2021/2022',
                'created_at' => Carbon::now('Asia/Jakarta')
            ],
            [
                'kode_mapel' => 'BIO-XII-2021',
                'nama_mapel' => 'Biologi XII',
                'tahun_ajaran' => '2021/2022',
                'created_at' => Carbon::now('Asia/Jakarta')
            ],
            [
                'kode_mapel' => 'KIM-XII-2021',
                'nama_mapel' => 'Kimia XII',
                'tahun_ajaran' => '2021/2022',
                'created_at' => Carbon::now('Asia/Jakarta')
            ],
            [
                'kode_mapel' => 'FIS-XII-2021',
                'nama_mapel' => 'Fisika XII',
                'tahun_ajaran' => '2021/2022',
                'created_at' => Carbon::now('Asia/Jakarta')
            ],
            [
                'kode_mapel' => 'SOS-XII-2021',
                'nama_mapel' => 'Sosiologi XII',
                'tahun_ajaran' => '2021/2022',
                'created_at' => Carbon::now('Asia/Jakarta')
            ],
            [
                'kode_mapel' => 'GEO-XII-2021',
                'nama_mapel' => 'Geografi XII',
                'tahun_ajaran' => '2021/2022',
                'created_at' => Carbon::now('Asia/Jakarta')
            ],
            [
                'kode_mapel' => 'SEJ-XII-2021',
                'nama_mapel' => 'Sejarah XII',
                'tahun_ajaran' => '2021/2022',
                'created_at' => Carbon::now('Asia/Jakarta')
            ],
            [
                'kode_mapel' => 'ANTRO-XII-2021',
                'nama_mapel' => 'Antropologi XII',
                'tahun_ajaran' => '2021/2022',
                'created_at' => Carbon::now('Asia/Jakarta')
            ],
            [
                'kode_mapel' => 'JAP-XII-2021',
                'nama_mapel' => 'Bahasa Jepang XII',
                'tahun_ajaran' => '2021/2022',
                'created_at' => Carbon::now('Asia/Jakarta')
            ],
            [
                'kode_mapel' => 'DAE-XII-2021',
                'nama_mapel' => 'Bahasa Daerah XII',
                'tahun_ajaran' => '2021/2022',
                'created_at' => Carbon::now('Asia/Jakarta')
            ]
        ]);
    }
}
