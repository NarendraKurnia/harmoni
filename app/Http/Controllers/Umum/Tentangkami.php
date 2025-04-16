<?php

namespace App\Http\Controllers\Umum;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Tentangkami extends Controller
{
    public function index()
    {
        return view('tentangkami.index', [
            'title' => 'Tentang Kami'
        ]);
    }
}
