<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Origem extends Model
{
    use SoftDeletes;

    protected $table = 'origens';

    protected $fillable = ['nome', 'fabricacao'];

    public $timestamps = false;

    protected $dates = ['deleted_at'];

    public function arma()
    {
        return $this->belongsTo(Arma::class);
    }
}
