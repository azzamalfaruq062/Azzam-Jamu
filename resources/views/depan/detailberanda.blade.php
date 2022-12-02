@extends('welcome')

@section('content')
<div class="container">
    <div class="row">
        @foreach ($data as $p)        
            <div class="col-3 ms-2">
                <div class="card" style="width: 18rem;">
                    <div class="card-body">
                      <h4 class="card-title">{{$p->judul}}</h4>
                      <p class="card-title">Penulis :{{$p->penulis}}<br>Tanggal :{{$p->tanggalDibuat}}</p>
                      <p class="card-text">{{$p->isi}}</p>
                    </div>
                    <ul class="list-group list-group-flush">
                        @foreach ($produk as $pro)
                            <li class="list-group-item"><img src="{{asset('storage/').'/'.$pro->foto}}" style="width: 10%; border-radius: 50%;"> : {{$pro->namaProduk}}</li>
                        @endforeach
                    </ul>
                  </div>
            </div>
        @endforeach
    </div>
</div>
@endsection