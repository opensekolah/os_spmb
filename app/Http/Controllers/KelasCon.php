<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Siswa;
use App\Models\Identitas_siswa;
use App\Models\Data_sekolah;
use App\Models\Pengaturan;
use App\Models\Acara;
use App\Models\Tagihan;

class KelasCon extends Controller
{
    protected $pengaturan;

    public function __construct()
    {
        $this->pengaturan = new Pengaturan();
    }

    public function oldruangwali(Request $request)
    {
        $siswa = Siswa::with('angkatan')
            ->findOrFail($request->siswa_id);

        // ambil acara terbaru
        $acara = Acara::latest()->first();

        // ambil tagihan berdasarkan siswa + acara terbaru
        $tagihan = Tagihan::where('id_acara', $acara->id)
            ->where('id_siswa', $siswa->id)
            ->get();

        $data = [
            'title' => 'Ruang Wali',
            'banner_image' => $this->pengaturan->where('name', 'banner_image')->value('value'),
            'siswa' => $siswa,
            'tagihan' => $tagihan,
            'acara' => $acara
        ];

        return view('rw-dashboard', compact('data'));
    }

    public function ruangkelas()
    {
        
        $siswa = Siswa::where('nisn', session('siswa.nisn'))->first();
        $data_sekolah = Data_sekolah::first();

        if (!$siswa) {
            return redirect('/')->with('error', 'Silakan daftar dulu');
        }

        $identitas_siswa = Identitas_siswa::where('nisn', $siswa['nisn'])->first();

        $data = [
            'title' => 'Ruang Kelas',
            'data_sekolah' => $data_sekolah,
            'siswa' => $siswa,
            'identitas_siswa' => $identitas_siswa,
        ];

        return view('/ruangkelas', compact('data'));
    }

    public function ruangwali(Request $request)
    {
        $siswa = Siswa::with('angkatan')
            ->findOrFail($request->siswa_id);

        // =========================
        // 1. AMBIL ACARA TERBARU (BISA NULL)
        // =========================
        $acara = Acara::latest()->first();

        // default kosong
        $items = collect();
        $total = 0;

        // =========================
        // 2. JIKA ADA ACARA BARU PROSES TAGIHAN
        // =========================
        if ($acara) {

            $tagihan = Tagihan::where('id_acara', $acara->id)
                ->where('id_siswa', $siswa->id)
                ->get();

            $pembayaran = DB::table('pembayaran')
                ->select('id_siswa', 'infaq_id', DB::raw('SUM(infaq_harga) as total'))
                ->where('id_siswa', $siswa->id)
                ->groupBy('id_siswa', 'infaq_id')
                ->get()
                ->keyBy('infaq_id');

            $items = $tagihan->map(function ($t) use ($pembayaran) {

                $bayar = $pembayaran[$t->infaq_id]->total ?? 0;

                $sisa = $t->infaq_harga - $bayar;

                if ($sisa <= 0)
                    return null;

                return [
                    'infaq_id' => $t->infaq_id,
                    'infaq_name' => $t->infaq_name,
                    'tagihan' => $t->infaq_harga,
                    'bayar' => $bayar,
                    'sisa' => $sisa
                ];
            })->filter()->values();

            $total = $items->sum('sisa');
        }

        $kelas = DB::table('angkatan')
            ->join('kelompok', 'angkatan.id_kelompok', '=', 'kelompok.id')
            ->where('angkatan.id', $siswa->id_angkatan)
            ->select('kelompok.name as nama_kelas')
            ->first();

        $total_dibayar = DB::table('pembayaran')
            ->where('id_siswa', $siswa->id)
            ->sum('infaq_harga');

        // =========================
        // 3. DATA KE VIEW
        // =========================
        $data = [
            'title' => 'Ruang Wali',
            'banner_image' => $this->pengaturan->where('name', 'banner_image')->value('value'),
            'siswa' => $siswa,
            'acara' => $acara,
            'items' => $items,
            'total' => $total,
            'kelas' => $kelas?->nama_kelas ?? '-',
            'total_dibayar' => $total_dibayar,
        ];

        return view('rw-dashboard', compact('data'));
    }



}