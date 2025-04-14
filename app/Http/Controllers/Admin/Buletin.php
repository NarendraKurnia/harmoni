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
       // Query utama berita
       $query = Buletinadmin_model::with('unit')->orderBy('id_buletin', 'DESC');

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
       $units = \App\Models\Unit::select('id_unit', 'nama')->get();
       $m_buletin       = new Buletinadmin_model();
       
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
       $units = \App\Models\Unit::select('id_unit', 'nama')->get();
       $m_buletin       = new Buletinadmin_model();
       $buletin         = $m_buletin->detail($id_buletin);
       
       $data = [ 'title'       => 'Edit Buletin',
                 'buletin'     => $buletin,
                 'units'       => $units,
                 'content'     => 'admin/buletin/edit'
               ];
       return view('admin/layout/wrapper',$data);
   }
   // proses_edit
   public function proses_edit(Request $request)

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
        // Ambil ID buletin dari request
        $id_buletin = $request->id_buletin; 
        
        // proses data input
        $image                  = $request->file('gambar');
        if(!empty($image)) {
           $filenamewithextension  = $request->file('gambar')->getClientOriginalName();
           $filename               = pathinfo($filenamewithextension, PATHINFO_FILENAME);
           $input['nama_file']     = Str::slug($filename, '-').'-'.time().'.'.$image->getClientOriginalExtension();
           $destinationPath = 'admin/upload/buletin/';
           $image->move($destinationPath, $input['nama_file']);
           $data   = [  'id_buletin'      => $id_buletin,
                        'judul'           => $request->judul,
                        'edisi'	          => $request->edisi,
                        'isi'	          => $request->isi,
                        'unit_id'         => $request->unit_id,
                        'gambar'   	      => $input['nama_file'],
                        'link_buletin'	  => $request->link_buletin
                    ];

       }else{   
           // tidak ganti gambar
           $data   = [ 'id_buletin'      => $id_buletin,
                       'judul'           => $request->judul,
                       'edisi'	         => $request->edisi,
                       'isi'	         => $request->isi,
                       'unit_id'         => $request->unit_id,
                       'link_buletin'	 => $request->link_buletin
                    ];

       }
        $m_buletin->edit($data);
        // end proses
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
