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

       // Data yang dikirim ke view
       $data = [ 
           'title'   => 'Data Buletin',
           'buletin'  => $buletin,
           'content' => 'admin/buletin/index'
       ];

       return view('admin/layout/wrapper', $data);
   }
}
