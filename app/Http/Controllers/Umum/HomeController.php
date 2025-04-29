<?php

namespace App\Http\Controllers\Umum;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\Buletinadmin_model;
use App\Models\Youtubeadmin_model;
use App\Models\Berita_model;
use App\Models\Banner_model;
use App\Models\Unit;

class HomeController extends Controller
{
    /**
     * Tampilkan halaman utama, termasuk banner, carousel berita, buletin, dan video
     */
    public function home(Request $request)
    {
        // Pencarian global
        $keywords = $request->keywords;

        // Banner untuk carousel banner
        $banner = (new Banner_model())->listing();

        // Ambil data berita untuk daftar halaman (paginate)
        $berita = Berita_model::with('unit')
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
            ->when($keywords, function ($query, $keywords) {
                $query->where(function($q) use ($keywords) {
                    $q->where('judul', 'like', "%{$keywords}%")
                      ->orWhere('isi', 'like', "%{$keywords}%");
                });
            })
            ->orderBy('id_buletin', 'DESC')
            ->get(); // get semua, nanti chunk di blade
        
        // Youtube
            $youtube = Youtubeadmin_model::with('unit')
            ->whereHas('unit', function ($query) {
                $query->where('nama', 'Admin'); // Sesuaikan ini dengan nama unit admin kamu
            })
            ->when($keywords, function ($query, $keywords) {
                $query->where(function($q) use ($keywords) {
                    $q->where('judul', 'like', "%{$keywords}%")
                      ->orWhere('isi', 'like', "%{$keywords}%");
                });
            })
            ->orderBy('id_youtube', 'DESC')
            ->paginate(5, ['*'], 'youtube_page');
        

        // Kirim semua data ke view
        return view('index', [
            'title'         => 'Informasi Publik',
            'banner'        => $banner,
            'berita'        => $berita,
            'allBerita'     => $allBerita,
            'buletins'      => $buletin,
            'allBuletin'    => $allBuletin,
            'youtube'       => $youtube,
        ]);
    }

    /**
     * Tampilkan halaman detail berita
     */
    public function detailBerita($id)
    {
        $berita = Berita_model::with('unit')
                   ->where('id_berita', $id)
                   ->firstOrFail();

        $berita_terkini = Berita_model::with('unit')
            ->where('id_berita', '!=', $id)
            ->orderBy('id_berita', 'DESC')
            ->take(4)
            ->get();

        $key = 'berita_viewed_' . $berita->id_berita;
        if (!session()->has($key)) {
            $berita->increment('views');
            session()->put($key, true);
        }

        return view('berita.detail', [
            'berita'            => $berita,
            'berita_terkini'    => $berita_terkini,
            'title'             => $berita->judul
        ]);
    }

    /**
     * Tampilkan halaman detail buletin
     */
    public function detailBuletin($id)
    {
        $buletin = Buletinadmin_model::with('unit')
                   ->where('id_buletin', $id)
                   ->firstOrFail();

        $key = 'buletin_viewed_' . $buletin->id_buletin;
        if (!session()->has($key)) {
            $buletin->increment('views');
            session()->put($key, true);
        }
        $key = 'buletin_viewed_' . $buletin->id_buletin;
        if (!session()->has($key)) {
            $buletin->increment('views');
            session()->put($key, true);
        }
        return view('buletin.detail', [
            'buletin' => $buletin,
            'title'   => $buletin->judul
        ]);
    }
}
