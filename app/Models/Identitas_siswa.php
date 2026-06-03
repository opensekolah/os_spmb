<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Identitas_siswa extends Model
{
    protected $table = 'identitas_siswa';

    protected $fillable = [
        'nisn',
        'jk',
        'asal_sekolah',
        'nik',
        'no_kk',
        'tempat_lahir',
        'tgl_lahir',
        'no_reg_akta',
        'agama',
        'warganegara',
        'kebutuhan_khusus',
        'alamat',
        'rt',
        'rw',
        'dusun',
        'desa',
        'kecamatan',
        'kodepos',
        'tempat_tinggal',
        'moda_transportasi',
        'anak_ke',
        'punya_kip',
        'nama_ayah',
        'nik_ayah',
        'tgl_lahir_ayah',
        'pendidikan_ayah',
        'pekerjaan_ayah',
        'penghasilan_ayah',
        'nama_ibu',
        'nik_ibu',
        'tgl_lahir_ibu',
        'pendidikan_ibu	',
        'pekerjaan_ibu',
        'penghasilan_ibu'
    ];

    public $timestamps = false;

    /*public function angkatan()
    {
        return $this->belongsTo(Angkatan::class, 'id_angkatan');
    }*/
}