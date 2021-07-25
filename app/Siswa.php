<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    protected $table = 'siswa';
    protected $fillable = [
        'user_id', 'kelas_id', 'nama_siswa', 'email',
        'jenis_kelamin', 'tanggal_lahir', 'tempat_lahir', 'agama',
        'nomor_telepon', 'alamat_lengkap', 'gambar', 'nama_wali'
    ];

    public function kelas()
    {
        return $this->belongsTo(Ruangan::class);
    }

    public function getPhoto()
    {
        if (!$this->gambar) {
            return asset('images/siswa/default.jpg');
        }

        return asset('images/siswa/' . $this->gambar);
    }

    public function mapel()
    {
        return $this->belongsToMany(Mapel::class)->withPivot('nilai')->withTimestamps();
    }

    public function rataRataNilai()
    {
        // Mengambil Data Nilai Untuk Dihitung Nilai Rata - Rata nya
        $total = 0;
        $hitung = 0;
        // if Disini digunakan untuk mengecek apakah ada data nilai dari siswa tersebut, jika tidak ada maka akan di return 0 secara default
        if ($this->mapel->isNotEmpty()) {
            // $this mengacu pada model siswa
            foreach ($this->mapel as $mapel) {
                $total += $mapel->pivot->nilai;
                $hitung++;
            }
        }
        return $total != 0 ? round($total / $hitung) : $total;
        // return $total;
    }

    public function keterangan()
    {
        // Mengambil Data Nilai Untuk Dihitung Nilai Rata - Rata nya
        $total = 0;
        $hitung = 0;
        // if Disini digunakan untuk mengecek apakah ada data nilai dari siswa tersebut, jika tidak ada maka akan di return 0 secara default
        if ($this->mapel->isNotEmpty()) {
            // $this mengacu pada model siswa
            foreach ($this->mapel as $mapel) {
                $total += $mapel->pivot->nilai;
                $hitung++;
            }
        }

        $total != 0 ? round($total / $hitung) : $total;

        if ($total < 65) {
            return 'TIDAK LULUS';
        } else {
            return 'LULUS';
        }
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
