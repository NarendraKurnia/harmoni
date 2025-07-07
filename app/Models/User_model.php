<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\CanResetPassword;
use Illuminate\Auth\Passwords\CanResetPassword as CanResetPasswordTrait;
use Illuminate\Support\Facades\DB;

class User_model extends Authenticatable implements CanResetPassword
{
    use Notifiable, CanResetPasswordTrait;

    protected $table = 'users';

    protected $primaryKey = 'id_user';

    protected $fillable = [
        'nama', 'email', 'username', 'password', 'unit_id'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    // Relasi ke Unit
    public function unit()
    {
        return $this->belongsTo(Unit::class, 'unit_id', 'id_unit'); 
    }

    // listing
    public function listing()
    {
        return DB::table($this->table)
            ->select('*')
            ->orderBy('id_user','DESC')
            ->get();
    }

    // tambah
    public function tambah ($data)
    {
        DB::table($this->table)->insert($data);
    }

    // detail
    public function detail($id_user)
    {
        return DB::table($this->table)
            ->select('*')
            ->where('id_user', $id_user)
            ->orderBy('id_user','DESC')
            ->first();
    }

    // login manual
    public function login($username, $password)
    {
        return DB::table($this->table)
            ->select('id_user', 'username', 'nama', 'unit_id', 'password')
            ->where('username', $username)
            ->where('password', sha1($password)) // sebaiknya pakai bcrypt()
            ->first();
    }

    // edit
    public function edit ($data)
    {
        DB::table($this->table)
            ->where('id_user', $data['id_user'])
            ->update($data);
    }

    // hapus
    public function hapus ($data)
    {
        DB::table($this->table)
            ->where('id_user', $data['id_user'])
            ->delete();
    }
}
