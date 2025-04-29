<?php

namespace App\Http\Controllers\Umum;

use App\Http\Controllers\Controller;
use App\Models\Youtubeadmin_model;
use Illuminate\Http\Request;
use App\Models\Buletinadmin_model;
use App\Models\Berita_model;

class Up3sidoarjoController extends Controller
{
    public function sidoarjo(Request $request) 
    {
        $keywords = $request->keywords;
    
        $unit_id = 11;
    
        // Ambil data berita untuk daftar halaman (paginate)
        $berita = Berita_model::with('unit')
            ->where('unit_id', $unit_id) // Tambahkan filter ini
            ->when($keywords, function ($query, $keywords) {
                $query->where(function($q) use ($keywords) {
                    $q->where('judul', 'like', "%{$keywords}%")
                    ->orWhere('isi', 'like', "%{$keywords}%");
                });
            })
            ->orderBy('id_berita', 'DESC')
            ->paginate(5, ['*'], 'berita_page');


        // Ambil semua berita terbaru (tanpa paginate) untuk carousel slide 6 per slide
        $allBerita = Berita_model::with('unit')
            ->where('unit_id', $unit_id)
            ->when($keywords, function ($query, $keywords) {
                $query->where(function($q) use ($keywords) {
                    $q->where('judul', 'like', "%{$keywords}%")
                    ->orWhere('isi', 'like', "%{$keywords}%");
                });
            })
            ->orderBy('id_berita', 'DESC')
            ->get();

        // Buletin
        $buletin = Buletinadmin_model::with('unit')
            ->where('unit_id', $unit_id)
            ->when($keywords, function ($query, $keywords) {
                $query->where(function($q) use ($keywords) {
                    $q->where('judul', 'like', "%{$keywords}%")
                    ->orWhere('isi', 'like', "%{$keywords}%");
                });
            })
            ->orderBy('id_buletin', 'DESC')
            ->paginate(5, ['*'], 'buletin_page');
        
        // all buletin
        $allBuletin = Buletinadmin_model::with('unit')
            ->where('unit_id', $unit_id)
            ->when($keywords, function ($query, $keywords) {
                $query->where(function($q) use ($keywords) {
                    $q->where('judul', 'like', "%{$keywords}%")
                    ->orWhere('isi', 'like', "%{$keywords}%");
                });
            })
            ->orderBy('id_buletin', 'DESC')
            ->get();
    
        // Youtube
        $youtube = Youtubeadmin_model::with('unit')
            ->where('unit_id', $unit_id)
            ->when($keywords, function ($query, $keywords) {
                $query->where(function($q) use ($keywords) {
                    $q->where('judul', 'like', "%{$keywords}%")
                      ->orWhere('isi', 'like', "%{$keywords}%");
                });
            })
            ->orderBy('id_youtube', 'DESC')
            ->paginate(5, ['*'], 'youtube_page');
    
        return view('profil.up3sidoarjo', [
            'title'         => 'UP3 Sidoarjo',
            'berita'        => $berita,
            'allBerita'     => $allBerita,
            'buletins'      => $buletin,
            'allBuletin'    => $allBuletin,
            'youtube'       => $youtube,
        ]);
    }
}
