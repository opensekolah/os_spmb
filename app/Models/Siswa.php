<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    protected $table = 'siswa';

    protected $fillable = [
        'nisn',
        'name',
        'no_whatsapp',
        'email',
        'waktu_daftar',
        'status'
    ];

    public $timestamps = false;

    /*public function angkatan()
    {
        return $this->belongsTo(Angkatan::class, 'id_angkatan');
    }*/
}