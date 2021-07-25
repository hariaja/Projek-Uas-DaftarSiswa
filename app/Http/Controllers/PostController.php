<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // $posts = Post::all();
        $posts = Post::when($request->cari, function ($query) use ($request) {
            $query->where('title', 'like', "%{$request->cari}%");
        })->paginate(4);
        $posts->appends($request->only('cari'));

        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Mengambil id dari tabel users berdasarkan user yang login dan mengupload postingan
        $request->request->add(['user_id' => auth()->user()->id]);
        $post = Post::create($request->all());
        // Cek gambar
        if ($request->hasFile('thumbnail')) {
            // Filter Nama Dan Eksitensi
            $request->file('thumbnail')->move('images/post/', $request->file('thumbnail')->getClientOriginalName() . '-' . time() . '.' . $request->file('thumbnail')->getClientOriginalExtension());
            // Insert To Database
            $post->thumbnail = $request->file('thumbnail')->getClientOriginalName() . '-' . time() . '.' . $request->file('thumbnail')->getClientOriginalExtension();
            $post->save();
        }

        return redirect()->route('post.index')->with('success', 'Data Berhasil Disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
