<?php

namespace App\Http\Controllers\Umum;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\Buletinadmin_model;
use App\Models\Youtubeadmin_model;
use App\Models\Berita_model;
use App\Models\Unit;

class HomeController extends Controller
{
    //
    public function home(Request $request)
    {
        // Pencarian
        $keywords = $request->keywords;

        // Berita
        $berita = Berita_model::with('unit')
            ->when($keywords, function ($query, $keywords) {
                $query->where(function($q) use ($keywords) {
                    $q->where('judul', 'like', "%{$keywords}%")
                      ->orWhere('isi', 'like', "%{$keywords}%");
                });
            })
            ->orderBy('id_berita', 'DESC')
            ->paginate(5, ['*'], 'berita_page');

        // Buletin
        $buletin = Buletinadmin_model::with('unit')
            ->when($keywords, function ($query, $keywords) {
                $query->where(function($q) use ($keywords) {
                    $q->where('judul', 'like', "%{$keywords}%")
                      ->orWhere('isi', 'like', "%{$keywords}%");
                });
            })
            ->orderBy('id_buletin', 'DESC')
            ->paginate(5, ['*'], 'buletin_page');

        // Youtube
        $youtube = Youtubeadmin_model::with('unit')
            ->when($keywords, function ($query, $keywords) {
                $query->where(function($q) use ($keywords) {
                    $q->where('judul', 'like', "%{$keywords}%")
                      ->orWhere('isi', 'like', "%{$keywords}%");
                });
            })
            ->orderBy('id_youtube', 'DESC')
            ->paginate(5, ['*'], 'youtube_page');
        
        // Data ke view
        return view('index', [
            'title'     => 'Informasi Publik',
            'berita'    => $berita,
            'buletins'  => $buletin,
            'youtube'   => $youtube,
        ]);
    }

    // detail berita

    public function detailBerita($id)
    {
    // Ambil berita beserta relasi unit
    $berita = Berita_model::with('unit')
               ->where('id_berita', $id)
               ->firstOrFail();

    // Kunci untuk menyimpan status tampilan berita di session
    $key = 'berita_viewed_' . $berita->id_berita;

    // Tambah views jika belum pernah dilihat di session
    if (!session()->has($key)) {
        $berita->increment('views'); // Naikkan jumlah view
        session()->put($key, true);  // Simpan di session supaya tidak nambah terus
    }

    // Kembalikan tampilan dengan data berita
    return view('berita.detail', [
        'berita' => $berita,
        'title' => $berita->judul
    ]);
    }
    
    // buletin detail
    public function detailBuletin($id)
    {
    // Ambil berita beserta relasi unit
    $buletin = Buletinadmin_model::with('unit')
               ->where('id_buletin', $id)
               ->firstOrFail();

    // Kunci untuk menyimpan status tampilan berita di session
    $key = 'buletin_viewed_' . $buletin->id_buletin;

    // Tambah views jika belum pernah dilihat di session
    if (!session()->has($key)) {
        $buletin->increment('views'); // Naikkan jumlah view
        session()->put($key, true);  // Simpan di session supaya tidak nambah terus
    }

    // Kembalikan tampilan dengan data berita
    return view('buletin.detail', [
        'buletin' => $buletin,
        'title' => $buletin->judul
    ]);
    }


}
