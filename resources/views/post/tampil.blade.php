@extends('layouts.app')

@section('content')
<div class="container">
    <div>
        <h3>Data Postingan</h3>
        <a class="btn btn-success btn-sm mt-2" href="{{route('post.create')}}">Tambah data +</a>
        <table class="table table-hover mt-2">
            <tr>
                <th>No</th>
                <th>Judul</th>
                <th>Isi</th>
                <th>Tanggal Dibuat</th>
                <th>Kategori</th>
                <th>Penulis</th>
                @if (Auth::user()->role == 'admin')
                <th>Status</th>
                @endif
                <th>Action</th>
            </tr>
            @foreach ($data as $p)                
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$p->judul}}</td>
                <td>{{$p->isi}}</td>
                <td>{{$p->tanggalDibuat}}</td>
                <td>{{$p->kategoris->namaKategori}}</td>
                <td>{{$p->penulis}}</td>
                @if (Auth::user()->role == 'admin')
                <td>{{$p->status}}</td>
                @endif
                <td>
                    <a class="btn btn-primary btn-sm" href="{{route('post.edit', $p->id)}}">Edit</a>
                    <a class="btn btn-danger btn-sm" href="{{route('deletpost', $p->id)}}">Hapus</a>
                </td>
            </tr>
            @endforeach
        </table>
    </div>
</div>
@endsection