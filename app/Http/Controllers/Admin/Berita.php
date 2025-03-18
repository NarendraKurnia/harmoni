<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\Berita_model;

class Berita extends Controller
{
    //index
    public function index()
    {
        $m_berita         = new Berita_model();
        $berita           = $m_berita->listing();

        $data = [ 'title'      => 'Data Berita',
                  'berita'     => $berita,
                  'content'    => 'admin/berita/index'
                ];
        return view('admin/layout/wrapper',$data);
    }
    // tambah
    public function tambah()
    {
        $m_berita       = new Berita_model();
        
        $data = [ 'title'      => 'Tambah Data Berita',
                  'content'    => 'admin/berita/tambah'
                ];
        return view('admin/layout/wrapper',$data);
    }

    // proses_tambah
    public function proses_tambah(Request $request)

    {
        $m_berita     = new Berita_model();
        request()->validate([
                                    'judul'      => 'required',
					                'isi'        => 'required',
					                'gambar'     => 'file|image|mimes:jpeg,png,jpg|max:8024',
                                    'unit'       => 'required',
                                    ]);
        // proses data input
        $image                  = $request->file('gambar');
        if(!empty($image)) {
            $filenamewithextension  = $request->file('gambar')->getClientOriginalName();
            $filename               = pathinfo($filenamewithextension, PATHINFO_FILENAME);
            $input['nama_file']     = Str::slug($filename, '-').'-'.time().'.'.$image->getClientOriginalExtension();
            $destinationPath = 'admin/upload/berita/';
            $image->move($destinationPath, $input['nama_file']);

        $data   = [     'judul'          => $request->judul,
                        'isi'	        => $request->isi,
                        'unit'  	=> $request->unit,
                        'gambar'   	=> $input['nama_file']
                    ];
                  }              
        $m_berita->tambah($data);
        // end proses
        return redirect('berita')->with(['sukses' => 'Data Telah Ditambah']);
    }
    // edit
    public function edit($id_berita)
    {
        $m_berita       = new Berita_model();
        $berita         = $m_berita->detail($id_berita);
        
        $data = [ 'title'      => 'Edit Berita',
                  'berita'     => $berita,
                  'content'    => 'admin/berita/edit'
                ];
        return view('admin/layout/wrapper',$data);
    }
    // proses_edit
    public function proses_edit(Request $request)

    {
         $m_berita     = new Berita_model();
         request()->validate([
                             'judul'      => 'required',
                             'isi'        => 'required',
                             'unit'       => 'required',
                             'gambar'     => 'nullable|file|image|mimes:jpeg,png,jpg|max:8024',
                            ]);
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
                         'unit'          => $request->unit
                     ];

        }else{   
            // tidak ganti gambar
            $data   = [  'id_berita'     => $request->id_berita,
                         'judul'         => $request->judul,
                         'isi'	         => $request->isi,
                         'unit'          => $request->unit,
                     ];

        }
         $m_berita->edit($data);
         // end proses
         return redirect('berita')->with(['sukses' => 'Data Telah Diedit']);
    }
    //  delete
    public function delete($id_berita)
    {
        $m_user       = new Berita_model();
        $data         = ['id_berita'  => $id_berita];
        $m_user->hapus($data);
        return redirect('admin/berita')->with(['sukses' => 'Data Telah Dihapus']);
    }
}
