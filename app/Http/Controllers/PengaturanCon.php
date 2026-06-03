<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengaturan;
use App\Models\Data_sekolah;

class PengaturanCon extends Controller
{
    protected $pengaturan;

    public function __construct()
    {
        $this->pengaturan = new Pengaturan();
    }

    public function pengaturan()
    {
        $data_sekolah = Data_sekolah::first();

        $data = [
            'data_sekolah' => $data_sekolah,
            'title' => 'Pengaturan',
        ];

        return view('rg-pengaturan', compact('data'));
    }
    public function ubahpamflet()
    {
        $data_sekolah = Data_sekolah::first();

        $data = [
            'data_sekolah' => $data_sekolah,

            'title' => 'Ubah Pamflet dan Identitas Sekolah',
        ];

        return view('rg-pengaturan-pamflet', compact('data'));
    }


    public function updateBanner(Request $request)
    {
        $request->validate([
            'nama_sekolah' => 'required',
            'alamat' => 'required',
            'tahun_ajaran' => 'required',
            'no_whatsapp' => 'required',
            'email' => 'required|email',
        ]);

        $sekolah = Data_sekolah::first(); // pasti ada

        $sekolah->nama_sekolah = $request->nama_sekolah;
        $sekolah->alamat = $request->alamat;
        $sekolah->tahun_ajaran = $request->tahun_ajaran;
        $sekolah->no_whatsapp = $request->no_whatsapp;
        $sekolah->email = $request->email;

        // ===== LOGO =====
        if ($request->hasFile('logo_sekolah')) {
            $file = $request->file('logo_sekolah');
            $filename = time() . '_logo.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads'), $filename);

            $sekolah->logo_sekolah = $filename;
        }

        // ===== PAMFLET =====
        if ($request->hasFile('pamflet_sekolah')) {
            $file = $request->file('pamflet_sekolah');
            $filename = time() . '_pamflet.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads'), $filename);

            $sekolah->pamflet_sekolah = $filename;
        }

        $sekolah->save();

        return redirect()->back()->with('success', 'Data sekolah berhasil diperbarui');
    }


}