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
}
