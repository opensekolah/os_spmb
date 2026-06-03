<?php

namespace App\Exports;

use App\Models\Siswa;
use App\Models\Identitas_siswa;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Maatwebsite\Excel\Events\AfterSheet;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;

class SiswaExport implements FromCollection, WithHeadings, WithEvents, WithColumnFormatting
{
    public function collection()
    {
        $siswa = Siswa::orderBy('name', 'asc')->get();

        $no = 1;

        return $siswa->map(function ($item) use (&$no) {

            $identitas = Identitas_siswa::where('nisn', $item->nisn)->first();

            return [
                $no++,

                // SISWA
                $item->nisn,
                $item->name,
                $item->no_whatsapp,
                $item->email,
                $item->waktu_daftar,
                $item->status,

                // IDENTITAS
                $identitas->jk ?? '',
                $identitas->asal_sekolah ?? '',
                $identitas->nik ?? '',
                $identitas->no_kk ?? '',
                $identitas->tempat_lahir ?? '',
                $identitas->tgl_lahir ?? '',
                $identitas->no_reg_akta ?? '',
                $identitas->agama ?? '',
                $identitas->warganegara ?? '',
                $identitas->kebutuhan_khusus ?? '',
                $identitas->alamat ?? '',
                $identitas->rt ?? '',
                $identitas->rw ?? '',
                $identitas->dusun ?? '',
                $identitas->desa ?? '',
                $identitas->kecamatan ?? '',
                $identitas->kodepos ?? '',
                $identitas->tempat_tinggal ?? '',
                $identitas->moda_transportasi ?? '',
                $identitas->anak_ke ?? '',
                $identitas->punya_kip ?? '',

                // AYAH
                $identitas->nama_ayah ?? '',
                $identitas->nik_ayah ?? '',
                $identitas->tgl_lahir_ayah ?? '',
                $identitas->pendidikan_ayah ?? '',
                $identitas->pekerjaan_ayah ?? '',
                $identitas->penghasilan_ayah ?? '',

                // IBU
                $identitas->nama_ibu ?? '',
                $identitas->nik_ibu ?? '',
                $identitas->tgl_lahir_ibu ?? '',
                $identitas->pendidikan_ibu ?? '',
                $identitas->pekerjaan_ibu ?? '',
                $identitas->penghasilan_ibu ?? '',
            ];
        });
    }

    public function headings(): array
    {
        return [
            'No',
            'NISN',
            'Nama',
            'WhatsApp',
            'Email',
            'Waktu Pendaftaran',
            'Status',

            'JK',
            'Asal Sekolah',
            'NIK',
            'No KK',
            'Tempat Lahir',
            'Tanggal Lahir',
            'No Akta',
            'Agama',
            'Warganegara',
            'Kebutuhan Khusus',
            'Alamat',
            'RT',
            'RW',
            'Dusun',
            'Desa',
            'Kecamatan',
            'Kode Pos',
            'Tempat Tinggal',
            'Moda Transportasi',
            'Anak Ke',
            'Punya KIP',

            'Nama Ayah',
            'NIK Ayah',
            'Tgl Lahir Ayah',
            'Pendidikan Ayah',
            'Pekerjaan Ayah',
            'Penghasilan Ayah',

            'Nama Ibu',
            'NIK Ibu',
            'Tgl Lahir Ibu',
            'Pendidikan Ibu',
            'Pekerjaan Ibu',
            'Penghasilan Ibu',
        ];
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function (AfterSheet $event) {

                // JUDUL
                $event->sheet->setCellValue('A1', 'DATA SISWA BARU');
                $event->sheet->mergeCells('A1:AN1');

                $event->sheet->getStyle('A1')->applyFromArray([
                    'font' => [
                        'bold' => true,
                        'size' => 16,
                    ],
                    'alignment' => [
                        'horizontal' => Alignment::HORIZONTAL_CENTER,
                        'vertical' => Alignment::VERTICAL_CENTER,
                    ],
                ]);

                // HEADER
                $event->sheet->getDelegate()->fromArray(
                    $this->headings(),
                    null,
                    'A2'
                );

                // DATA
                $event->sheet->getDelegate()->fromArray(
                    $this->collection()->toArray(),
                    null,
                    'A3'
                );
            }
        ];
    }

    // NISN jadi TEXT (kolom B)
    public function columnFormats(): array
    {
        return [
            'B' => NumberFormat::FORMAT_TEXT,
        ];
    }
}