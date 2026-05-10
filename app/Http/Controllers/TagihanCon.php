<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Angkatan;
use App\Models\Siswa;
use App\Models\Kelompok;
use App\Models\Tahunajaran;
use App\Models\Infaq;
use App\Models\Acara;
use App\Models\Tagihan;
//use App\Models\Pengaturan;
use Barryvdh\DomPDF\Facade\Pdf;

class TagihanCon extends Controller
{
    //protected $pengaturan;

    public function __construct()
    {
        //$this->pengaturan = new Pengaturan();
    }

    public function index()
    {

        $data = [
            'title' => 'Tagihan',
            'acara' => DB::table('acara')
                ->join('guru', 'acara.id_guru', '=', 'guru.id')
                ->select('acara.*', 'guru.name as nama_guru')
                ->get(),
            /*->orderBy('name', 'desc')
            ->get(),*/
        ];

        return view('rg-tagihan', compact('data'));
    }

    public function byAcara($id)
    {
        //$angkatan = Angkatan::findOrFail($id);
        //$acara = Acara::withCount('siswa')->find($id);

        $acara = Acara::find($id);

        $kelaslist = DB::table('tagihan')
            ->join('kelompok', 'tagihan.id_kelompok', '=', 'kelompok.id')
            ->where('tagihan.id_acara', $acara->id)
            ->select('kelompok.id', 'kelompok.name')
            ->distinct()
            ->get();

        //dd($acara);
        $data = [
            'title' => 'Tagihan ' . $acara->name,
            //'siswa' => $siswa,
            'acara' => $acara,
            'kelaslist' => $kelaslist,
        ];

        return view('rg-tagihan-datatagihan', compact('data'));
    }

    /*public function angkatan()
    {
        $data = [        
        'title'     => 'Kelola Data Guru',
        'guru'  => Guru::all(),
        ];

        return view('rg-pengaturan-dataguru', compact('data'));
    }*/

    public function tagihan_tambah()
    {
        // Ambil tahun ajaran terbaru
        $tahunajaran = Tahunajaran::orderBy('created_at', 'desc')->first();

        // Cegah jika belum ada data
        if (!$tahunajaran) {
            return back()->with('error', 'Belum ada tahun ajaran');
        }

        // Ambil infaq berdasarkan tahun ajaran terbaru
        $infaq = Infaq::where('id_tahunajaran', $tahunajaran->id)->get();
        //$infaq_grouped = $infaq->groupBy('id_kelompok');

        $data = [
            'title' => 'Buat Tagihan',
            'infaq_group' => $infaq->groupBy('id_kelompok'),
            'tahunajaran' => $tahunajaran
        ];

        return view('rg-tagihan-tambah', compact('data'));
    }

    public function tagihan_simpan(Request $request)
    {
        DB::beginTransaction();

        try {

            //dd($request->all());

            $acara_id = DB::table('acara')->insertGetId([
                'name' => $request->name,
                'created_at' => now(),
                'id_guru' => session('user_id'),
            ]);



            $infaqs = DB::table('infaq')
                ->join('tahunajaran', 'infaq.id_tahunajaran', '=', 'tahunajaran.id')
                ->whereIn('infaq.id', $request->id_infaq)
                ->select(
                    'infaq.*',
                    'tahunajaran.name as tahunajaran_name'
                )
                ->get();

            //dd($infaqs);


            foreach ($infaqs as $infaq) {
                //dd($infaq->id_angkatan);

                /*$angkatan = DB::table('angkatan')
                    ->where('id', $infaq->id_angkatan)
                    ->first();*/


                $siswas = DB::table('siswa')
                    ->where('id_angkatan', $infaq->id_angkatan)
                    ->get();
                // dd($siswas);
                if ($siswas->isEmpty()) {
                    continue;
                }

                foreach ($siswas as $siswa) {


                    DB::table('tagihan')->insert([
                        'id_acara' => $acara_id,
                        'id_siswa' => $siswa->id,
                        'id_kelompok' => $infaq->id_kelompok,

                        'tahunajaran_id' => $infaq->id_tahunajaran,
                        'tahunajaran_name' => $infaq->tahunajaran_name,

                        'infaq_id' => $infaq->id,
                        'infaq_name' => $infaq->name,
                        'infaq_harga' => $infaq->harga,

                        'created_at' => now()
                    ]);
                }
            }

            DB::commit();

            return redirect()->back()->with('success', 'Tagihan berhasil dibuat');

        } catch (\Exception $e) {

            DB::rollBack();

            //return redirect()->back()->with('error', $e->getMessage());
            dd($e);
        }
    }



    public function naikkelas(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'tahunajaran_name' => 'required'
        ]);

        DB::beginTransaction();

        try {


            $ada = Angkatan::whereIn('id_kelompok', [2, 3, 4])->exists();

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

            /*Tahunajaran::create([
                'name' => $request->tahunajaran_name,
            ]);*/
            $tahun = Tahunajaran::create([
                'name' => $request->tahunajaran_name,
            ]);

            $id_tahun = $tahun->id;

            $bulan = [
                '01 Infaq Juli',
                '02 Infaq Agustus',
                '03 Infaq September',
                '04 Infaq Oktober',
                '05 Infaq November',
                '06 Infaq Desember',
                '07 Infaq Januari',
                '08 Infaq Februari',
                '09 Infaq Maret',
                '10 Infaq April',
                '11 Infaq Mei',
                '12 Infaq Juni',
            ];

            $kelases = [2, 3, 4]; // 7,8,9

            foreach ($kelases as $kls) {

                $angkatan = Angkatan::where('id_kelompok', $kls)->first();
                if (!$angkatan)
                    continue;

                //  1. Infaq bulanan
                foreach ($bulan as $nama) {
                    Infaq::create([
                        'name' => $nama,
                        'id_tahunajaran' => $id_tahun,
                        'id_kelompok' => $kls,
                        'id_angkatan' => $angkatan->id,
                        'harga' => 50000
                    ]);
                }

                //  2. Umum semua kelas
                $umum = [
                    ['Pemeliharaan Sarpras', 250000],
                    ['Ekstrakurikuler', 150000],
                    ['ASTS 1', 50000],
                    ['ASAS 1', 50000],
                    ['ASAT', 50000],
                ];

                foreach ($umum as $u) {
                    Infaq::create([
                        'name' => $u[0],
                        'id_tahunajaran' => $id_tahun,
                        'id_kelompok' => $kls,
                        'id_angkatan' => $angkatan->id,
                        'harga' => $u[1]
                    ]);
                }

                //  3. Kelas 7 & 8
                if (in_array($kls, [2, 3])) {
                    Infaq::create([
                        'name' => 'ASTS 2',
                        'id_tahunajaran' => $id_tahun,
                        'id_kelompok' => $kls,
                        'id_angkatan' => $angkatan->id,
                        'harga' => 50000
                    ]);
                }

                //  4. Kelas 7 saja
                if ($kls == 2) {
                    $kelas7 = [
                        ['Atribut', 80000],
                        ['Sampul Raport', 50000],
                        ['Kaos Olahraga', 40000],
                    ];

                    foreach ($kelas7 as $k7) {
                        Infaq::create([
                            'name' => $k7[0],
                            'id_tahunajaran' => $id_tahun,
                            'id_kelompok' => $kls,
                            'id_angkatan' => $angkatan->id,
                            'harga' => $k7[1]
                        ]);
                    }
                }

                //  5. Kelas 8 saja
                if ($kls == 3) {
                    Infaq::create([
                        'name' => 'Asesmen Nasional',
                        'id_tahunajaran' => $id_tahun,
                        'id_kelompok' => $kls,
                        'id_angkatan' => $angkatan->id,
                        'harga' => 200000
                    ]);
                }

                //  6. Kelas 9 saja
                if ($kls == 4) {
                    Infaq::create([
                        'name' => 'ASAJ',
                        'id_tahunajaran' => $id_tahun,
                        'id_kelompok' => $kls,
                        'id_angkatan' => $angkatan->id,
                        'harga' => 600000
                    ]);
                }
            }

            DB::commit();

            return redirect('/datasiswa')->with('success', 'Kenaikan kelas dan Tahun Ajaran Baru berhasil dibuat');

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
            'title' => 'Tambah Siswa ' . optional($angkatan->kelompok)->name,
            'angkatan' => $angkatan
        ];

        return view('rg-siswa-datasiswa-tambah', compact('data'));
    }

    public function datasiswa_simpan(Request $request)
    {
        $names = $request->name;
        $whatsapps = $request->no_whatsapp;
        $id = $request->id_angkatan;

        if (empty(array_filter($names))) {
            return redirect()->route('siswa.angkatan', $id)
                ->with('error', 'Tidak ada data yang diisi');
        }

        for ($i = 0; $i < count($names); $i++) {

            $nama = trim($names[$i] ?? '');
            $wa = trim($whatsapps[$i] ?? '');

            if (($nama && !$wa) || (!$nama && $wa)) {
                return back()
                    ->withInput()
                    ->with('error', 'Nama dan No Whatsapp harus diisi bersamaan (cek baris ke-' . ($i + 1) . ')');
            }
        }

        $jumlah = 0;

        for ($i = 0; $i < count($names); $i++) {

            $nama = trim($names[$i] ?? '');
            $wa = trim($whatsapps[$i] ?? '');

            if (!$nama && !$wa)
                continue;

            Siswa::create([
                'name' => $nama,
                'no_whatsapp' => $wa,
                'id_angkatan' => $id
            ]);

            $jumlah++;
        }

        return redirect()->route('siswa.angkatan', $id)
            ->with('success', 'Berhasil menyimpan ' . $jumlah . ' data siswa');
    }

    public function hapus($id)
    {
        Siswa::where('id', $id)->delete();

        return redirect()->back()->with('success', 'Data berhasil dihapus');
    }

    public function edit($id)
    {
        $siswa = Siswa::findOrFail($id);

        $data = [
            'title' => 'Edit Siswa',
            'siswa' => $siswa
        ];

        return view('rg-siswa-datasiswa-edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'no_whatsapp' => 'required',
            //'role' => 'required'
        ]);

        $siswa = Siswa::findOrFail($id);
        $id = $request->id_angkatan;

        $dataUpdate = [
            'name' => $request->name,
            'no_whatsapp' => $request->no_whatsapp,
            //'role' => $request->role
        ];

        $siswa->update($dataUpdate);

        //return redirect('/dataguru')->with('success', 'Data berhasil diperbarui');
        return redirect()->route('siswa.angkatan', $id)->with('success', 'Data berhasil diperbarui');
    }

    /*public function pdf($acara)
    {
        /*$data = DB::table('tagihan')
            ->join('siswa', 'tagihan.id_siswa', '=', 'siswa.id')
            ->where('tagihan.id_acara', $acara)
            ->select(
                'tagihan.*',
                'siswa.name as nama_siswa'
            )
            ->get();*/
    // dd($data);

    /*$data = DB::table('tagihan')
        ->join('siswa', 'tagihan.id_siswa', '=', 'siswa.id')
        ->where('tagihan.id_acara', $acara)
        ->select(
            'tagihan.*',
            'siswa.name as nama_siswa'
        )
        ->get()
        ->groupBy('id_siswa');*/

    /*$data = DB::table('tagihan')
        ->join('siswa', 'tagihan.id_siswa', '=', 'siswa.id')
        ->where('tagihan.id_acara', $acara)
        ->select(
            'tagihan.*',
            'siswa.name as nama_siswa'
        )
        ->get()
        ->groupBy('id_kelompok');-----

    $tagihan = DB::table('tagihan')
        ->join('siswa', 'tagihan.id_siswa', '=', 'siswa.id')
        ->where('tagihan.id_acara', $acara)
        ->select(
            'tagihan.*',
            'siswa.name as nama_siswa'
        )
        ->get()
        ->groupBy('id_kelompok')
        ->map(function ($kelasGroup) {
            return $kelasGroup->groupBy('id_siswa');
        });

    $data = [
        'title' => 'Tagihan',
        'tagihan' => $tagihan,

    ];

    //return view('pdf.tagihan', compact('data', 'acara'));
    return view('rg-tagihan-datatagihan', compact('data', 'acara'));
}*/

    public function pdf($acara, $kelas)
    {
        //dd($acara);
        $acaraname = Acara::find($acara);
        $kelasname = Kelompok::find($kelas);
        $tagihan = DB::table('tagihan')
            ->join('siswa', 'tagihan.id_siswa', '=', 'siswa.id')
            ->where('tagihan.id_acara', $acara)
            ->where('tagihan.id_kelompok', $kelas)
            ->select(
                'tagihan.*',
                'siswa.name as nama_siswa'
            )
            ->get()
            ->groupBy('id_kelompok')
            ->map(function ($kelasGroup) {
                return $kelasGroup->groupBy('id_siswa');
            });

        $data = [
            'title' => 'Tagihan',
            'tagihan' => $tagihan,
            'acaraname' => $acaraname->name,
            'kelasname' => $kelasname->name,
        ];

        //return view('pdf.tagihan', compact('data', 'acara', 'kelas'));
        //$pdf = Pdf::loadView('pdf.tagihan', $data);
        $pdf = Pdf::loadView('pdf.tagihan', compact('data', 'acara', 'kelas'));

        //return $pdf->stream('tagihan.pdf');
        return $pdf->download('Tagihan_' . $data['acaraname'] . '_' . $data['kelasname'] . '.pdf');
    }

}