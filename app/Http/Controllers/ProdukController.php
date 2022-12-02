<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Produk;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Produk::all();
        return view('produk.tampil', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kategori = Kategori::all();
        return view('produk.tambah', compact('kategori'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = Produk::create([
            'namaProduk' => $request->name,
            'descProduk' => $request->desc,
            'harga' => $request->harga,
            'status' => $request->status,
            'kategoris_id' => $request->kategoris_id,
            'foto' => $request->file('foto')->store('img'),
        ]);
        return redirect('produk');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function show(Produk $produk)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function edit(Produk $produk)
    {
        $kategori = Kategori::all();
        return view('produk.edit', compact('produk', 'kategori'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Produk $produk)
    {
        if($request->file('foto')){
            $produk->namaProduk = $request->name;
            $produk->descProduk = $request->desc;
            $produk->harga = $request->harga;
            $produk->status = $request->status;
            $produk->kategoris_id = $request->kategoris_id;
            $produk->foto = $request->file('foto')->store('img');
            $produk->save();
        }else{
            $produk->namaProduk = $request->name;
            $produk->descProduk = $request->desc;
            $produk->harga = $request->harga;
            $produk->status = $request->status;
            $produk->kategoris_id = $request->kategoris_id;
            $produk->foto = $produk->foto;
            $produk->save();
        }
        return redirect('produk');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function destroy(Produk $produk)
    {
        $produk->delete();
        return redirect('produk');
    }
}
