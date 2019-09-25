<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Componente extends Model
{
    use SoftDeletes;

    protected $table = 'componentes';

    protected $fillable = ['laudo_id', 'quantidade_frascos', 'componente',
        'material_frascos', 'quantidade', 'tamanho'];// 'marca_frasco',

    protected $dates = ['deleted_at'];

    public function laudo()
    {
        return $this->belongsTo(Laudo::class);
    }
}
