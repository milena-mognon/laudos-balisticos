<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Municao extends Model
{
    use SoftDeletes;

    protected $fillable = ['marca_id', 'origem_id', 'calibre_id', 'laudo_id', 'estojo',
        'projetil', 'funcionamento', 'quantidade', 'tipo_municao', 'tipo_projetil', 'ref_imagem',
        'nao_deflagrado'];

    protected $table = 'municoes';

    public $timestamps = false;

    protected $dates = ['deleted_at'];

    /* ->withTrashed() é utilizado para retornar um registro
    *  mesmo que tenha sido deletado.
    * Objetivo é evitar erros quando acessar $arma->marca->nome, por exemplo
    */
    public function marca()
    {
        return $this->belongsTo(Marca::class)->withTrashed();
    }

    public function calibre()
    {
        return $this->belongsTo(Calibre::class)->withTrashed();
    }

    public function laudo()
    {
        return $this->belongsTo(Laudo::class);
    }
}
