<?php

namespace App\Http\Controllers;

use App\Models\Angkatan;
use Illuminate\Http\Request;
use App\Models\Pengaturan;
use App\Models\Siswa;

class SambutCon extends Controller
{
    protected $pengaturan;

    public function __construct()
    {
        $this->pengaturan = new Pengaturan();
    }

    public function masukwali()
    {
        $kelompok_id = [2, 3, 4];

        $siswa = Siswa::with('angkatan')
            ->whereIn('id_angkatan', function ($query) use ($kelompok_id) {
                $query->select('id')
                    ->from('angkatan')
                    ->whereIn('id_kelompok', $kelompok_id);
            })
            ->get();

        $data = [
            'banner_image' => $this->pengaturan->where('name', 'banner_image')->value('value'),
            'app_name' => $this->pengaturan->where('name', 'app_name')->value('value'),
            'title' => 'Masuk Orang Tua/Wali Murid',
            'siswa' => $siswa,
        ];

        return view('masukwali', compact('data'));
    }

    public function masukguru()
    {
        $data = [
            'banner_image' => $this->pengaturan->where('name', 'banner_image')->value('value'),
            'app_name' => $this->pengaturan->where('name', 'app_name')->value('value'),
            'title' => 'Masuk Guru',
        ];

        return view('masukguru', compact('data'));
    }

    public function keluar()
    {
        session()->flush();
        return redirect('/')->with('success', 'Anda telah keluar');
    }




}