<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mapel;
use App\Guru;

class MapelController extends Controller
{
    public function index(Request $request)
    {
        $data = [
            'guru' => Guru::all()
        ];
        $mapel = Mapel::when($request->cari, function ($query) use ($request) {
            $query->where('nama_mapel', 'like', "%{$request->cari}%");
        })->paginate(10);
        $mapel->appends($request->only('cari'));
        return view('mapel.index', compact('mapel'), $data);
    }

    public function store(Request $request)
    {
        $pesan = [
            'kode_mapel.required' => 'Mohon Masukan Kode Mata Pelajaran',
            'nama_mapel.required' => 'Mohon Masukan Nama Kelas',
            'guru_id.required' => 'Mohon Pilih Wali Kelas',
            'tahun_ajaran.required' => 'Mohon Masukan Tahun Ajaran'
        ];

        $this->validate($request, [
            'kode_mapel' => 'required',
            'nama_mapel' => 'required',
            'guru_id' => 'required',
            'tahun_ajaran' => 'required'
        ], $pesan);

        $ruangan = Mapel::create($request->all());
        $ruangan->save();
        return redirect('mapel')->with('success', 'Data Berhasil Ditambahkan');
    }

    public function edit(Mapel $mapel)
    {
        $data = [
            'guru' => Guru::all()
        ];
        return view('mapel.edit', compact('mapel'), $data);
    }

    public function update(Request $request, Mapel $mapel)
    {
        $mapel->update($request->all());
        $mapel->save();
        return redirect('mapel')->with('success', 'Data Berhasil Diubah');
    }

    public function destroy(Mapel $mapel)
    {
        $mapel->delete();
        return back()->with('success', 'Data Berhasil Hapus');
    }
}
