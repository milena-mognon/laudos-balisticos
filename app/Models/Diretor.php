<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Diretor extends Model
{
    protected $table = 'diretores';

    protected $fillable = ['nome', 'inicio_direcao', 'fim_direcao'];

    public $timestamps = false;
}
