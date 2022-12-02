<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Post;
use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Post::all();
        return view('post.tampil', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kategori = Kategori::all();
        return view('post.tambah', compact('kategori'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = Post::create([
            'judul' =>$request->judul,
            'penulis' =>Auth::user()->name,
            'isi' =>$request->isi,
            'tanggalDibuat' =>$request->tanggalDibuat,
            'status' =>$request->status,
            'kategoris_id' =>$request->kategoris_id,
        ]);
        return redirect('post');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $kategori = Kategori::all();
        return view('post.edit', compact('kategori', 'post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        if($request->status){
            $post->judul = $request->judul;
            $post->penulis = Auth::user()->name;
            $post->isi = $request->isi;
            $post->tanggalDibuat = $request->tanggalDibuat;
            $post->status = $request->status;
            $post->kategoris_id = $request->kategoris_id;
            $post->save();
        }else{
            $post->judul = $request->judul;
            $post->penulis = Auth::user()->name;
            $post->isi = $request->isi;
            $post->tanggalDibuat = $request->tanggalDibuat;
            $post->status = $post->status;
            $post->kategoris_id = $request->kategoris_id;
            $post->save();
        }
        return redirect('post');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect('post');
    }

    public function beranda(){
        $data = Post::all();
        return view('depan.beranda', compact('data'));
    }
    
    public function detailberanda(){
        $data = DB::table('posts')
        ->get();

        foreach ($data as $p){
        $produk = DB::table('produks')->where('kategoris_id', $p->kategoris_id)->get();
        }
        // dd($data);

        return view('depan.detailberanda', compact('data', 'produk'));
    }

}
