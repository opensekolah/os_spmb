<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Data_sekolah extends Model
{
    protected $table = 'data_sekolah';

    protected $fillable = [
        'nama_sekolah',
        'alamat',
        'tahun_ajaran',
        'no_whatsapp',
        'email',
        'logo_sekolah',
        'pamflet_sekolah'

    ];

    public $timestamps = false;
}