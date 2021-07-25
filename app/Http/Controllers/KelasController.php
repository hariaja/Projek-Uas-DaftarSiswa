<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ruangan;
use App\Guru;

class KelasController extends Controller
{
    public function index(Request $request)
    {
        $data = [
            'guru' => Guru::all()
        ];

        $kelas = Ruangan::when($request->cari, function ($query) use ($request) {
            $query->where('nama_kelas', 'like', "%{$request->cari}%");
        })->paginate(10);

        $kelas->appends($request->only('cari'));

        return view('kelas.index', compact('kelas'), $data);
    }

    public function store(Request $request)
    {

        $pesan = [
            'nama_kelas.required' => 'Mohon Masukan Nama Kelas',
            'guru_id.required' => 'Mohon Pilih Wali Kelas'
        ];

        $this->validate($request, [
            'nama_kelas' => 'required',
            'guru_id' => 'required'
        ], $pesan);

        $ruangan = Ruangan::create($request->all());
        $ruangan->save();
        return redirect('kelas')->with('success', 'Data Berhasil Ditambahkan');
    }

    public function edit(Ruangan $ruangan)
    {
        $data = [
            'guru' => Guru::all()
        ];
        return view('kelas.edit', compact('ruangan'), $data);
    }

    public function update(Request $request, Ruangan $ruangan)
    {
        $ruangan->update($request->all());
        $ruangan->save();
        return redirect('kelas')->with('success', 'Data Berhasil Diubah');
    }

    public function destroy(Ruangan $ruangan)
    {
        $ruangan->delete();
        return back()->with('success', 'Data Berhasil Hapus');
    }
}
