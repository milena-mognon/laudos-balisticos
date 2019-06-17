<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Diretor extends Model
{
    use SoftDeletes;

    protected $table = 'diretores';

    protected $fillable = ['nome', 'inicio_direcao', 'fim_direcao'];

    public $timestamps = false;

    protected $dates = ['deleted_at'];
}
