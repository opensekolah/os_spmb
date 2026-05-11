<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Countertransaksi extends Model
{
    protected $table = 'countertransaksi';

    protected $fillable = [
        'last_number'
    ];

    

    public $timestamps = false;
}