<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use App\Models\Pengaturan;

class SiswaCon extends Controller
{
    //protected $pengaturan;

    public function __construct()
    {
        //$this->pengaturan = new Pengaturan();
    }

    public function index()
    {
        $data = [        
        'title'     => 'Kelola Data Siswa',
        ];

        return view('rg-siswa', compact('data'));
    }
    
}