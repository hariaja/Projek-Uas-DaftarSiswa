<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    protected $table = 'guru';
    protected $fillable = [
        'nama_guru', 'email', 'jenis_kelamin', 'nomor_telepon', 'alamat_lengkap', 'gambar', 'agama'
    ];

    public function mapel()
    {
        return $this->hasMany(Mapel::class);
    }

    public function getAvatar()
    {
        if (!$this->gambar) {
            return asset('images/guru/default.jpg');
        }

        return asset('images/guru/' . $this->gambar);
    }

    public function kelas()
    {
        return $this->hasOne(Ruangan::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
