<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MataKuliah extends Model
{
    protected $table = 'mata_kuliah';
    public $incrementing = false;
    protected $primaryKey = 'kode_matkul';

    protected $fillable = [
        'kode_matkul',
        'nama_matkul',
        'semester',
        'beban_sks',
        'deskripsi',
        'kode_prodi'
    ];
}
