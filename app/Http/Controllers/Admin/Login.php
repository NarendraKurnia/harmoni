<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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

    //lupa_password
    public function lupa_password()
    {
        $data = [ 'title'      => 'Reset Password',
                  'content'    => 'admin/login/lupa_password'
                ];
        return view('admin/login/layout',$data);
    }
}
