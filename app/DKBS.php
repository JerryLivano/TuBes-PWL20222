<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DKBS extends Model
{
    protected $table = 'dkbs';

    protected $primarykey = [
        'kode_matkul',
        'nrp',
        'perwalian_id'
    ];

    protected $fillable = [
        'kode_matkul',
        'nrp',
        'perwalian_id',
        'kelas',
        'hari',
        'jam_awal',
        'jam_akhir',
        'ruangan'
    ];
}
