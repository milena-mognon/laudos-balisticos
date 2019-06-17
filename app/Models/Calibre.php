<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Calibre extends Model
{
    use SoftDeletes;

    protected $fillable = ['nome', 'tipo_arma'];

    public $timestamps = false;

    protected $dates = ['deleted_at'];
}
