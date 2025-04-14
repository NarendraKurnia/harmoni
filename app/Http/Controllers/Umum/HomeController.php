<?php

namespace App\Http\Controllers\Umum;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\Buletinadmin_model;
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

        // Data ke view
        return view('index', [
            'title' => 'Informasi Publik',
            'berita' => $berita,
            'buletins' => $buletin,
        ]);
    }
}
