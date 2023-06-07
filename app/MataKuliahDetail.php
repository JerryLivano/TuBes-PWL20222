<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MataKuliahDetail extends Model
{
    protected $table = 'matkul_detail';

    protected $primaryKey = 'kode_matkul';

    protected $fillable = [
        'tipe',
        'kuota',
        'beban_sks',
        'hari',
        'jam',
        'kode_matkul',
        'kode_ruang'
    ];
}
