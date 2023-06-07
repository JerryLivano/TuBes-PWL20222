<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ruangan extends Model
{
    protected $table = 'ruangan';

    protected $primaryKey = 'kode_ruang';

    protected $fillable = [
        'kode_ruang',
        'nama_ruang'
    ];
}
