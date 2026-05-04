<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use App\Models\Pengaturan;

class WaliCon extends Controller
{
    //protected $pengaturan;

    public function __construct()
    {
        //$this->pengaturan = new Pengaturan();
    }

    public function ruangwali()
    {
        $data = [        
        'title'     => 'Ruang Wali',
        ];

        return view('rw-dashboard', compact('data'));
    }
    
}