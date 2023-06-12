<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Perwalian extends Model
{
    protected $table = 'perwalian';

    protected $primaryKey = 'id';

    protected $fillable = [
        'id',
        'semester'
    ];
}
