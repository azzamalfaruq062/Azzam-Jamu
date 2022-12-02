<?php

use App\Http\Controllers\KategoriController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\RekomendasiController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('');
// });

Route::get('/', [PostController::class, 'beranda'])->name('beranda');
Route::get('/detailberanda', [PostController::class, 'detailberanda'])->name('detailberanda');
Route::get('/rek', [RekomendasiController::class, 'rek'])->name('rek');
Route::post('/rekomendasi', [RekomendasiController::class, 'rekomendasi'])->name('rekomendasi');

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware('auth')->group(function(){
    Route::resource('kategori', KategoriController::class);
    Route::get('deletkategori/{kategori}', [KategoriController::class, 'destroy'])->name('deletkategori');
    Route::resource('produk', ProdukController::class);
    Route::get('deletproduk/{produk}', [ProdukController::class, 'destroy'])->name('deletproduk');
    Route::resource('post', PostController::class);
    Route::get('deletpost/{post}', [PostController::class,'destroy'])->name('deletpost');
});

Route::middleware(['auth', 'admin'])->group(function(){
    Route::resource('user', UserController::class);
    Route::get('deletuser/{id}', [UserController::class, 'destroy'])->name('deletuser');
});
