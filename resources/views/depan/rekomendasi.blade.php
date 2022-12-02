@extends('welcome')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Rekomendasi') }}</div>
                <div class="card-body">
                    {{-- <a class="btn btn-sm btn-outline-warning" style="border-radius: 40px" href="{{url('/rekomendasi')}}">Kembali</a> --}}
                    <form action="{{route('rekomendasi')}}" method="POST">
                        @csrf
                        <div class="input-group">
                            <div class="col pe-1">
                                <label>Keluhan :</label>
                                <input class="form-control" type="text" name="keluhan">
                            </div>
                            <div class="col">
                                <label>Tahun Lahir :</label>
                                <input class="form-control" type="date" name="thnLahir" >
                            </div>
                        </div>
                        <div class="input-group d-flex">
                            <a class="btn btn-warning btn-sm mt-3 me-auto text-light" style="border-radius: 40px" id="kembali">Kembali</a>
                            <input class="btn btn-success btn-sm mt-3 ms-auto" style="border-radius: 40px" type="submit" id="submit" value="submit">
                        </div>
                    </form>
                    <div>
                        @isset($data)                            
                        <table class="table table-hover">
                            <tr>
                                <th>Nama Jamu</th>
                                <td>{{$data['jamu']}}</td>
                            </tr>
                            <tr>
                                <th>Khasiat</th>
                                <td>{{$data['khasiat']}}</td>
                            </tr>
                            <tr>
                                <th>Keluhan</th>
                                <td>{{$data['keluhan']}}</td>
                            </tr>
                            <tr>
                                <th>Umur</th>
                                <td>{{$data['umur']}}</td>
                            </tr>
                            <tr>
                                <th>Saran Penggunaan</th>
                                <td>{{$data['saran']}}</td>
                            </tr>
                        </table>
                        @endisset
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection