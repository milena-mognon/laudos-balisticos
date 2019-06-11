<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Estado extends Model
{
    protected $fillable = ['nome', 'uf'];

    public $timestamps = false;

    public function cidades(){
        return $this->hasMany(Cidade::class);
    }
}
