<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    protected $table = 'siswa';

    protected $fillable = [
        'name',
        'id_angkatan',
        'no_whatsapp',
    ];

    public $timestamps = false;

    public function angkatan()
    {
        return $this->belongsTo(Angkatan::class, 'id_angkatan');
    }
}