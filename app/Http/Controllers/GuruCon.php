<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use App\Models\Pengaturan;
use App\Models\Guru;
use Illuminate\Support\Facades\Crypt;

class GuruCon extends Controller
{


    public function ruangguru()
    {
        $data = [
            'title' => 'Ruang Guru',
        ];

        return view('rg-dashboard', compact('data'));
    }



    public function dataguru()
    {
        $data = [
            'title' => 'Kelola Data Guru',
            'guru' => Guru::all(),
        ];

        return view('rg-pengaturan-dataguru', compact('data'));
    }

    public function dataguru_tambah()
    {
        $data = [
            'title' => 'Tambah Guru',
        ];

        return view('rg-pengaturan-dataguru-tambah', compact('data'));
    }

    public function dataguru_simpan(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'username' => 'required|unique:guru,username',
            'password' => 'required',
            'role' => 'required'
        ]);

        Guru::create([
            'name' => $request->name,
            'username' => $request->username,
            'password' => Crypt::encrypt($request->password),
            'role' => $request->role
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

        $data = [
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
            'role' => 'required'
        ]);

        $guru = Guru::findOrFail($id);



        $dataUpdate = [
            'name' => $request->name,
            'username' => $request->username,
            'role' => $request->role
        ];

        if ($request->password) {
            $dataUpdate['password'] = Crypt::encrypt($request->password);
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
        if ($request->password != Crypt::decrypt($user->password)) {
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

        return redirect(
            $role == 'bendahara' ? '/ruangguru' : '/datapembayaran'
        );

        //return redirect('/ruangguru');
        //return view('rg-dashboard', compact('data'))->with('success', 'Selamat Datang');
    }



}