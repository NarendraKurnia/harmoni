<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\Buletinadmin_model;
use App\Models\Unit;

class Buletin extends Controller
{
   //index
   public function index(Request $request)
   {
        $unit_id = session()->get('unit_id');

       // Query utama berita
       $query = Buletinadmin_model::with('unit')->orderBy('id_buletin', 'DESC');

       // Filter unit, kecuali jika admin (id_unit 18)
        if ($unit_id != 18) {
            $query->where('unit_id', $unit_id);
        }

       // Jika ada input pencarian, filter berdasarkan judul atau isi berita
       if ($request->has('keywords')) {
           $keywords = $request->keywords;
           $query->where(function($q) use ($keywords) {
               $q->where('judul', 'like', "%{$keywords}%")
               ->orWhere('isi', 'like', "%{$keywords}%");
           });
       }

       // Ambil data berita dengan pagination
       $buletin = $query->paginate(10); 

       // Ambil unit berdasarkan session
        $unit_id = session()->get('unit_id');
        $unit = Unit::where('id_unit', $unit_id)->first();

       // Data yang dikirim ke view
       $data = [ 
           'title'   => 'Data Buletin',
           'buletin'  => $buletin,
           'unit'    => $unit,
           'content' => 'admin/buletin/index'
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
       
       $data = [ 'title'      => 'Tambah Data Buletin',
                 'units'      => $units,
                 'content'    => 'admin/buletin/tambah'
               ];
       return view('admin/layout/wrapper',$data);
   }

   // proses_tambah
   public function proses_tambah(Request $request)

   {
       $units = \App\Models\Unit::select('id_unit', 'nama')->get();
       $m_buletin     = new Buletinadmin_model();
       request()->validate([
                                   'judul'            => 'required',
                                   'edisi'            => 'required',
                                   'isi'              => 'required',
                                   'gambar'           => 'nullable|file|image|mimes:jpeg,png,jpg|max:8024',
                                   'unit_id'          => 'required|exists:units,id_unit',
                                   'link_buletin'     => 'required'
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
           $destinationPath = 'admin/upload/buletin/';
           $image->move($destinationPath, $input['nama_file']);

       $data   = [     'judul'           => $request->judul,
                       'edisi'	         => $request->edisi,
                       'isi'	         => $request->isi,
                       'unit_id'         => $request->unit_id,
                       'gambar'   	     => $input['nama_file'],
                       'link_buletin'	 => $request->link_buletin
                   ];
                 }              
       $m_buletin->tambah($data);
       // end proses
       return redirect('buletin')->with(['sukses' => 'Data Telah Ditambah']);
   }
   // edit
   public function edit($id_buletin)
   {
    $m_buletin = new Buletinadmin_model();
    $buletin   = $m_buletin->detail($id_buletin);
    $unit_id  = session('unit_id');

    // Cegah akses berita dari unit lain jika bukan admin
    if ($unit_id != 18 && $buletin->unit_id != $unit_id) {
        return redirect('buletin')->with(['warning' => 'Anda tidak memiliki akses ke data ini.']);
    }

    // Ambil list unit: admin bisa semua, user hanya satu
    if ($unit_id == 18) {
        $units = \App\Models\Unit::select('id_unit', 'nama')->get(); // semua unit
    } else {
        $units = \App\Models\Unit::select('id_unit', 'nama')->where('id_unit', $unit_id)->get(); // hanya unit login
    }

    $data = [
        'title'   => 'Edit Buletin',
        'buletin'  => $buletin,
        'units'   => $units,
        'content' => 'admin/buletin/edit'
    ];
       return view('admin/layout/wrapper',$data);
   }
   // proses_edit
    public function proses_edit(Request $request)
    {
        $m_buletin = new Buletinadmin_model();

        // Validasi input
        $request->validate([
            'judul'         => 'required',
            'edisi'         => 'required',
            'isi'           => 'required',
            'gambar'        => 'nullable|file|image|mimes:jpeg,png,jpg|max:8024',
            'unit_id'       => 'required|exists:units,id_unit',
            'link_buletin'  => 'required',
        ]);

        $id_buletin = $request->id_buletin;
        $image = $request->file('gambar');

        $data = [
            'id_buletin'    => $id_buletin,
            'judul'         => $request->judul,
            'edisi'         => $request->edisi,
            'isi'           => $request->isi,
            'unit_id'       => $request->unit_id,
            'link_buletin'  => $request->link_buletin,
        ];

        // Jika ada gambar baru diupload
        if ($image) {
            $filenameWithExtension = $image->getClientOriginalName();
            $filename = pathinfo($filenameWithExtension, PATHINFO_FILENAME);
            $nama_file = Str::slug($filename, '-') . '-' . time() . '.' . $image->getClientOriginalExtension();

            $destinationPath = 'admin/upload/buletin/';
            $image->move(public_path($destinationPath), $nama_file);
            $buletin = $m_buletin->detail($id_buletin);

            if ($image && $buletin->gambar) {
                $oldPath = public_path('admin/upload/buletin/' . $buletin->gambar);
                if (file_exists($oldPath)) {
                    unlink($oldPath);
                }
            }

            $data['gambar'] = $nama_file;
        }

        $m_buletin->edit($data);

        return redirect('buletin')->with(['sukses' => 'Data Telah Diedit']);
    }

   //  delete
   public function delete($id)
   {
        $m_buletin = new Buletinadmin_model();
        $data = ['id_buletin' => $id];
        $m_buletin->hapus($data);   
         
        return redirect('buletin')->with(['sukses' => 'Data Telah Dihapus']);
   }
}
