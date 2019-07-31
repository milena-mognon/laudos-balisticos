<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Marca extends Model
{
    use SoftDeletes;

    protected $fillable = ['nome', 'categoria'];

    public $timestamps = false;

    protected $dates = ['deleted_at'];

    public function arma()
    {
        return $this->hasMany(Arma::class);
    }
}
