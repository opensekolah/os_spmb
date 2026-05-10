<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Acara extends Model
{
    protected $table = 'acara';

    protected $fillable = [
        'name',
        'id_guru',
        'created_at'
    ];

    

    public $timestamps = false;
}