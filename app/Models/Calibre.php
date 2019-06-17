<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Calibre extends Model
{
    protected $fillable = ['nome', 'tipo_arma'];

    public $timestamps = false;
}
