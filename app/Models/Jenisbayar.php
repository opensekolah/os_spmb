<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Jenisbayar extends Model
{
    protected $table = 'jenisbayar';

    protected $fillable = [
        'name'
    ];

    public $timestamps = false;
}