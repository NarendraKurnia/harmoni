<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class User_model extends Model
{
    use HasFactory;

    //listing
    public function listing()
    {
        $query = DB::table('users')
            ->select('*')
            ->orderBy('id_user','DESC')
            ->get();
        return $query;
    }
    // tambah 
    public function tambah ($data)
    {
        DB::table('users')->insert($data);
    }
    // detail
    public function detail($id_user)
    {
        $query = DB::table('users')
            ->select('*')
            ->where('id_user', $id_user)
            ->orderBy('id_user','DESC')
            ->first();
        return $query;
    }
    // edit 
    public function edit ($data)
    {
        DB::table('users')
            ->where('id_user',$data['id_user'])
            ->update($data);
    }
    // hapus
    public function hapus ($data)
    {
        DB::table('users')
            ->where('id_user',$data['id_user'])
            ->delete();
    }
}
