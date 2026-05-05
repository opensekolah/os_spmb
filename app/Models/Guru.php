<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    protected $table = 'guru';

    protected $fillable = [
        'name',
        'username',
        'password',
        'role'
    ];

    protected $hidden = [
        'password'
    ];

    public $timestamps = false;
}