<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengaturan;

class PengaturanCon extends Controller
{
    protected $pengaturan;

    public function __construct()
    {
        $this->pengaturan = new Pengaturan();
    }

    public function pengaturan()
    {
        $data = [
            'banner_image' => $this->pengaturan->where('name', 'banner_image')->value('value'),
            'title'=> 'Pengaturan',
        ];

        return view('rg-pengaturan', compact('data'));
    }
    public function ubahpamflet()
    {
        $data = [
            'banner_image' => $this->pengaturan->where('name', 'banner_image')->value('value'),
            'title'=> 'Ubah Pamflet',
        ];

        return view('rg-pengaturan-pamflet', compact('data'));
    }


    public function updateBanner(Request $request)
    {
        $request->validate([
            'banner' => 'required|image|mimes:jpg,jpeg,png,webp',
        ]);

        if ($request->hasFile('banner')) {
            $file = $request->file('banner');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads'), $filename);

            $this->pengaturan->where('name', 'banner_image')
                ->update(['value' => $filename]);
        }

        return redirect()->back();
    }

    
}