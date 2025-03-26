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
}
