<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Berita_model;
use App\Models\Buletinadmin_model;
use App\Models\Youtubeadmin_model;   
use App\Models\Unit;
use Carbon\Carbon;

class Dasbor extends Controller
{
    public function index()
    {
        $unit_id = session()->get('unit_id');

        $rekapPerUnit  = [];
        $bulanSekarang = Carbon::now();
        $unit_id       = session('unit_id');

        // Admin (1 & 18) boleh lihat semua unit
        $units = in_array($unit_id, [1, 18])
            ? Unit::all()
            : Unit::where('id_unit', $unit_id)->get();

        $chartLabels = [];
        $chartData   = [];

        foreach ($units as $unitLoop) {
            $dataPerBulan   = [];
            $totalPointUnit = 0;

            // Rekap 6 bulan terakhir
            for ($i = 0; $i < 6; $i++) {
                $bulanTarget = $bulanSekarang->copy()->subMonths($i);

                // Hitung data per unit per bulan
                $beritaCount  = Berita_model::where('unit_id', $unitLoop->id_unit)
                    ->whereMonth('tanggal_update', $bulanTarget->month)
                    ->whereYear('tanggal_update', $bulanTarget->year)
                    ->count();

                $buletinCount = Buletinadmin_model::where('unit_id', $unitLoop->id_unit)
                    ->whereMonth('tanggal_update', $bulanTarget->month)
                    ->whereYear('tanggal_update', $bulanTarget->year)
                    ->count();

                $youtubeCount = Youtubeadmin_model::where('unit_id', $unitLoop->id_unit)
                    ->whereMonth('tanggal_update', $bulanTarget->month)
                    ->whereYear('tanggal_update', $bulanTarget->year)
                    ->count();

                // Ambil data unit
                $unit = Unit::where('id_unit', $unit_id)->first();

                // 20 poin per upload
                $point = ($beritaCount + $buletinCount + $youtubeCount) * 20;
                $totalPointUnit += $point;

                $dataPerBulan[] = [
                    'bulan'   => $bulanTarget->translatedFormat('F Y'),
                    'berita'  => $beritaCount,
                    'buletin' => $buletinCount,
                    'youtube' => $youtubeCount,
                    'point'   => $point,
                ];
            }

            $rekapPerUnit[] = [
                'unit_nama'   => $unitLoop->nama,
                'rekap'       => array_reverse($dataPerBulan),
                'total_point' => $totalPointUnit,
            ];

            $chartLabels[] = $unitLoop->nama;
            $chartData[]   = $totalPointUnit;
        }

        return view('admin/layout/wrapper', [
            'title'        => 'Halaman Dasbor',
            'content'      => 'admin/dasbor/index',
            'rekapPerUnit' => $rekapPerUnit,
            'unit'         => $unit,
            'chartLabels'  => json_encode($chartLabels),
            'chartData'    => json_encode($chartData),
        ]);
    }
    
}

