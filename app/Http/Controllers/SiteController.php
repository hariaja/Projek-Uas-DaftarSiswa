<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\User;
use App\Siswa;
use App\Guru;
use Illuminate\Support\Str;

class SiteController extends Controller
{
    public function home()
    {
        $posts = Post::all();
        $guru = Guru::offset(0)->limit(3)->get();
        // dd($guru);
        return view('frontend.home', compact(['posts', 'guru']));
    }

    public function about()
    {
        return view('frontend.about');
    }

    public function register()
    {
        return view('frontend.register');
    }

    public function post_register(Request $request)
    {

        $pesan = [
            'nama_siswa.required' => 'Nama Calon Tidak Boleh Kosong',
            'jenis_kelamin.required' => 'Mohon Pilih Jenis Kelamin',
            'email.required' => 'Email Tidak Boleh Kosong',
            'email.unique' => 'Email Sudah Digunakan, Mohon Ganti Alamat Email',
            'nomor_telepon.required' => 'Mohon Masukan Nomor Handphone Yang Bisa Dihubungi',
            'gambar.required' => 'Mohon Pilih Gambar Terlebih Dahulu',
            'alamat_lengkap.required' => 'Alamat Tidak Boleh Kosong',
            'gambar.max' => 'Ukuran Gambar Terlalu Besar, 2 Mb',
            'gambar.mimes' => 'File Eksitensi Tidak Diperbolehkan',
            'gambar.image' => 'Pastikan File Yang Diupload Berjenis = JPG, PNG atau JPEG',
            'gambar.required' => 'Mohon Masukan Gambar',
            'tempat_lahir.required' => 'Mohon Masukan Tempat Lahir',
            'nama_wali.required' => 'Nama Wali Tidak Boleh Dikosongkan',
            'password.required' => 'Password Tidak Boleh Dikosongkan'
        ];

        $this->validate($request, [
            'nama_siswa' => 'required',
            'nama_wali' => 'required',
            'jenis_kelamin' => 'required',
            'email' => 'required|email|unique:siswa,email',
            'tanggal_lahir' => 'required',
            'tempat_lahir' => 'required',
            'nomor_telepon' => 'required',
            'gambar' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048|required',
            'alamat_lengkap' => 'required',
            'password' => 'required'
        ], $pesan);

        $user = new User;
        $user->level = 'Siswa';
        $user->name = $request->nama_siswa;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
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

        return redirect('/')->with('success', 'Pendaftaran Selesai, Silahkan Melakukan Login');
    }

    public function singlePost($slug)
    {
        $posts = Post::where('slug', '=', $slug)->first();
        return view('frontend.singlepost', compact('posts'));
    }
}
