@extends('layouts.app')

@section('content')
<div class="container">
   <div>
        <form class="col-6" action="{{route('post.update', $post->id)}}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-2">
                <label>judul :</label>
                <input class="form-control" type="text" name="judul" value="{{$post->judul}}">
            </div>
            {{-- <div class="mb-2">
                <input class="form-control" type="hidden" name="penulis" value="{{Auth::user()->name}}">
            </div> --}}
            <div class="mb-2">
                <label>Tanggal Dibuat :</label>
                <input class="form-control" type="date" name="tanggalDibuat" value="{{$post->tanggalDibuat}}">
            </div>
            <div class="mb-2">
                <label>Kategori :</label>
                <select class="form-control" name="kategoris_id">
                    <option value="{{$post->kategoris_id}}">{{$post->kategoris->namaKategori}}</option>
                    @foreach ($kategori as $k)
                        <option value="{{$k->id}}">{{$k->namaKategori}}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-2">
                <label>Isi :</label>
                <textarea class="form-control" name="isi" rows="10">{{$post->isi}}</textarea>
            </div>
            @if (Auth::user()->role == 'admin')                
                <div class="mb-2">
                    <label>Status  :</label>
                    <select class="form-control" name="status">
                        <option value="{{$post->status}}" selected disabled>{{Str::ucfirst($post->status)}}</option>
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