<?php

use App\Http\Controllers\Admin\Berita;
use App\Http\Controllers\Admin\Buletin;
use App\Http\Controllers\Admin\User;
use App\Http\Controllers\Umum\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'home'])->name('home');

//halaman login
Route::get('login', 'App\Http\Controllers\Admin\Login@index');
Route::get('lupa-password', 'App\Http\Controllers\Admin\Login@lupa_password');
Route::post('cek-login', 'App\Http\Controllers\Admin\Login@cek_login');
Route::get('logout', 'App\Http\Controllers\Admin\Login@logout');

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