<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Berita_model;
use App\Models\Buletinadmin_model;
use App\Models\Unit;
use App\Models\Unit_model; // Tambahkan model ini jika berbeda dengan Unit
use Carbon\Carbon;

class Dasbor extends Controller
{
    public function index()
    {
        $rekapPerUnit = [];
        $bulanSekarang = Carbon::now();
        $units = Unit::all();
        $chartLabels = [];
        $chartData = [];

        // Ambil unit yang sedang login dari session
        $unit_id = session()->get('unit_id');
        $unit = Unit::where('id_unit', $unit_id)->first(); // atau pakai Unit_model kalau nama model kamu begitu

        foreach ($units as $unitLoop) {
            $dataPerBulan = [];
            $totalPointUnit = 0;

            for ($i = 0; $i < 6; $i++) {
                $bulanTarget = Carbon::now()->subMonths($i);

                $beritaCount = Berita_model::where('unit_id', $unitLoop->id_unit)
                    ->whereMonth('tanggal_update', $bulanTarget->month)
                    ->whereYear('tanggal_update', $bulanTarget->year)
                    ->count();

                $buletinCount = Buletinadmin_model::where('unit_id', $unitLoop->id_unit)
                    ->whereMonth('tanggal_update', $bulanTarget->month)
                    ->whereYear('tanggal_update', $bulanTarget->year)
                    ->count();

                $point = ($beritaCount + $buletinCount) * 20;
                $totalPointUnit += $point;

                $dataPerBulan[] = [
                    'bulan'   => $bulanTarget->translatedFormat('F Y'),
                    'berita'  => $beritaCount,
                    'buletin' => $buletinCount,
                    'point'   => $point,
                ];
            }

            $rekapPerUnit[] = [
                'unit_nama'     => $unitLoop->nama,
                'rekap'         => array_reverse($dataPerBulan),
                'total_point'   => $totalPointUnit
            ];

            $chartData[] = $totalPointUnit;
            $chartLabels[] = $unitLoop->nama;
        }

        $data = [
            'title'         => 'Halaman Dasbor',
            'content'       => 'admin/dasbor/index',
            'rekapPerUnit'  => $rekapPerUnit,
            'chartLabels'   => json_encode($chartLabels),
            'chartData'     => json_encode($chartData),
            'unit'          => $unit // dikirim ke view
        ];

        return view('admin/layout/wrapper', $data);
    }
}
