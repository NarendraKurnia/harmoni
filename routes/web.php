<?php

use App\Http\Controllers\Admin\Berita;
use App\Http\Controllers\Admin\Buletin;
use App\Http\Controllers\Admin\User;
use App\Http\Controllers\Admin\Youtubeadmin;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\Dasbor;
use App\Http\Controllers\Umum\HomeController;
use App\Http\Controllers\Umum\Tentangkami;
use App\Http\Controllers\Umum\UIDController;
use App\Http\Controllers\Umum\Up2dController;
use App\Http\Controllers\Umum\Up3banyuwangiController;
use App\Http\Controllers\Umum\Up3bojonegoroController;
use App\Http\Controllers\Umum\Up3gresikController;
use App\Http\Controllers\Umum\Up3kediriController;
use App\Http\Controllers\Umum\Up3madiunController;
use App\Http\Controllers\Umum\Up3maduraController;
use App\Http\Controllers\Umum\Up3malangController;
use App\Http\Controllers\Umum\Up3mojokertoController;
use App\Http\Controllers\Umum\Up3pasuruanController;
use App\Http\Controllers\Umum\Up3ponorogoController;
use App\Http\Controllers\Umum\Up3sbsController;
use App\Http\Controllers\Umum\Up3sbuController;
use App\Http\Controllers\Umum\Up3sbbController;
use App\Http\Controllers\Umum\Up3sidoarjoController;
use App\Http\Controllers\Umum\Up3situbondoController;
use App\Models\Banner_model;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Password;
use App\Http\Controllers\Api\DashboardApiController;

Route::middleware('guest')->group(function () {
    // Tampil form “Lupa Password”
    Route::get('forgot-password', function(){
    return view('admin/layout/wrapper', [
        'title'   => 'Lupa Password',
        'content' => 'admin/login/lupa_password'
    ]);
})->name('password.request');

    // Proses kirim email reset link
    Route::post('forgot-password', function (Request $request) {
        $request->validate(['email' => 'required|email']);
        $status = Password::sendResetLink(
            $request->only('email')
        );
        return $status == Password::RESET_LINK_SENT
            ? back()->with('status', __($status))
            : back()->withErrors(['email' => __($status)]);
    })->name('password.email');

    // Tampil form reset password via token
    Route::view('reset-password/{token}', 'admin.login.reset_password')
         ->name('password.reset');

    // Proses update password
    Route::post('reset-password', function (Request $request) {
        $request->validate([
            'token'                 => 'required',
            'email'                 => 'required|email',
            'password'              => 'required|confirmed|min:6',
            'password_confirmation' => 'required'
        ]);

        $status = Password::reset(
            $request->only('email','password','password_confirmation','token'),
            function (\App\Models\User $user, $password) {
                $user->password = bcrypt($password);
                $user->save();
            }
        );

        return $status == Password::PASSWORD_RESET
            ? redirect()->route('login')->with('status', __($status))
            : back()->withErrors(['email' => [__($status)]]);
    })->name('password.update');
});
// Index
Route::get('/', [HomeController::class, 'home'])->name('home');
Route::get('/berita/{id}', [HomeController::class, 'detailBerita'])->name('berita.detail');
Route::get('/buletin/{id}', [HomeController::class, 'detailBuletin'])->name('buletin.detail');


Route::get('/search', [HomeController::class, 'home'])->name('search');

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
Route::get('api/rekap-dasbor', [DashboardApiController::class, 'rekap']);

// user
Route::get('user', 'App\Http\Controllers\Admin\User@index');
Route::get('user/tambah', 'App\Http\Controllers\Admin\User@tambah');
Route::post('user/proses-tambah', 'App\Http\Controllers\Admin\User@proses_tambah');
Route::get('user/edit/{id}', 'App\Http\Controllers\Admin\User@edit');
Route::post('user/proses-edit', 'App\Http\Controllers\Admin\User@proses_edit');
Route::post('user/delete/{id}', [User::class, 'delete'])->name('user.delete');
Route::get('user/ganti-password', [User::class, 'ganti_password'])->name('user.ganti_password');
Route::post('user/ganti-password/proses', [User::class, 'proses_ganti_password'])->name('user.proses_ganti_password');

// Berita
Route::get('berita', 'App\Http\Controllers\Admin\Berita@index')->name('berita.index');
Route::get('berita/tambah', 'App\Http\Controllers\Admin\Berita@tambah')->name('berita.tambah');
Route::post('berita/proses-tambah', 'App\Http\Controllers\Admin\Berita@proses_tambah')->name('berita.proses_tambah');
Route::get('berita/edit/{id}', 'App\Http\Controllers\Admin\Berita@edit')->name('berita.edit');
Route::post('berita/proses-edit', 'App\Http\Controllers\Admin\Berita@proses_edit')->name('berita.proses_edit');
Route::post('berita/delete/{id}', [Berita::class, 'delete'])->name('berita.delete');
Route::get('berita/{id}', [App\Http\Controllers\Umum\HomeController::class, 'detailBerita'])
     ->whereNumber('id')
     ->name('berita.detail');

// Buletin
Route::get('buletin', 'App\Http\Controllers\Admin\Buletin@index')->name('buletin.index');
Route::get('buletin/tambah', 'App\Http\Controllers\Admin\Buletin@tambah')->name('buletin.tambah');
Route::post('buletin/proses-tambah', 'App\Http\Controllers\Admin\Buletin@proses_tambah')->name('buletin.proses_tambah');
Route::get('buletin/edit/{id}', 'App\Http\Controllers\Admin\Buletin@edit')->name('buletin.edit');
Route::post('buletin/proses-edit', 'App\Http\Controllers\Admin\Buletin@proses_edit')->name('buletin.proses_edit');
Route::post('buletin/delete/{id}', [Buletin::class, 'delete'])->name('buletin.delete');
Route::get('buletin/{id}', [App\Http\Controllers\Umum\HomeController::class, 'detailBuletin'])
     ->whereNumber('id')
     ->name('buletin.detail');

// Youtube
Route::get('youtube', 'App\Http\Controllers\Admin\Youtubeadmin@index');
Route::get('youtube/tambah', 'App\Http\Controllers\Admin\Youtubeadmin@tambah');
Route::post('youtube/proses-tambah', 'App\Http\Controllers\Admin\Youtubeadmin@proses_tambah');
Route::get('youtube/edit/{id}', 'App\Http\Controllers\Admin\Youtubeadmin@edit');
Route::post('youtube/proses-edit', 'App\Http\Controllers\Admin\Youtubeadmin@proses_edit');
Route::post('youtube/delete/{id}', [Youtubeadmin::class, 'delete'])->name('youtube.delete');

// banner 
Route::get('banner', 'App\Http\Controllers\Admin\BannerController@index');
Route::get('banner/tambah', 'App\Http\Controllers\Admin\BannerController@tambah');
Route::post('banner/proses-tambah', 'App\Http\Controllers\Admin\BannerController@proses_tambah');
Route::get('banner/edit/{id}', 'App\Http\Controllers\Admin\BannerController@edit');
Route::post('banner/proses-edit', 'App\Http\Controllers\Admin\BannerController@proses_edit');
Route::post('banner/delete/{id}', [BannerController::class, 'delete'])->name('banner.delete');

// Berita
// Route::get('/berita', function () {
//     return view('berita.index');
// })->name('berita.index');

// // Buletin
// Route::get('/buletin', function () {
//     return view('buletin.index');
// })->name('buletin.index');

// Tentang Kami
Route::get('/tentang-kami', [Tentangkami::class, 'index']);

// Unit
Route::prefix('profil')->group(function () {
    Route::get('/uid', [UIDController::class, 'uid'])->name('profil.uid');
    Route::get('/up3sbu', [Up3sbuController::class, 'sbu'])->name('profil.up3sbu');
    Route::get('/up3sbs', [Up3sbsController::class, 'sbs'])->name('profil.up3sbs');
    Route::get('/up3sbb', [Up3sbbController::class, 'sbb'])->name('profil.up3sbb');
    Route::get('/up3mojokerto', [Up3mojokertoController::class, 'mojokerto'])->name('profil.up3mojokerto');
    Route::get('/up3gresik', [Up3gresikController::class, 'gresik'])->name('profil.up3gresik');
    Route::get('/up3madura', [Up3maduraController::class, 'madura'])->name('profil.up3madura');
    Route::get('/up3banyuwangi', [Up3banyuwangiController::class, 'banyuwangi'])->name('profil.up3banyuwangi');
    Route::get('/up2d', [Up2dController::class, 'up2d'])->name('profil.up2d');
    Route::get('/up3malang', [Up3malangController::class, 'malang'])->name('profil.up3malang');
    Route::get('/up3sidoarjo', [Up3sidoarjoController::class, 'sidoarjo'])->name('profil.up3sidoarjo');
    Route::get('/up3madiun', [Up3madiunController::class, 'madiun'])->name('profil.up3madiun');
    Route::get('/up3pasuruan', [Up3pasuruanController::class, 'pasuruan'])->name('profil.up3pasuruan');
    Route::get('/up3bojonegoro', [Up3bojonegoroController::class, 'bojonegoro'])->name('profil.up3bojonegoro');
    Route::get('/up3kediri', [Up3kediriController::class, 'kediri'])->name('profil.up3kediri');
    Route::get('/up3ponorogo', [Up3ponorogoController::class, 'ponorogo'])->name('profil.up3ponorogo');
    Route::get('/up3situbondo', [Up3situbondoController::class, 'situbondo'])->name('profil.up3situbondo');
});

