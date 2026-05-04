<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use App\Models\Pengaturan;

class GuruCon extends Controller
{
    //protected $pengaturan;

    public function __construct()
    {
        //$this->pengaturan = new Pengaturan();
    }

    public function ruangguru()
    {
        $data = [        
        'title'     => 'Ruang Guru',
        ];

        return view('rg-dashboard', compact('data'));
    }
    
}