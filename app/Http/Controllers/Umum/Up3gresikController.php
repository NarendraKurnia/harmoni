<?php

namespace App\Http\Controllers\Umum;

use App\Http\Controllers\Controller;
use App\Models\Youtubeadmin_model;
use Illuminate\Http\Request;
use App\Models\Buletinadmin_model;
use App\Models\Berita_model;

class Up3gresikController extends Controller
{
    public function gresik(Request $request) 
    {
        $keywords = $request->keywords;
    
        $unit_id = 6;
    
        // Berita
        $berita = Berita_model::with('unit')
            ->where('unit_id', $unit_id)
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
            ->where('unit_id', $unit_id)
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
            ->where('unit_id', $unit_id)
            ->when($keywords, function ($query, $keywords) {
                $query->where(function($q) use ($keywords) {
                    $q->where('judul', 'like', "%{$keywords}%")
                      ->orWhere('isi', 'like', "%{$keywords}%");
                });
            })
            ->orderBy('id_youtube', 'DESC')
            ->paginate(5, ['*'], 'youtube_page');
    
        return view('profil.up3gresik', [
            'title' => 'UP3 Gresik',
            'berita' => $berita,
            'buletins' => $buletin,
            'youtube' => $youtube,
        ]);
    }
}

