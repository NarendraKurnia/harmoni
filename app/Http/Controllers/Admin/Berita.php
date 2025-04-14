<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\Berita_model;
use App\Models\Unit;

class Berita extends Controller
{
    public function index(Request $request)
    {
    $unit_id = session()->get('unit_id');

    // Query utama berita
    $query = Berita_model::with('unit')->orderBy('id_berita', 'DESC');

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

    $berita = $query->paginate(10);

    // Ambil data unit
    $unit = Unit::where('id_unit', $unit_id)->first();

    $data = [ 
        'title'   => 'Data Berita',
        'berita'  => $berita,
        'unit'    => $unit,
        'content' => 'admin/berita/index'
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

    $data = [
        'title'   => 'Tambah Data Berita',
        'units'   => $units,
        'content' => 'admin/berita/tambah'
    ];
    return view('admin/layout/wrapper', $data);
    }


    // proses_tambah
    public function proses_tambah(Request $request)

    {
        $units = \App\Models\Unit::select('id_unit', 'nama')->get();
        $m_berita     = new Berita_model();
        request()->validate([
                                    'judul'   => 'required',
                                    'isi'     => 'required',
                                    'gambar'  => 'nullable|file|image|mimes:jpeg,png,jpg|max:8024',
                                    'unit_id' => 'required|exists:units,id_unit'
                                ]);
        $unit_id = session('unit_id');

        // Jika bukan admin, paksa pakai unit_id dari session
        if ($unit_id != 18) {
        $request->merge(['unit_id' => $unit_id]);
        }
        // proses data input
        $image                  = $request->file('gambar');
        if(!empty($image)) {
            $filenamewithextension  = $request->file('gambar')->getClientOriginalName();
            $filename               = pathinfo($filenamewithextension, PATHINFO_FILENAME);
            $input['nama_file']     = Str::slug($filename, '-').'-'.time().'.'.$image->getClientOriginalExtension();
            $destinationPath = 'admin/upload/berita/';
            $image->move($destinationPath, $input['nama_file']);

        $data   = [     'judul'         => $request->judul,
                        'isi'	        => $request->isi,
                        'unit_id'       => $request->unit_id,
                        'gambar'   	    => $input['nama_file']
                    ];
                  }              
        $m_berita->tambah($data);
        // end proses
        return redirect('berita')->with(['sukses' => 'Data Telah Ditambah']);
    }
    // edit
    public function edit($id_berita)
    {
    $m_berita = new Berita_model();
    $berita   = $m_berita->detail($id_berita);
    $unit_id  = session('unit_id');

    // Cegah akses berita dari unit lain jika bukan admin
    if ($unit_id != 18 && $berita->unit_id != $unit_id) {
        return redirect('berita')->with(['warning' => 'Anda tidak memiliki akses ke data ini.']);
    }

    // Ambil list unit: admin bisa semua, user hanya satu
    if ($unit_id == 18) {
        $units = \App\Models\Unit::select('id_unit', 'nama')->get(); // semua unit
    } else {
        $units = \App\Models\Unit::select('id_unit', 'nama')->where('id_unit', $unit_id)->get(); // hanya unit login
    }

    $data = [
        'title'   => 'Edit Berita',
        'berita'  => $berita,
        'units'   => $units,
        'content' => 'admin/berita/edit'
    ];

    return view('admin/layout/wrapper', $data);
    }
    // proses_edit
    public function proses_edit(Request $request)

    {
        $units = \App\Models\Unit::select('id_unit', 'nama')->get();
         $m_berita     = new Berita_model();
         request()->validate([
                             'judul'      => 'required',
                             'isi'        => 'required',
                             'unit_id' => 'required|exists:units,id_unit',
                             'gambar'     => 'nullable|file|image|mimes:jpeg,png,jpg|max:8024',
                            ]);
        // filter unit
        $unit_id = session('unit_id');
        if ($unit_id != 18) {
        $request->merge(['unit_id' => $unit_id]);
        }
         // proses data input
         $image                  = $request->file('gambar');
         if(!empty($image)) {
            $filenamewithextension  = $request->file('gambar')->getClientOriginalName();
            $filename               = pathinfo($filenamewithextension, PATHINFO_FILENAME);
            $input['nama_file']     = Str::slug($filename, '-').'-'.time().'.'.$image->getClientOriginalExtension();
            $destinationPath = 'admin/upload/berita/';
            $image->move($destinationPath, $input['nama_file']);
            $data   = [  'id_berita'     => $request->id_berita,
                         'judul'         => $request->judul,
                         'isi'	         => $request->isi,
                         'gambar'   	 => $input['nama_file'],
                         'unit_id' => $request->unit_id,
                     ];

        }else{   
            // tidak ganti gambar
            $data   = [  'id_berita'     => $request->id_berita,
                         'judul'         => $request->judul,
                         'isi'	         => $request->isi,
                         'unit_id' => $request->unit_id,
                     ];

        }
         $m_berita->edit($data);
         // end proses
         return redirect('berita')->with(['sukses' => 'Data Telah Diedit']);
    }
    //  delete
   public function delete($id)
   {
        $m_berita = new Berita_model();
        $data = ['id_berita' => $id];
        $m_berita->hapus($data);   
         
        return redirect('berita')->with(['sukses' => 'Data Telah Dihapus']);
   }
}
