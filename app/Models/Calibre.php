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
        return $query->where('tipo_arma', $tipo_arma)->get();
    }

    /**
     * Local Scope utilizado para filtrar os calibres
     * de acordo com os tipos de arma em que é utilizado
     *
     * @param $query
     * @param $arma1
     * @param $arma2
     * @return mixed
     */
    public function scopeArmas($query, $arma1, $arma2)
    {
        return $query->where('tipo_arma', $arma1)
            ->orWhere('tipo_arma', $arma2)
            ->get();
//
    }

    /**
     * Local Scope utilizado para filtrar os Calibres
     * cadastrados.
     *
     * Busca todas os calibres validos de determinado tipo de arma
     * e se o calibre cadastrado tiver sido excluído, traz
     * também como resultado (para evitar erro ao editar)
     *
     * OBS: não traz todos os registros excluidos, apenas o que
     * foi excluído e estava em uso.
     *
     * @param $query
     * @param $tipo_arma
     * @param $used_calibre
     * @return mixed
     */
    public function scopeCalibresWithTrashed($query, $tipo_arma, $used_calibre)
    {
        return $query->whereRaw("(nome = '$used_calibre->nome' and tipo_arma = '$tipo_arma') 
        or tipo_arma = '$tipo_arma'")->get();
    }
}
