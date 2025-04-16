<?php

use App\Http\Controllers\Admin\Berita;
use App\Http\Controllers\Admin\Buletin;
use App\Http\Controllers\Admin\User;
use App\Http\Controllers\Admin\Youtubeadmin;
use App\Http\Controllers\Umum\HomeController;
use App\Http\Controllers\Umum\Tentangkami;
use Illuminate\Support\Facades\Route;

// Index
Route::get('/', [HomeController::class, 'home'])->name('home');

// Tentang Kami
Route::get('tentangkami', [Tentangkami::class, 'index'])->name('tentangkami.index');

//halaman login
Route::get('login', 'App\Http\Controllers\Admin\Login@index');
Route::get('lupa-password', 'App\Http\Controllers\Admin\Login@lupa_password');
Route::post('cek-login', 'App\Http\Controllers\Admin\Login@cek_login');
Route::get('logout', 'App\Http\Controllers\Admin\Login@logout');

// Form Ganti Password
Route::get('akun', 'App\Http\Controllers\Admin\Login@edit')->name('akun.edit');

// Proses Ganti Password
Route::post('akun', 'App\Http\Controllers\Admin\Login@proses_edit')->name('akun.proses_edit');

// Dasbor
Route::get('dasbor', 'App\Http\Controllers\Admin\Dasbor@index');

// user
Route::get('user', 'App\Http\Controllers\Admin\User@index');
Route::get('user/tambah', 'App\Http\Controllers\Admin\User@tambah');
Route::post('user/proses-tambah', 'App\Http\Controllers\Admin\User@proses_tambah');
Route::get('user/edit/{id}', 'App\Http\Controllers\Admin\User@edit');
Route::post('user/proses-edit', 'App\Http\Controllers\Admin\User@proses_edit');
Route::post('user/delete/{id}', [User::class, 'delete'])->name('user.delete');

// User Berita
Route::get('berita', 'App\Http\Controllers\Admin\Berita@index');
Route::get('berita/tambah', 'App\Http\Controllers\Admin\Berita@tambah');
Route::post('berita/proses-tambah', 'App\Http\Controllers\Admin\Berita@proses_tambah');
Route::get('berita/edit/{id}', 'App\Http\Controllers\Admin\Berita@edit');
Route::post('berita/proses-edit', 'App\Http\Controllers\Admin\Berita@proses_edit');
Route::get('berita/delete/{id}', 'App\Http\Controllers\Admin\Berita@delete');
Route::post('berita/delete/{id}', [Berita::class, 'delete'])->name('berita.delete');

// User Buletin
Route::get('buletin', 'App\Http\Controllers\Admin\Buletin@index');
Route::get('buletin/tambah', 'App\Http\Controllers\Admin\Buletin@tambah');
Route::post('buletin/proses-tambah', 'App\Http\Controllers\Admin\Buletin@proses_tambah');
Route::get('buletin/edit/{id}', 'App\Http\Controllers\Admin\Buletin@edit');
Route::post('buletin/proses-edit', 'App\Http\Controllers\Admin\Buletin@proses_edit');
Route::post('buletin/delete/{id}', [Buletin::class, 'delete'])->name('buletin.delete');

// Youtube
Route::get('youtube', 'App\Http\Controllers\Admin\Youtubeadmin@index');
Route::get('youtube/tambah', 'App\Http\Controllers\Admin\Youtubeadmin@tambah');
Route::post('youtube/proses-tambah', 'App\Http\Controllers\Admin\Youtubeadmin@proses_tambah');
Route::get('youtube/edit/{id}', 'App\Http\Controllers\Admin\Youtubeadmin@edit');
Route::post('youtube/proses-edit', 'App\Http\Controllers\Admin\Youtubeadmin@proses_edit');
Route::post('youtube/delete/{id}', [Youtubeadmin::class, 'delete'])->name('youtube.delete');

// Berita
// Route::get('/berita', function () {
//     return view('berita.index');
// })->name('berita.index');

// // Buletin
// Route::get('/buletin', function () {
//     return view('buletin.index');
// })->name('buletin.index');

// Tentang Kami
Route::get('/tentangkami', function () {
    return view('tentangkami.index');
})->name('tentangkami.index');


// Profil
Route::get('/profil/uid', function () {
    return view('profil.uid');
})->name('profil.uid');

Route::get('/profil/up3sbu', function () {
    return view('profil.up3sbu');
})->name('profil.up3sbu');

Route::get('/profil/up3sbb', function () {
    return view('profil.up3sbb');
})->name('profil.up3sbb');

Route::get('/profil/up3sbs', function () {
    return view('profil.up3sbs');
})->name('profil.up3sbs');