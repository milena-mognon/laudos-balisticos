<?php

namespace App\Models;

use App\Models\Armas\Revolver;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Arma extends Model
{
    use SoftDeletes;

    protected $table = 'armas';

    protected $fillable = ['tipo_arma', 'marca_id', 'calibre_id', 'origem_id',
        'laudo_id', 'tipo_serie', 'num_serie', 'tambor_rebate', 'capacidade_tambor',
        'sistema_percussao', 'tipo_acabamento', 'estado_geral', 'comprimento_cano',
        'comprimento_total', 'altura', 'quantidade_raias', 'sentido_raias', 'num_lacre',
        'cabo', 'funcionamento'];

    protected $dates = ['deleted_at'];

    public function laudo()
    {
        return $this->belongsTo(Laudo::class);
    }

    /* ->withTrashed() é utilizado para retornar um registro
     *  mesmo que tenha sido deletado.
     * Objetivo é evitar erros quando acessar $arma->marca->nome, por exemplo
     */
    public function marca(){
        return $this->belongsTo(Marca::class)->withTrashed();
    }

    public function calibre(){
        return $this->belongsTo(Calibre::class)->withTrashed();
    }

    public function origem(){
        return $this->belongsTo(Origem::class)->withTrashed();
    }

    public static function arma($arma)
    {
        switch ($arma->tipo_arma) {
            case "Revólver":
                return Revolver::text($arma);
                break;
//            case "Pistola":
//                return Pistola::pistola($arma);
//                break;
//            case "Espingarda":
//                return Espingarda::espingarda($arma);
//                break;
//            case "Garrucha":
//                return Garrucha::garrucha($arma);
//                break;
        }
    }
}
