<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Angkatan;
use App\Models\Siswa;
use App\Models\Kelompok;
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
        'angkatan' => Angkatan::with('kelompok')
            ->orderBy('name', 'desc')
            ->get(),
        ];

        return view('rg-siswa', compact('data'));
    }

    public function byAngkatan($id)
    {
        $angkatan = Angkatan::findOrFail($id);

        $siswa = Siswa::where('id_angkatan', $id)->get();

        $data = [
            'title' => 'Data Siswa ' . optional($angkatan->kelompok)->name,
            'siswa' => $siswa,
            'angkatan' => $angkatan
        ];

        return view('rg-siswa-datasiswa', compact('data'));
    }

    /*public function angkatan()
    {
        $data = [        
        'title'     => 'Kelola Data Guru',
        'guru'  => Guru::all(),
        ];

        return view('rg-pengaturan-dataguru', compact('data'));
    }*/

    public function angkatan_tambah()
    {
        $data = [        
        'title'     => 'Kenaikan Kelas & Tambah Kelas Baru',
        'kelompok' => Kelompok::all(),
        ];

        return view('rg-siswa-angkatan-tambah', compact('data'));
    }

    public function angkatan_simpan(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'id_kelompok' => 'required'
        ]);

        Angkatan::create([
            'name' => $request->name,
            'id_kelompok' => $request->id_kelompok
        ]);

        return redirect('/datasiswa')->with('success', 'Angkatan berhasil disimpan');
    }

    public function naikkelas(Request $request)
    {
        $request->validate([
            'name' => 'required'
        ]);

        DB::beginTransaction();

        try {

             
            $ada = Angkatan::whereIn('id_kelompok', [2,3,4])->exists();

            if ($ada) {

               
                Angkatan::where('id_kelompok', 4)->update([
                    'id_kelompok' => 5,
                    'tahun_lulus' => now()
                ]);

                Angkatan::where('id_kelompok', 3)->update(['id_kelompok' => 4]);
                Angkatan::where('id_kelompok', 2)->update(['id_kelompok' => 3]);
            }

            
            Angkatan::create([
                'name' => $request->name,
                'id_kelompok' => 2
            ]);

            DB::commit();

            return redirect('/datasiswa')->with('success', 'Kenaikan kelas berhasil');

        } catch (\Exception $e) {

            DB::rollBack();

            //return redirect()->back()->with('error', 'Gagal proses: ' . $e->getMessage());
            dd($e);
        }
    }

    public function datasiswa_tambah($id)
    {
        $angkatan = Angkatan::find($id);
        $data = [        
        'title'     => 'Tambah Siswa ' . optional($angkatan->kelompok)->name,
        'angkatan'  => $angkatan
        ];

        return view('rg-siswa-datasiswa-tambah', compact('data'));
    }

    public function datasiswa_simpan(Request $request)
    {
        
        $names = $request->name;
        $whatsapps = $request->no_whatsapp;
        $id = $request->id_angkatan;

        if (empty(array_filter($request->name))) {
            return redirect()->route('siswa.angkatan', $id)->with('error', 'Tidak ada data yang diisi');
        }
        

        for ($i = 0; $i < count($names); $i++) {

            // skip kalau kosong
            if (!$names[$i]) continue;

            Siswa::create([
                'name' => $names[$i],
                'no_whatsapp' => $whatsapps[$i],
                'id_angkatan' => $request->id_angkatan
            ]);
        }

        //return redirect()->back()->with('success', 'Data siswa berhasil disimpan');
        return redirect()->route('siswa.angkatan', $id)->with('success', 'Data siswa berhasil disimpan');
    }
    
}