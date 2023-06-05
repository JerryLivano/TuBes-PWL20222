<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProgramStudi extends Model
{
    protected $table = 'program_studi';

    protected $primaryKey = 'kode_prodi';

    protected $fillable = [
        'kode_prodi',
        'nama_prodi'
    ];
}
