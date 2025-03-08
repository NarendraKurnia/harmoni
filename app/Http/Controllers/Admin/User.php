<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User_model;

class User extends Controller
{
    //index
    public function index()
    {
        $m_user       = new User_model();
        $user         = $m_user->listing();

        $data = [ 'title'      => 'Data User Administrator',
                  'user'       => $user,
                  'content'    => 'admin/user/index'
                ];
        return view('admin/layout/wrapper',$data);
    }
}
