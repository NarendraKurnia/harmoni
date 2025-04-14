<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Buletinadmin_model extends Model
{
    use HasFactory;
    protected $table = 'buletins';
    protected $fillable = ['judul', 'isi', 'gambar', 'unit_id'];

    public function unit()
    {
    return $this->belongsTo(Unit::class, 'unit_id', 'id_unit'); 
    }
    //listing
    public function listing()
    {
        $query = DB::table('buletins')
            ->select('*')
            ->orderBy('id_buletin','DESC')
            ->get();
        return $query;
    }
    // tambah 
    public function tambah ($data)
    {
        DB::table('buletins')
            ->insert($data);
    }
    // detail
    public function detail($id_buletin)
    {
        $query = DB::table('buletins')
            ->select('*')
            ->where('id_buletin', $id_buletin)
            ->orderBy('id_buletin','DESC')
            ->first();
        return $query;
    }
    public function edit($data)
    {
    DB::table('buletins')
        ->where('id_buletin', $data['id_buletin']) // <-- ERROR jika tidak ada 'id_buletin'
        ->update($data);
    }
    // hapus
    public function hapus ($data)
    {
        DB::table('buletins')
            ->where('id_buletin',$data['id_buletin'])
            ->delete();
    }
}
