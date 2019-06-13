<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Secao extends Model
{
    protected $table = 'secoes';

    protected $fillable = ['nome', 'cidade_id'];

    public $timestamps = false;
}
