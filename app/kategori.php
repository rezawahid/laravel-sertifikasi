<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class kategori extends Model
{
    //
    protected $fillable = [
        'nama_kategori',
        'keterangan_kategori',
        'status_kategori',
    ];
}
