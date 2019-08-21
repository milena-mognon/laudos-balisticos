<?php

namespace App\Models;

use App\Scopes\NomeScope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Diretor extends Model
{
    use SoftDeletes;

    protected $table = 'diretores';

    protected $fillable = ['nome', 'inicio_direcao', 'fim_direcao'];

    public $timestamps = false;

    protected $dates = ['deleted_at'];

    public function laudos(){
        return $this->hasMany(Laudo::class);
    }

    /**
     * Local Scope utilizado para ordenar os diretores
     * pelo inicio da direção
     *
     * @param $query
     * @return mixed
     */
    public function scopeAllOrdered($query)
    {
        return $query->orderBy('inicio_direcao', 'desc')->get();
    }
}
