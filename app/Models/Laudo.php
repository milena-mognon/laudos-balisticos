<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Laudo extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'oficio', 'rep', 'data_designacao', 'data_solicitacao',
        'secao_id', 'cidade_id', 'solicitante_id' ,'perito_id',
        'diretor_id', 'indiciado', 'inquerito', 'tipo_inquerito'
    ];

    protected $dates = ['deleted_at'];

    public function secao()
    {
        return $this->belongsTo(Secao::class);
    }

    public function cidade()
    {
        return $this->belongsTo(Cidade::class);
    }

    public function perito()
    {
        return $this->belongsTo(User::class, 'perito_id', 'id');
    }

    public function diretor()
    {
        return $this->belongsTo(Diretor::class);
    }

    public function solicitante()
    {
        return $this->belongsTo(OrgaoSolicitante::class);
    }

    public function armas()
    {
        return $this->hasMany(Arma::class);
    }

    public function municoes()
    {
        return $this->hasMany(Municao::class);
    }

    // this is a recommended way to declare event handlers
    public static function boot() {
        parent::boot();

        static::deleting(function($laudo) { // before delete() method call this

            $laudo->armas()->delete();
            $laudo->municoes()->delete();
        });
    }

    /**
     * Local Scope utilizado para filtrar somente os laudos de um perito
     *
     * @param $query
     * @param $perito
     * @return mixed
     */
    public function scopeFindMyReps($query, $perito)
    {
        return $query->where('perito_id', $perito)
            ->orderBy('created_at')
            ->paginate(10);
    }

    public static function config_laudo_info($request){
        $data_designacao = formatar_data($request->input('data_designacao'));
        $data_solicitacao = formatar_data($request->input('data_solicitacao'));
        $laudo = $request->except(['data_designacao', 'data_solicitacao']);
        $laudo_info = array_merge($laudo, ['data_solicitacao' => $data_solicitacao, 'data_designacao' => $data_designacao]);
        return $laudo_info;
    }
}
