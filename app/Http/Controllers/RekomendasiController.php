<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RekomendasiController extends Controller
{
    // Fungsi untuk menampilkan halaman rekomendasi
    public function rek(){
        return view('depan.rekomendasi');
    }

    // fungsi untuk proses menampilkan data rekomendasi (jamu, khasiat, keluhan dll)
    public function rekomendasi(Request $request){
        $keluhan = $request->keluhan;//menga keluhan dari inputan keluhan & ditampung dalam variabel
        $rek = new saranPenggunaan($keluhan, date('Y', strtotime($request->thnLahir)));//membuat objek dg nama $rek kemudian mengambil keluhan & thn saja dari inputan date

        $data = [//ditampung dalam array kemudian di lemparkan kedalam blade dengan cara di akses $data['naha index array']
            'jamu' => $rek->namaJamu(),//mengambil return nama jamu
            'khasiat' => 'Mengobati '.$keluhan,//khasiat di buat dengan mengobati ditambah keluhan yg di inputkan
            'keluhan' => $keluhan,//mengambil dari keluhan
            'umur' => $rek->umur(),//mengambil dari fungsi umur dg parameter thn sekarang dan inputan thn lahir
            'saran' => $rek->saran(),//mengambil dari return method saran
        ];
        return view('depan.rekomendasi', compact('data'));//melempar data ke dalam blade
    }
}

// class jamu
class Jamu{
    public function __construct($keluhan, $thnLahir){//2 parameter dalam construct, dengan menggunakan aksesmodifier public sehingga bisa di akses dimanasaja
        $this->keluhan = $keluhan;//properties tau fariabel
        $this->thnLahir = $thnLahir;
    }
    public function umur(){//fungsi atau method umur untuk menghitung umur
        return date('Y') - $this->thnLahir;//return thn saat ini dikurangi thn lahir
    }
    public function namaJamu(){//method namaJamu untuk mencari jamu yg cocok sesuai kondisi
        if($this->keluhan == 'keseleo' || $this->keluhan == 'kurang nafsu makan'){//pengkondisian sesuai di soal
            $jamu = 'Beras Kencur';
            return $jamu;
        }elseif($this->keluhan == 'pegal-pegal'){
            $jamu = 'Kunyit Asam';
            return $jamu;
        }elseif($this->keluhan == 'darah tinggi' || $this->keluhan == 'gula darah'){
            $jamu = 'Brotowali';
            return $jamu;
        }if($this->keluhan == 'keram perut' || $this->keluhan == 'masuk angin'){
            $jamu = 'Temulawak';
            return $jamu;
        }else{
            $jamu = 'Tidak Ditemukan';
            return $jamu;
        }
    }
    
}

//class saranPenggunaan inherict dari class jamu
class saranPenggunaan extends Jamu{
    public function saran(){//method atau fungsi saran 

        if($this->umur()<= 10){//pengkondisian apabila umur kurang dari samadengan 10thn 
            $konsumsi = 'Dikonsumsi 1x';
        }else{
            $konsumsi = 'Dikonsumsi 2x';
        }


        if($this->namaJamu() == 'Beras Kencur' && $this->keluhan == 'keseleo'){//pengkondisian untuk penggunaan jamu
            $penggunaan = 'Dioleskan';
        }else{
            $penggunaan = 'Diminum';
        }

        return 'Saran penggunaan '. $konsumsi. ' dengan cara '. $penggunaan .' !';//mengembalikan dua nilai konsumsi dan penggunaan kemudian ditampilkan dalam fild saran
    }
}
