<?php

namespace App\Models;

use App\Models\Componentes\BalinsChumbo;
use App\Models\Componentes\Espoletas;
use App\Models\Componentes\Polvora;
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

    public static function componente($componente)
    {
        switch ($componente->componente) {
            case "Pólvora":
                return Polvora::text($componente);
                break;
            case "Balins de Chumbo":
                return BalinsChumbo::text($componente);
                break;
            case "Espoletas":
                return Espoletas::text($componente);
                break;
        }
    }
}
