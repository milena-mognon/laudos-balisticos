<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Revolver extends Model
{
    use SoftDeletes;

    protected $table = 'revolveres';

    protected $fillable = ['tipo_arma', 'marca_id', 'calibre_id', 'origem_id',
        'tipo_serie', 'num_serie', 'tambor_rebate', 'capacidade_tambor',
        'sistema_percussao', 'tipo_acabamento', 'estado_geral', 'comprimento_cano',
        'comprimento_total',' altura', 'quantidade_raias', 'sentido_raias', 'num_lacre',
        'cabo', 'ref_image', 'calibre_nominal'];

    protected $dates = ['deleted_at'];
}
