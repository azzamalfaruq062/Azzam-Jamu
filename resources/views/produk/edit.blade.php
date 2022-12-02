@extends('layouts.app')

@section('content')
<div class="container">
   <div>
        <form class="col-6" action="{{route('produk.update', $produk->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-2">
                <label>Produk Name :</label>
                <input class="form-control" type="text" name="name" value="{{$produk->namaProduk}}">
            </div>
            <div class="mb-2">
                <label>Deskripsi Produk :</label>
                <input class="form-control" type="text" name="desc" value="{{$produk->descProduk}}">
            </div>
            <div class="mb-2">
                <label>Harga :</label>
                <input class="form-control" type="number" name="harga" value="{{$produk->harga}}">
            </div>
            <div class="mb-2">
                <label>Foto  :</label>
                <input class="form-control" type="file" name="foto" >
            </div>
            <div class="mb-2">
                <label>Kategori :</label>
                <select class="form-control" name="kategoris_id">
                    <option value="{{$produk->kategoris_id}}" selected>{{$produk->kategoris->namaKategori}}</option>
                    @foreach ($kategori as $k)
                        <option value="{{$k->id}}">{{$k->namaKategori}}</option>
                    @endforeach
                </select>
            </div>
            @if (Auth::user()->role == 'admin')                
                <div class="mb-2">
                    <label>Status  :</label>
                    <select class="form-control" name="status">
                        <option value="{{$produk->status}}">{{Str::ucfirst($produk->status)}}</option>
                        <option value="show">Show</option>
                        <option value="hidden">Hidden</option>
                    </select>
                </div>
            @endif
            <input class="btn btn-success btn-sm" type="submit" value="submit">
        </form>
   </div>
</div>
@endsection