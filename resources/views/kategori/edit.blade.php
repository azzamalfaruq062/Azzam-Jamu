@extends('layouts.app')

@section('content')
<div class="container">
   <div>
        <form class="col-6" action="{{route('kategori.update', $kategori->id)}}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-2">
                <label>Kategori Name :</label>
                <input class="form-control" type="text" name="namaKategori" value="{{$kategori->namaKategori}}">
            </div>
            <div class="mb-2">
                <label>Deskripsi Kategori :</label>
                <input class="form-control" type="text" name="descKategori" value="{{$kategori->descKategori}}">
            </div>
            <input class="btn btn-success btn-sm" type="submit" value="submit">
        </form>
   </div>
</div>
@endsection