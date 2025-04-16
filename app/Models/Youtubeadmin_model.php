<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Youtubeadmin_model extends Model
{
    //use HasFactory;
    protected $table = 'youtube';
    protected $fillable = ['judul', 'isi', 'link_youtube', 'unit_id'];

    public function unit()
    {
    return $this->belongsTo(Unit::class, 'unit_id', 'id_unit'); 
    }
    //listing
    public function listing()
    {
        $query = DB::table('youtube')
            ->select('*')
            ->orderBy('id_youtube','DESC')
            ->get();
        return $query;
    }
    // tambah 
    public function tambah ($data)
    {
        DB::table('youtube')
            ->insert($data);
    }
    // detail
    public function detail($id_youtube)
    {
        $query = DB::table('youtube')
            ->select('*')
            ->where('id_youtube', $id_youtube)
            ->orderBy('id_youtube','DESC')
            ->first();
        return $query;
    }
    // edit
    public function edit($data)
    {
    DB::table('youtube')
        ->where('id_youtube', $data['id_youtube']) // <-- ERROR jika tidak ada 'id_buletin'
        ->update($data);
    }
    // hapus
    public function hapus ($data)
    {
        DB::table('youtube')
            ->where('id_youtube',$data['id_youtube'])
            ->delete();
    }
}
