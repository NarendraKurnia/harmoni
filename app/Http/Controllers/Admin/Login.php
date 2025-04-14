<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Session;

use App\Models\User_model;

use App\Http\Controllers\Controller;

class Login extends Controller
{
    //Login
    public function index()
    {
        $data = [ 'title'      => 'Login Administrator',
                  'content'    => 'admin/login/index'
                ];
        return view('admin/login/layout',$data);
    }

    // cek login
    public function cek_login(Request $request)
    {
        $m_user     = new User_model();
        $username   = $request->username;
        $password   = $request->password;
        // panggil data user untuk data login
        $user       = $m_user->login($username,$password);
        // cek login
        if($user) {
            $request->session()->put('id_user', $user->id_user);
            $request->session()->put('username', $user->id_user);
            $request->session()->put('nama', $user->nama);
            $request->session()->put('unit_id', $user->unit_id);
            // jika login berhasil
            return redirect('dasbor')->with(['sukses' => 'Anda Berhasil Login']);
        }else{
            // jika login gagal
            return redirect('login')->with(['warning' => 'Username atau Password salah']);
        }
    }

    //lupa_password
    public function lupa_password()
    {
        $data = [ 'title'      => 'Reset Password',
                  'content'    => 'admin/login/lupa_password'
                ];
        return view('admin/login/layout',$data);
    }
    // logout
    public function logout()
    {
        // hapus session
        Session()->forget('id_user');
        Session()->forget('username');
        Session()->forget('nama');
        Session()->forget('unit_id');
        // redirect jika berhasil
        return redirect('login')->with(['sukses' => 'Anda Berhasil logout']);
    }
    
}
