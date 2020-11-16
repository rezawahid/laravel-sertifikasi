<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class penumpang extends Model
{
    //
    protected $fillable = [
        'nik_penumpang',
        'nama_penumpang',
        'alamat_penumpang',
    ];
}
