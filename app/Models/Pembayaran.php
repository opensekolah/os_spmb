<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    protected $table = 'pembayaran';

    protected $fillable = [
        'tanggal_pembayaran',
        'id_angkatan',
        'id_siswa',
        'infaq_id',
        'infaq_name',
        'infaq_harga',
        'id_guru',
        'id_jenisbayar'
    ];

    public $timestamps = false;
}