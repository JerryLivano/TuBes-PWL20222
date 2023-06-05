<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    protected $table = 'mahasiswa';

    protected $primaryKey = 'nrp';

    protected $fillable = [
        'nrp',
        'nama',
        'alamat',
        'gender',
        'tanggal_lahir',
        'profile',
        'kode_prodi'
    ];
}