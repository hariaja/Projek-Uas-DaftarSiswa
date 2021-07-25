<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Siswa;
use App\Ruangan;
use App\User;
use App\Mapel;
use App\Guru;

class GuruController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $guru = Guru::when($request->cari, function ($query) use ($request) {
            $query->where('nama_guru', 'like', "%{$request->cari}%")
                ->orWhere('jenis_kelamin', 'like', "%{$request->cari}%");
        })->paginate(10);

        $guru->appends($request->only('cari'));

        return view('guru.index', compact('guru'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('guru.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());

        $pesan = [
            'nama_guru.required' => 'Nama Calon Tidak Boleh Kosong',
            'jenis_kelamin.required' => 'Mohon Pilih Jenis Kelamin',
            'agama.required' => 'Mohon Pilih Agama',
            'email.required' => 'Email Tidak Boleh Kosong',
            'email.unique' => 'Email Sudah Digunakan, Mohon Ganti Alamat Email',
            'nomor_telepon.required' => 'Mohon Masukan Nomor Handphone Yang Bisa Dihubungi',
            'gambar.required' => 'Mohon Pilih Gambar Terlebih Dahulu',
            'gambar.max' => 'Ukuran Gambar Terlalu Besar, 2 Mb',
            'gambar.mimes' => 'File Eksitensi Tidak Diperbolehkan',
            'gambar.image' => 'Pastikan File Yang Diupload Berjenis = JPG, PNG atau JPEG',
            'gambar.required' => 'Mohon Masukan Gambar',
            'alamat_lengkap.required' => 'Alamat Tidak Boleh Kosong',
        ];

        $this->validate($request, [
            'nama_guru' => 'required',
            'jenis_kelamin' => 'required',
            'email' => 'required|email|unique:guru,email',
            'nomor_telepon' => 'required',
            'gambar' => 'image|mimes:jpg,png,jpeg,gif,svg|max:8048|required',
            'alamat_lengkap' => 'required',
            'agama' => 'required'
        ], $pesan);

        $user = new User;
        $user->level = 'Guru';
        $user->name = $request->nama_guru;
        $user->email = $request->email;
        $user->password = bcrypt('guru');
        $user->remember_token = Str::random(60);
        $user->save();

        $request->request->add(['user_id' => $user->id]);
        $guru = Guru::create($request->all());
        // Cek Apakah Ada Upload File Yang Di Input User
        if ($request->hasFile('gambar')) {
            $request->file('gambar')->move('images/guru/', $request->file('gambar')->getClientOriginalName() . '-' . time() . '.' . $request->file('gambar')->getClientOriginalExtension());
            $guru->gambar = $request->file('gambar')->getClientOriginalName() . '-' . time() . '.' . $request->file('gambar')->getClientOriginalExtension();
            $guru->save();
        }

        return redirect('guru')->with('success', 'Tambah Data Berhasil dan Akun Sudah Dibuat');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $guru = Guru::findOrFail($id);
        return view('guru.detail', compact('guru'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $guru = Guru::findOrFail($id);
        return view('guru.edit', compact('guru'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $guru = Guru::findOrfail($id);
        $guru->update($request->all());
        if ($request->hasFile('gambar')) {
            $request->file('gambar')->move('images/guru/', $request->file('gambar')->getClientOriginalName() . '-' . time() . '.' . $request->file('gambar')->getClientOriginalExtension());
            $guru->gambar = $request->file('gambar')->getClientOriginalName() . '-' . time() . '.' . $request->file('gambar')->getClientOriginalExtension();
            $guru->save();
        }
        if (auth()->user()->level == 'Admin') {
            return redirect('guru')->with('success', 'Data Berhasil Diubah');
        } else {
            return redirect('lihat/' . optional(auth()->user()->guru)->id . '/profile-guru')->with('success', 'Data Berhasil Diubah');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $guru = Guru::findOrFail($id);
        $path = public_path('/images/guru/') . $guru->gambar;

        // Mengecek, Apakah ada file gambar di local atau tidak
        // Jika Ada Maka gambar akan di hapus
        if (file_exists($path)) {
            @unlink($path);
        }

        $guru->delete();
        return back()->with('success', 'Data Berhasil Dihapus');
    }
}
