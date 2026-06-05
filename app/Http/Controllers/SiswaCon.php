<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Angkatan;
use App\Models\Siswa;
use App\Models\Data_sekolah;
use App\Models\Identitas_siswa;
use App\Models\Kelompok;
use App\Models\Tahunajaran;
use App\Models\Infaq;
//use App\Models\Pengaturan;
use App\Exports\SiswaExport;
use Maatwebsite\Excel\Facades\Excel;

class SiswaCon extends Controller
{


    public function index()
    {


        $siswa = Siswa::all();

        $data_sekolah = Data_sekolah::first();

        if (!$data_sekolah) {
            return redirect('/install')->with('success', 'Instalasi Website SPMB');
        }

        $data = [
            'total' => Identitas_siswa::count(),
            'laki' => Identitas_siswa::where('jk', 'L')->count(),
            'perempuan' => Identitas_siswa::where('jk', 'P')->count(),
            'data_sekolah' => $data_sekolah,
            'title' => 'Dashboard',
            'siswa' => $siswa,
        ];

        return view('rg-siswa-datasiswa', compact('data'));
    }

    public function siswa_daftar(Request $request)
    {
        $request->validate([
            'nisn' => 'required',
            'name' => 'required',
            'no_whatsapp' => 'required',
            'email' => 'required|email',
        ]);

        $siswa = Siswa::create([
            'nisn' => $request->nisn,
            'name' => $request->name,
            'no_whatsapp' => $request->no_whatsapp,
            'email' => $request->email,
            'status' => 'Calon Murid',
        ]);

        Identitas_siswa::create([
            'nisn' => $request->nisn,
        ]);



        session([
            'siswa' => [
                'nisn' => $siswa->nisn,
            ]
        ]);

        return redirect('/ruangkelas')->with('success', 'Pendaftaran Berhasil');
    }

    public function siswa_identitas(Request $request)
    {
        $request->validate([
            'nisn' => 'required',
            'name' => 'required',
        ]);

        $nisn_asli = $request->nisn_asli;
        $nisn_baru = $request->nisn;

        // cek data
        $siswa = Siswa::where('nisn', $nisn_asli)->first();
        if (!$siswa) {
            return redirect()->back()->with('error', 'Data tidak ditemukan, tidak bisa update siswa');
        }

        $siswa->update([
            'nisn' => $request->nisn,
            'name' => $request->name,
            'no_whatsapp' => $request->no_whatsapp,
            'email' => $request->email,
        ]);
        session([
            'siswa' => [
                'nisn' => $siswa->nisn
            ]
        ]);

        $identitas_siswa = Identitas_siswa::where('nisn', $nisn_baru)->first();

        if (!$identitas_siswa) {
            return redirect()->back()->with('error', 'Data tidak ditemukan, tidak bisa update identitas');
        }

        // update data
        $identitas_siswa->update([
            'nisn' => $request->nisn,
            'jk' => $request->jk,
            'asal_sekolah' => $request->asal_sekolah,
            'nik' => $request->nik,
            'no_kk' => $request->no_kk,
            'tempat_lahir' => $request->tempat_lahir,
            'tgl_lahir' => $request->tgl_lahir,
            'no_reg_akta' => $request->no_reg_akta,
            'agama' => $request->agama,
            'warganegara' => $request->warganegara,
            'kebutuhan_khusus' => $request->kebutuhan_khusus,
            'alamat' => $request->alamat,
            'rt' => $request->rt,
            'rw' => $request->rw,
            'dusun' => $request->dusun,
            'desa' => $request->desa,
            'kecamatan' => $request->kecamatan,
            'kodepos' => $request->kodepos,
            'tempat_tinggal' => $request->tempat_tinggal,
            'moda_transportasi' => $request->moda_transportasi,
            'anak_ke' => $request->anak_ke,
            'punya_kip' => $request->punya_kip,

            // ayah
            'nama_ayah' => $request->nama_ayah,
            'nik_ayah' => $request->nik_ayah,
            'tgl_lahir_ayah' => $request->tgl_lahir_ayah,
            'pendidikan_ayah' => $request->pendidikan_ayah,
            'pekerjaan_ayah' => $request->pekerjaan_ayah,
            'penghasilan_ayah' => $request->penghasilan_ayah,

            // ibu
            'nama_ibu' => $request->nama_ibu,
            'nik_ibu' => $request->nik_ibu,
            'tgl_lahir_ibu' => $request->tgl_lahir_ibu,
            'pendidikan_ibu' => $request->pendidikan_ibu,
            'pekerjaan_ibu' => $request->pekerjaan_ibu,
            'penghasilan_ibu' => $request->penghasilan_ibu,
        ]);

        //pesan kesan
        $penulis = $request->penulis;
        $konten = $request->konten;

        if (!empty($konten)) {

            try {

                $data = [
                    'penulis' => $penulis,
                    'konten' => $konten
                ];

                //dd($data);

                $ch = curl_init();

                curl_setopt_array($ch, [
                    CURLOPT_URL => "https://smpmaarifnuwanareja.sch.id/api/apipesankesan",
                    CURLOPT_POST => true,
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_TIMEOUT => 5,
                    CURLOPT_HTTPHEADER => [
                        'Content-Type: application/json'
                    ],
                    CURLOPT_POSTFIELDS => json_encode($data),
                ]);

                $response = curl_exec($ch);

                if ($response === false) {
                    dd('CURL ERROR: ' . curl_error($ch));
                }

                $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

                

                // ❗ paksa jadi exception kalau error
                if (curl_errno($ch)) {
                    throw new \Exception(curl_error($ch));
                }

                curl_close($ch);

            } catch (\Exception $e) {

                // ini yang kamu mau
                $error = $e->getMessage();

                // optional: bisa kamu pakai / simpan
                // echo $error;
                // file_put_contents(...);

            }
        }
        ;

        //return redirect()->back()->with('success', 'Formulir berhasil disimpan');

        return redirect('/ruangkelas')->with('success', 'Formulir berhasil disimpan');

        //return redirect('/ruangkelas')->with('success', $response);
    }
    public function terima($id)
    {
        $siswa = Siswa::find($id);

        if (!$siswa) {
            return back()->with('error', 'Data siswa tidak ditemukan');
        }

        $siswa->update([
            'status' => 'Diterima'
        ]);

        return back()->with('success', 'Siswa berhasil diterima');
    }

    public function tolak($id)
    {
        $siswa = Siswa::find($id);

        if (!$siswa) {
            return back()->with('error', 'Data siswa tidak ditemukan');
        }

        $siswa->update([
            'status' => 'Calon Murid'
        ]);

        return back()->with('success', 'Siswa dikembalikan ke calon murid');
    }

    public function exportExcel()
    {
        return Excel::download(new SiswaExport, 'Data-Siswa-Baru.xlsx');
    }

    public function apisiswa()
    {
        $siswa = Siswa::selectRaw('UPPER(name) as name, UPPER(no_whatsapp) as no_whatsapp')
            ->orderBy('name', 'asc')
            ->get();

        return response()->json([
            'status' => true,
            'data' => $siswa
        ]);
    }











    public function byAngkatan($id)
    {
        //$angkatan = Angkatan::findOrFail($id);
        $angkatan = Angkatan::withCount('siswa')->find($id);

        $siswa = Siswa::where('id_angkatan', $id)->get();

        $data = [
            'title' => 'Data Siswa ' . optional($angkatan->kelompok)->name,
            'siswa' => $siswa,
            'angkatan' => $angkatan
        ];

        return view('rg-siswa-datasiswa', compact('data'));
    }


    public function angkatan_tambah()
    {
        $data = [
            'title' => 'Kenaikan Kelas & Tahun Ajaran Baru',
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

}