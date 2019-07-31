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
     * Global scope utilizado para ordenar a busca pelo nome
     */
    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope(new NomeScope());
    }
}
