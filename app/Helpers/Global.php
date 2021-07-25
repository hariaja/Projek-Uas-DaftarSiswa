<?php

use App\Siswa;
use App\Guru;
use App\Ruangan;
use App\Mapel;

function rangking()
{
  $siswa = Siswa::all();
  $siswa->map(function ($sw) {
    $sw->rataRataNilai = $sw->rataRataNilai();
    return $sw;
  });
  $siswa = $siswa->sortByDesc('rataRataNilai')->take(5);
  return $siswa;
}

function total_siswa()
{
  return Siswa::count();
}

function total_guru()
{
  return Guru::count();
}

function total_kelas()
{
  return Ruangan::count();
}

function total_mapel()
{
  return Mapel::count();
}
