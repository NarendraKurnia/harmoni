<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
})->name('home');;

//halaman login
Route::get('login', 'App\Http\Controllers\Admin\Login@index');
Route::get('lupa-password', 'App\Http\Controllers\Admin\Login@lupa_password');

// Dasbor
Route::get('dasbor', 'App\Http\Controllers\Admin\Dasbor@index');

// user
Route::get('user', 'App\Http\Controllers\Admin\User@index');

// Berita
Route::get('/berita', function () {
    return view('berita.index');
})->name('berita.index');

// Buletin
Route::get('/buletin', function () {
    return view('buletin.index');
})->name('buletin.index');

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