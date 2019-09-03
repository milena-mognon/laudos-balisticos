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

    public static function config_diretor_info($request){
        $inicio_direcao = formatar_data($request->input('inicio_direcao'));
        $fim_direcao = formatar_data($request->input('fim_direcao'));
        $dados = $request->only(['nome']);
        $datas = ['inicio_direcao' => $inicio_direcao, 'fim_direcao' => $fim_direcao];
        $diretor = array_merge($dados, $datas);
        return $diretor;
    }
}
