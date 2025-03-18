<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
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
    // tambah
    public function tambah()
    {
        $m_user       = new User_model();
        
        $data = [ 'title'      => 'Tambah Data User Administrator',
                  'content'    => 'admin/user/tambah'
                ];
        return view('admin/layout/wrapper',$data);
    }

    // proses_tambah
    public function proses_tambah(Request $request)

    {
        $m_user     = new User_model();
        request()->validate([
                            'username'      => 'required|unique:users',
					        'email'         => 'required|unique:users',
					        'nama'          => 'required',
                            'password'      => 'required',
                                    ]);
        // proses data input
        $data   = [     'nama'          => $request->nama,
                        'email'	        => $request->email,
                        'username'   	=> $request->username,
                        'password'      => sha1($request->password),
                        'akses_level'  	=> $request->akses_level,

                    ];
        $m_user->tambah($data);
        // end proses
        return redirect('user')->with(['sukses' => 'Data Telah Ditambah']);
    }
    // edit
    public function edit($id_user)
    {
        $m_user       = new User_model();
        $user         = $m_user->detail($id_user);
        
        $data = [ 'title'      => 'Edit User Administrator',
                  'user'       => $user,
                  'content'    => 'admin/user/edit'
                ];
        return view('admin/layout/wrapper',$data);
    }

     // proses_edit
     public function proses_edit(Request $request)

    {
         $m_user     = new User_model();
         request()->validate([
                             'username'      => 'required',
                             'email'         => 'required',
                             'nama'          => 'required',
                                     ]);
         // proses data input
         $password      = $request->password;
        //  cek panjang pendek password
        if(strlen($password) >= 6 && strlen($password) <= 32) {
            $data   = [  'id_user'       => $request->id_user,
                         'nama'          => $request->nama,
                         'email'	     => $request->email,
                         'username'   	 => $request->username,
                         'password'      => sha1($request->password),
                         'akses_level'   => $request->akses_level,
 
                     ];

        }else{   
            // tidak ganti password
            $data   = [  'id_user'       => $request->id_user,
                         'nama'          => $request->nama,
                         'email'	     => $request->email,
                         'username'   	 => $request->username,
                         'akses_level'   => $request->akses_level,
 
                     ];

        }
         $m_user->edit($data);
         // end proses
         return redirect('user')->with(['sukses' => 'Data Telah Diedit']);
    }
     //  delete
     public function delete($id_user)
    {
         $m_user = new User_model();
         $data = ['id_user' => $id_user];
         $m_user->hapus($data);   
          
         return redirect('user')->with(['sukses' => 'Data Telah Dihapus']);
    }
     
}
