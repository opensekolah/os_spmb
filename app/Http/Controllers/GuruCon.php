<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use App\Models\Pengaturan;
use App\Models\Guru;
use App\Models\Data_sekolah;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;

class GuruCon extends Controller
{


    public function ruangguru()
    {
        $data_sekolah = Data_sekolah::first();

        if (!$data_sekolah) {
            return redirect('/install')->with('success', 'Instalasi Website SPMB');
        }

        $data = [
            'data_sekolah' => $data_sekolah,
            'title' => 'Ruang Guru',
        ];

        return redirect('/datasiswabaru');
    }



    public function dataguru()
    {
        $data_sekolah = Data_sekolah::first();

        if (!$data_sekolah) {
            return redirect('/install')->with('success', 'Instalasi Website SPMB');
        }

        $data = [
            'data_sekolah' => $data_sekolah,
            'title' => 'Kelola Data Guru',
            'guru' => Guru::all(),
        ];

        return view('rg-pengaturan-dataguru', compact('data'));
    }

    public function dataguru_tambah()
    {
        $data_sekolah = Data_sekolah::first();

        if (!$data_sekolah) {
            return redirect('/install')->with('success', 'Instalasi Website SPMB');
        }

        $data = [
            'data_sekolah' => $data_sekolah,
            'title' => 'Tambah Guru',
        ];

        return view('rg-pengaturan-dataguru-tambah', compact('data'));
    }

    public function dataguru_simpan(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'username' => 'required',
            'password' => 'required',
        ]);

        Guru::create([
            'name' => $request->name,
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'role' => 'admin'
        ]);

        return redirect('/dataguru')->with('success', 'Data guru berhasil disimpan');
    }

    public function hapus($id)
    {
        Guru::where('id', $id)->delete();

        return redirect('/dataguru')->with('success', 'Data berhasil dihapus');
    }

    public function edit($id)
    {
        $guru = Guru::findOrFail($id);

        $data_sekolah = Data_sekolah::first();

        if (!$data_sekolah) {
            return redirect('/install')->with('success', 'Instalasi Website SPMB');
        }

        $data = [
            'data_sekolah' => $data_sekolah,
            'title' => 'Edit Guru',
            'guru' => $guru
        ];

        return view('rg-pengaturan-dataguru-edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'username' => 'required',
        ]);

        $guru = Guru::findOrFail($id);

        $dataUpdate = [
            'name' => $request->name,
            'username' => $request->username,
        ];

        if ($request->password) {
            $dataUpdate['password'] = Hash::make($request->password);
        }

        $guru->update($dataUpdate);

        return redirect('/dataguru')->with('success', 'Data berhasil diperbarui');
    }

    public function cekmasukguru(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        $user = Guru::where('username', $request->username)->first();

        if (!$user) {
            return back()->with('error', 'Username tidak ditemukan');
        }

        // cek password (decrypt karena kamu pakai encrypt)
        if (!Hash::check($request->password, $user->password)) {
            return back()->with('error', 'Password salah');
        }

        // simpan session login
        session([
            'login' => true,
            'user_id' => $user->id,
            'name' => $user->name,
            'role' => $user->role
        ]);

        $data = [
            'title' => 'Ruang Guru',
        ];

        $role = session('role');

        return redirect('/ruangguru');

        //return redirect('/ruangguru');
        //return view('rg-dashboard', compact('data'))->with('success', 'Selamat Datang');
    }



}