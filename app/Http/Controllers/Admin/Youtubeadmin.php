<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\Youtubeadmin_model;
use App\Models\Unit;

class Youtubeadmin extends Controller
{
    //Index
    public function index(Request $request)
    {
    $unit_id = session()->get('unit_id');

    // Query utama youtube
    $query = Youtubeadmin_model::with('unit')->orderBy('id_youtube', 'DESC');

    // Filter unit, kecuali jika admin (id_unit 18)
    if ($unit_id != 18) {
        $query->where('unit_id', $unit_id);
    }

    // Jika ada input pencarian
    if ($request->has('keywords')) {
        $keywords = $request->keywords;
        $query->where(function($q) use ($keywords) {
            $q->where('judul', 'like', "%{$keywords}%")
              ->orWhere('isi', 'like', "%{$keywords}%");
        });
    }

    $youtube = $query->paginate(10);

    // Ambil data unit
    $unit = Unit::where('id_unit', $unit_id)->first();

    $data = [ 
        'title'   => 'Data Youtube',
        'youtube'  => $youtube,
        'unit'    => $unit,
        'content' => 'admin/youtube/index'
    ];

    return view('admin/layout/wrapper', $data);
    }
    // tambah
   public function tambah()
   {
       $unit_id = session('unit_id');

       // Admin (unit_id 18) bisa lihat semua unit
        if ($unit_id == 18) {
            $units = \App\Models\Unit::select('id_unit', 'nama')->get();
        } else {
            // User biasa hanya bisa lihat unitnya sendiri
            $units = \App\Models\Unit::select('id_unit', 'nama')->where('id_unit', $unit_id)->get();
        }
       
       $data = [ 'title'      => 'Tambah Data Youtube',
                 'units'      => $units,
                 'content'    => 'admin/youtube/tambah'
               ];
       return view('admin/layout/wrapper',$data);
   }

   // proses_tambah
   public function proses_tambah(Request $request)
    {
        $units = \App\Models\Unit::select('id_unit', 'nama')->get();
        $m_youtube = new Youtubeadmin_model();

        request()->validate([
            'judul'        => 'required',
            'isi'          => 'required',
            'unit_id'      => 'required|exists:units,id_unit',
            'link_youtube' => 'required'
        ]);

        $unit_id = session('unit_id');

        // Jika bukan admin, paksa pakai unit_id dari session
        if ($unit_id != 18) {
            $request->merge(['unit_id' => $unit_id]);
        }

        // proses data input
        $data = [
            'judul'        => $request->judul,
            'isi'          => $request->isi,
            'unit_id'      => $request->unit_id,
            'link_youtube' => $request->link_youtube
        ];

        $m_youtube->tambah($data);

        // end proses
        return redirect('youtube')->with(['sukses' => 'Data Telah Ditambah']);
    }
    // edit
   public function edit($id_youtube)
   {
    $m_youtube = new Youtubeadmin_model();
    $youtube   = $m_youtube->detail($id_youtube);
    $unit_id  = session('unit_id');

    // Cegah akses berita dari unit lain jika bukan admin
    if ($unit_id != 18 && $youtube->unit_id != $unit_id) {
        return redirect('youtube')->with(['warning' => 'Anda tidak memiliki akses ke data ini.']);
    }

    // Ambil list unit: admin bisa semua, user hanya satu
    if ($unit_id == 18) {
        $units = \App\Models\Unit::select('id_unit', 'nama')->get(); // semua unit
    } else {
        $units = \App\Models\Unit::select('id_unit', 'nama')->where('id_unit', $unit_id)->get(); // hanya unit login
    }

    $data = [
        'title'   => 'Edit Youtube',
        'youtube' => $youtube,
        'units'   => $units,
        'content' => 'admin/youtube/edit'
    ];
       return view('admin/layout/wrapper',$data);
   }
    // proses_edit
    public function proses_edit(Request $request)
    {
        $m_youtube = new Youtubeadmin_model();

        // Validasi input
        $request->validate([
            'judul'         => 'required',
            'isi'           => 'required',
            'unit_id'       => 'required|exists:units,id_unit',
            'link_youtube'  => 'required',
        ]);

        $id_youtube = $request->id_youtube;

        $data = [
            'id_youtube'    => $id_youtube,
            'judul'         => $request->judul,
            'isi'           => $request->isi,
            'unit_id'       => $request->unit_id,
            'link_youtube'  => $request->link_youtube,
        ];

        $m_youtube->edit($data);

        return redirect('youtube')->with(['sukses' => 'Data Telah Diedit']);
    }

   //  delete
   public function delete($id)
   {
        $m_youtube = new Youtubeadmin_model();
        $data = ['id_youtube' => $id];
        $m_youtube->hapus($data);   
         
        return redirect('youtube')->with(['sukses' => 'Data Telah Dihapus']);
   }
}
