<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MahasiswaMemilikiMatkul extends Model
{
    protected $table = 'mahasiswa_memiliki_matkul';

    protected $fillable = [
        'kode_matkul',
        'nrp'
    ];
}