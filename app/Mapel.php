<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mapel extends Model
{
    protected $table = 'mapel';
    protected $fillable = [
        'nama_mapel', 'tahun_ajaran', 'kode_mapel', 'guru_id'
    ];

    public function siswa_nilai()
    {
        return $this->belongsToMany(Siswa::class)->withPivot('nilai')->withTimeStamps();
    }

    public function guru()
    {
        return $this->belongsTo(Guru::class);
    }
}
