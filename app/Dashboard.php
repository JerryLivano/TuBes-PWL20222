<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dashboard extends Model
{
    protected $table = 'notification';

    protected $fillable = [
        'tgl_waktu',
        'nrp',
        'kode_prodi',
        'keterangan'
    ];
}
