<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengaturan;

class SambutCon extends Controller
{
    protected $pengaturan;

    public function __construct()
    {
        $this->pengaturan = new Pengaturan();
    }

    public function masukwali()
    {
        $data = [
        'banner_image' => $this->pengaturan->where('name', 'banner_image')->value('value'),
        'app_name'     => $this->pengaturan->where('name', 'app_name')->value('value'),
        'title'     => 'Masuk Wali Murid',
        ];

        return view('masukwali', compact('data'));
    }

    public function masukguru()
    {
        $data = [
        'banner_image' => $this->pengaturan->where('name', 'banner_image')->value('value'),
        'app_name'     => $this->pengaturan->where('name', 'app_name')->value('value'),
        'title'     => 'Masuk Guru',
        ];

        return view('masukguru', compact('data'));
    }

    
}