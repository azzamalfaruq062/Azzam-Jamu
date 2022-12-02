@extends('layouts.app')

@section('content')
<div class="container">
    <div>
        <h3>Data Produk</h3>
        <a class="btn btn-success btn-sm mt-2" href="{{route('produk.create')}}">Tambah data +</a>
        <table class="table table-hover mt-2">
            <tr>
                <th>No</th>
                <th>Produk Name</th>
                <th>Deskripsi Produk</th>
                <th>Foto</th>
                <th>Harga</th>
                <th>Kategori</th>
                @if (Auth::user()->role == 'admin')
                <th>Status</th>
                @endif
                <th>Action</th>
            </tr>
            @foreach ($data as $p)                
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$p->namaProduk}}</td>
                <td>{{$p->descProduk}}</td>
                <td style="width: 20%"><img src="{{asset('storage/').'/'.$p->foto}}" style="width: 55%"></td>
                <td>{{$p->harga}}</td>
                <td>{{$p->kategoris->namaKategori}}</td>
                @if (Auth::user()->role == 'admin')
                <td>{{$p->status}}</td>
                @endif
                <td>
                    <a class="btn btn-primary btn-sm" href="{{route('produk.edit', $p->id)}}">Edit</a>
                    <a class="btn btn-danger btn-sm" href="{{route('deletproduk', $p->id)}}">Hapus</a>
                </td>
            </tr>
            @endforeach
        </table>
    </div>
</div>
@endsection