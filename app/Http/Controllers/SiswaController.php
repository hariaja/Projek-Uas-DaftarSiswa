<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Siswa;
use App\Ruangan;
use App\User;
use App\Mapel;
use App\Exports\SiswaExport;
use Maatwebsite\Excel\Facades\Excel;
use PDF;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $siswa = Siswa::when($request->cari, function ($query) use ($request) {
            $query->where('nama_siswa', 'like', "%{$request->cari}%")
                ->orWhere('jenis_kelamin', 'like', "%{$request->cari}%");
        })->paginate(10);

        $siswa->appends($request->only('cari'));

        return view('siswa.index', compact('siswa'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'kelas' => Ruangan::all()
        ];
        // dd($data);
        return view('siswa.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $pesan = [
        //     'nama_siswa.required' => 'Nama Calon Tidak Boleh Kosong',
        //     'jenis_kelamin.required' => 'Mohon Pilih Jenis Kelamin',
        //     'email.required' => 'Email Tidak Boleh Kosong',
        //     'email.unique' => 'Email Sudah Digunakan, Mohon Ganti Alamat Email',
        //     'nomor_telepon.required' => 'Mohon Masukan Nomor Handphone Yang Bisa Dihubungi',
        //     'gambar.required' => 'Mohon Pilih Gambar Terlebih Dahulu',
        //     'alamat_lengkap.required' => 'Alamat Tidak Boleh Kosong',
        //     'gambar.max' => 'Ukuran Gambar Terlalu Besar, 2 Mb',
        //     'gambar.mimes' => 'File Eksitensi Tidak Diperbolehkan',
        //     'gambar.image' => 'Pastikan File Yang Diupload Berjenis = JPG, PNG atau JPEG',
        //     'kelas_id.required' => 'Mohon Pilih Kelas Terlebih Dahulu',
        //     'gambar.required' => 'Mohon Masukan Gambar',
        //     'tempat_lahir.required' => 'Mohon Masukan Tempat Lahir',
        //     'nama_wali' => 'Nama Wali Tidak Boleh Dikosongkan'
        // ];

        // $this->validate($request, [
        //     'nama_siswa' => 'required',
        //     'nama_wali' => 'required',
        //     'kelas_id' => 'required',
        //     'jenis_kelamin' => 'required',
        //     'email' => 'required|email|unique:siswa,email',
        //     'tanggal_lahir' => 'required',
        //     'tempat_lahir' => 'required',
        //     'nomor_telepon' => 'required',
        //     'gambar' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048|required',
        //     'alamat_lengkap' => 'required',
        // ], $pesan);

        $user = new User;
        $user->level = 'Siswa';
        $user->name = $request->nama_siswa;
        $user->email = $request->email;
        $user->password = bcrypt('siswa');
        $user->remember_token = Str::random(60);
        $user->save();

        $request->request->add(['user_id' => $user->id]);
        $siswa = Siswa::create($request->all());

        // Cek Apakah Ada Upload File Yang Di Input User
        if ($request->hasFile('gambar')) {

            $request->file('gambar')->move('images/siswa/', $request->file('gambar')->getClientOriginalName() . '-' . time() . '.' . $request->file('gambar')->getClientOriginalExtension());
            $siswa->gambar = $request->file('gambar')->getClientOriginalName() . '-' . time() . '.' . $request->file('gambar')->getClientOriginalExtension();
            $siswa->save();
        }

        return redirect('siswa')->with('success', 'Tambah Data Berhasil dan Akun Sudah Dibuat');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Siswa $siswa)
    {
        $mapel = Mapel::all();

        // Penyiapan data untuk Chart
        $categories = [];
        $data_nilai = [];

        foreach ($mapel as $mp) {
            if ($siswa->mapel()->wherePivot('mapel_id', '=', $mp->id)->first()) {
                $categories[] = $mp->nama_mapel;
                $data_nilai[] = $siswa->mapel()->wherePivot('mapel_id', '=', $mp->id)->first()->pivot->nilai;
            }
        }

        return view('siswa.detail', ['siswa' => $siswa, 'mapel' => $mapel, 'categories' => $categories, 'data_nilai' => $data_nilai]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Siswa $siswa)
    {
        $data = [
            'kelas' => Ruangan::all()
        ];
        return view('siswa.edit', compact('siswa'), $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Siswa $siswa)
    {
        $siswa->update($request->all());
        if ($request->hasFile('gambar')) {
            $request->file('gambar')->move('images/siswa/', $request->file('gambar')->getClientOriginalName() . '-' . time() . '.' . $request->file('gambar')->getClientOriginalExtension());
            $siswa->gambar = $request->file('gambar')->getClientOriginalName() . '-' . time() . '.' . $request->file('gambar')->getClientOriginalExtension();
            $siswa->save();
        }
        if (auth()->user()->level == 'Admin') {
            return redirect('siswa')->with('success', 'Data Berhasil Diubah');
        } else {
            return redirect('lihat/' . optional(auth()->user()->siswa)->id . '/profile-siswa')->with('success', 'Data Berhasil Diubah');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Siswa $siswa)
    {
        // menentukan gambar pada database yang tersimpan
        $path = public_path('/images/siswa/') . $siswa->gambar;

        if (file_exists($path)) {
            @unlink($path);
        }

        $siswa->delete();
        return back()->with('success', 'Data Berhasil Dihapus');
    }

    // fungsi untuk menambahkan nilai setiap siswa
    public function input(Request $request, $id)
    {
        $pesan = [
            'nama_mapel.required' => 'Mohon Pilih Dulu Mata Pelajaran',
            'nilai.required' => 'Kolom Nilai Tidak Boleh Dikosongkan'
        ];

        $this->validate($request, [
            'nama_mapel' => 'required',
            'nilai' => 'required',
        ], $pesan);

        $siswa = Siswa::findOrFail($id);
        if ($siswa->mapel()->where('mapel_id', $request->nama_mapel)->exists()) {
            return redirect('siswa/' . $id . '/detail')->with('warning', 'Data Mata Pelajaran Sudah Ada');
        }
        $siswa->mapel()->attach($request->nama_mapel, ['nilai' => $request->nilai]);

        return redirect('siswa/' . $id . '/detail')->with('success', 'Nilai Berhasil Diinput');
    }

    public function deleteNilai(Siswa $siswa, $id_mapel)
    {
        $siswa->mapel()->detach($id_mapel);
        return redirect()->back()->with('success', 'Data Nilai berhasil Dihapus');
    }

    public function exportExcel()
    {
        return Excel::download(new SiswaExport, 'Siswa.xlsx');
    }

    public function exportPDF()
    {
        $siswa = Siswa::all();
        $pdf = PDF::loadView('export.siswa', ['siswa' => $siswa]);
        return $pdf->download('siswa.pdf');
    }
}
