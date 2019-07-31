<?php

namespace App\Models;

use App\Scopes\NomeScope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Calibre extends Model
{
    use SoftDeletes;

    protected $fillable = ['nome', 'tipo_arma'];

    public $timestamps = false;

    protected $dates = ['deleted_at'];

    /**
     * Global scope utilizado para ordenar a busca pelo nome
     */
    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope(new NomeScope());
    }

    /**
     * Local Scope utilizado para filtrar os calibres
     * de acordo com o tipo de arma em que é utilizado
     *
     * @param $query
     * @param $tipo_arma
     * @return mixed
     */
    public function scopeArma($query, $tipo_arma)
    {
        return $query->where('tipo_arma', $tipo_arma);
    }
}
