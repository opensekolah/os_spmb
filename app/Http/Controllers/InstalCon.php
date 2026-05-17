<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Artisan;
use App\Models\Angkatan;
use App\Models\Siswa;
use App\Models\Kelompok;
use App\Models\Tahunajaran;
use App\Models\Infaq;
//use App\Models\Pengaturan;

class InstalCon extends Controller
{


    public function index()
    {
        return view('instal');
    }

    public function install(Request $request)
    {
        // validasi
        $request->validate([
            'db_name' => 'required',
            'db_user' => 'required',
            'db_pass' => 'nullable',
            'school_name' => 'required',
            'admin_email' => 'required|email',
            'admin_password' => 'required|min:6',
        ]);

        // set env
        $this->setEnv([
            'DB_DATABASE' => $request->db_name,
            'DB_USERNAME' => $request->db_user,
            'DB_PASSWORD' => $request->db_pass,
        ]);

        // refresh config
        Artisan::call('config:clear');

        // test koneksi
        try {
            DB::connection()->getPdo();
        } catch (\Exception $e) {
            return back()->with('error', 'Koneksi database gagal');
        }

        // migrate
        Artisan::call('migrate', ['--force' => true]);

        // buat admin
        \App\Models\User::create([
            'name' => 'Admin',
            'email' => $request->admin_email,
            'password' => bcrypt($request->admin_password),
        ]);

        // simpan setting sekolah
        DB::table('settings')->insert([
            'school_name' => $request->school_name,
        ]);

        // tandai selesai
        file_put_contents(storage_path('installed'), 'yes');

        return redirect('/');
    }

    private function setEnv($data)
    {
        $env = file_get_contents(base_path('.env'));

        foreach ($data as $key => $value) {
            $env = preg_replace("/^{$key}=.*/m", "{$key}={$value}", $env);
        }

        file_put_contents(base_path('.env'), $env);
    }

}