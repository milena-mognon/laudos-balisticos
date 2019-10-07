<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class Laudo extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'oficio', 'rep', 'data_designacao', 'data_solicitacao',
        'secao_id', 'cidade_id', 'solicitante_id', 'perito_id',
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

    public function componentes()
    {
        return $this->hasMany(Componente::class);
    }

    // this is a recommended way to declare event handlers
    public static function boot()
    {
        parent::boot();

        static::deleting(function ($laudo) { // before delete() method call this

            $laudo->armas()->delete();
            $laudo->municoes()->delete();
            $laudo->componentes()->delete();
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

    public static function config_laudo_info($request)
    {
        $data_designacao = formatar_data($request->input('data_designacao'));
        $data_solicitacao = formatar_data($request->input('data_solicitacao'));
        $laudo = $request->except(['data_designacao', 'data_solicitacao']);
        $laudo_info = array_merge($laudo, ['data_solicitacao' => $data_solicitacao, 'data_designacao' => $data_designacao]);
        return $laudo_info;
    }

    /* Relatórios */

    public function scopeCustomReport($query, $filtros)
    {
        $secoes = isset($filtros['secoes_ids']) ? $filtros['secoes_ids'] : [null];
        $peritos = isset($filtros['peritos_ids']) ? $filtros['peritos_ids'] : [null];
        $data_inicial = formatar_data($filtros['data_inicial']);
        $data_final = formatar_data($filtros['data_final']);

        $query->whereBetween(DB::raw('date(created_at)'), [$data_inicial, $data_final]);

        if(isset($filtros['secoes_ids'], $filtros['peritos_ids'])){
            $query->whereIn('perito_id', $peritos)
                ->whereIn('secao_id', $secoes);
        }
        if(isset($filtros['secoes_ids'])) {
            $query->whereIn('secao_id', $secoes);
        }
        if(isset($filtros['peritos_ids'])) {
            $query->whereIn('perito_id', $peritos);
        }
        return $query->get();
    }

    public static function total_laudos_gerados()
    {
        $total = Laudo::all()->count();
        return $total;
    }

    public static function total_laudos_por_perito()
    {
        $group_laudos_peritos = Laudo::all()->groupBy('perito_id');
        $laudos_peritos = [];
        foreach ($group_laudos_peritos as $laudos_perito)
            array_push($laudos_peritos, ['nome' => $laudos_perito->first()->perito->nome,
                'quantidade' => $laudos_perito->count()]);
        return $laudos_peritos;
    }

    public static function total_laudos_por_secao()
    {
        $group_laudos_secoes = Laudo::all()->groupBy('secao_id');
        $laudos_secoes = [];
        foreach ($group_laudos_secoes as $laudos_secao)
            array_push($laudos_secoes, ['nome' => $laudos_secao->first()->secao->nome,
                'quantidade' => $laudos_secao->count()]);
        return $laudos_secoes;
    }

    public static function total_laudos_por_ano()
    {
        $group_laudos_anos = DB::table('laudos')
            ->select(
                DB::raw('count(created_at) as quantidade'),
                DB::raw('YEAR(created_at) as ano'))
            ->groupBy(DB::raw('YEAR(created_at)'))
            ->get();
        $laudos_anos = [];
        foreach ($group_laudos_anos as $laudos_ano)
            array_push($laudos_anos, ['ano' => $laudos_ano->ano,
                'quantidade' => $laudos_ano->quantidade]);
        return $laudos_anos;
    }
}
