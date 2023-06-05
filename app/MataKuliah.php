<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MataKuliah extends Model
{
    protected $table = 'mata_kuliah';

    protected $primaryKey = 'kode_matkul';

    protected $fillable = [
        'kode_matkul',
        'nama_matkul',
        'semester',
        'beban_sks',
        'hari',
        'jam_awal',
        'jam_akhir',
        'ruangan',
        'kuota',
        'kode_prodi'
    ];
}
