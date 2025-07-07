<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Berita_model;
use App\Models\Buletinadmin_model;
use App\Models\Youtubeadmin_model;
use App\Models\Unit;
use Carbon\Carbon;

class DashboardApiController extends Controller
{
    public function rekap(Request $request)
    {
        $unit_id = $request->input('unit_id', session('unit_id'));

        $bulanSekarang = Carbon::now();
        $units = in_array($unit_id, [1, 18])
            ? Unit::all()
            : Unit::where('id_unit', $unit_id)->get();

        $result = [];

        foreach ($units as $unit) {
            $total_point = 0;
            $rekap_bulanan = [];

            for ($i = 0; $i < 6; $i++) {
                $bulanTarget = $bulanSekarang->copy()->subMonths($i);
                
                $berita = Berita_model::where('unit_id', $unit->id_unit)
                    ->whereMonth('tanggal_update', $bulanTarget->month)
                    ->whereYear('tanggal_update', $bulanTarget->year)
                    ->count();

                $buletin = Buletinadmin_model::where('unit_id', $unit->id_unit)
                    ->whereMonth('tanggal_update', $bulanTarget->month)
                    ->whereYear('tanggal_update', $bulanTarget->year)
                    ->count();

                $youtube = Youtubeadmin_model::where('unit_id', $unit->id_unit)
                    ->whereMonth('tanggal_update', $bulanTarget->month)
                    ->whereYear('tanggal_update', $bulanTarget->year)
                    ->count();

                $poin = ($berita + $buletin + $youtube) * 20;
                $total_point += $poin;

                $rekap_bulanan[] = [
                    'bulan' => $bulanTarget->translatedFormat('F Y'),
                    'berita' => $berita,
                    'buletin' => $buletin,
                    'youtube' => $youtube,
                    'point' => $poin
                ];
            }

            $result[] = [
                'unit_nama' => $unit->nama,
                'total_point' => $total_point,
                'rekap_bulanan' => array_reverse($rekap_bulanan),
            ];
        }

        return response()->json([
            'status' => 'success',
            'data' => $result
        ]);
    }
}
