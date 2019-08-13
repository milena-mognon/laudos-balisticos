<?php

namespace App\Models;

use App\Scopes\NomeScope;
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

    /**
     * Global scope utilizado para ordenar a busca pelo nome
     */
    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope(new NomeScope());
    }

    /**
     * Local Scope utilizado para filtrar a categoria da Marca
     * (Arma ou Munição)
     *
     * @param $query
     * @param $categoria
     * @return mixed
     */
    public function scopeCategoria($query, $categoria)
    {
        return $query->where('categoria', $categoria)->get();
    }

    /**
     * Local Scope utilizado para filtrar as Marcas
     * cadastradas.
     *
     * Busca todas as marca validas de determinada categoria
     * e se a marca cadastrada tiver sido excluída, traz
     * também como resultado (para evitar erro ao editar)
     *
     * OBS: não traz todos os registros excluidos, apenas o que
     * foi excluído e estava em uso.
     *
     * @param $query
     * @param $categoria
     * @param $used_marca
     * @return mixed
     */
    public function scopeMarcasWithTrashed($query, $categoria, $used_marca)
    {
        return $query->whereRaw("(nome = '$used_marca->nome' and categoria = '$categoria') 
        or categoria = '$categoria'")->get();
    }
}
