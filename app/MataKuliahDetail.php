<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MataKuliahDetail extends Model
{
    protected $table = 'matkul_detail';

    protected $primaryKey = 'kode_matkul';

    protected $fillable = [
        'tipe',
        'kelas',
        'kuota',
        'hari',
        'jam_awal',
        'jam_akhir',
        'kode_matkul',
        'kode_ruang'
    ];
}
