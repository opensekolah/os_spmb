<?php

namespace App\Http\Controllers;

use App\Models\Angkatan;
use Illuminate\Http\Request;
use App\Models\Pengaturan;
use App\Models\Data_sekolah;
use Illuminate\Support\Facades\Hash;
use App\Models\Guru;
use App\Models\Siswa;

class SambutCon extends Controller
{
    protected $pengaturan;

    public function __construct()
    {
        $this->pengaturan = new Pengaturan();
    }

    public function siswadaftar()
    {
        $data_sekolah = Data_sekolah::first();

        if (!$data_sekolah) {
            return redirect('/install')->with('success', 'Instalasi Website SPMB');
        }

        $data = [
            'data_sekolah' => $data_sekolah,
            'title' => 'SPMB',
            /*'siswa' => $siswa,*/
        ];

        return view('siswadaftar', compact('data'));
    }

    public function install()
    {
        $data = [
            'title' => 'Instalasi Website SPMB',
        ];
        return view('install', compact('data'));
    }

    public function saveinstall(Request $request)
    {
        if (Data_sekolah::exists()) {
            return redirect('/')->with('error', 'Website sudah diinstall');
        }

        $request->validate([
            'nama_sekolah' => 'required',
            'alamat' => 'required',
            'tahun_ajaran' => 'required',
            'no_whatsapp' => 'required',
            'email' => 'required|email',

            'logo_sekolah' => 'required|image|mimes:jpg,jpeg,png',
            'pamflet_sekolah' => 'required|image|mimes:jpg,jpeg,png',

            'name' => 'required',
            'username' => 'required',
            'password' => 'required|confirmed|min:6',
        ]);

        $logoName = null;
        if ($request->hasFile('logo_sekolah')) {
            $file = $request->file('logo_sekolah');
            $logoName = time() . '_logo.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads'), $logoName);
        }

        $pamfletName = null;
        if ($request->hasFile('pamflet_sekolah')) {
            $file = $request->file('pamflet_sekolah');
            $pamfletName = time() . '_pamflet.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads'), $pamfletName);
        }

        Data_sekolah::create([
            'nama_sekolah' => $request->nama_sekolah,
            'alamat' => $request->alamat,
            'tahun_ajaran' => $request->tahun_ajaran,
            'no_whatsapp' => $request->no_whatsapp,
            'email' => $request->email,
            'logo_sekolah' => $logoName,
            'pamflet_sekolah' => $pamfletName,
        ]);

        Guru::create([
            'name' => $request->name,
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'role' => 'admin',
        ]);

        return redirect('/')->with('success', 'Instalasi Berhasil');
    }

    public function masukguru()
    {
        $data_sekolah = Data_sekolah::first();

        if (!$data_sekolah) {
            return redirect('/install')->with('success', 'Instalasi Website SPMB');
        }

        $data = [
            'data_sekolah' => $data_sekolah,
            'title' => 'Masuk Guru',
        ];

        return view('masukguru', compact('data'));
    }

    public function masuksiswa()
    {
        $data_sekolah = Data_sekolah::first();
        $data_siswa = Siswa::all();

        if (!$data_sekolah) {
            return redirect('/install')->with('success', 'Instalasi Website SPMB');
        }

        $data = [
            'data_sekolah' => $data_sekolah,
            'siswa' => $data_siswa,
            'title' => 'Masuk Siswa',
        ];

        return view('masuksiswa', compact('data'));
    }

    public function masuk_kelas(Request $request)
    {
        $request->validate([
            'nisn' => 'required',
        ]);

        session([
            'siswa' => [
                'nisn' => $request->nisn,
            ]
        ]);

        return redirect('/ruangkelas')->with('success', 'Berhasil Masuk Ke Kelas');
    }

    public function keluar()
    {
        session()->flush();
        return redirect('/')->with('success', 'Anda telah keluar');
    }




}