<?php

namespace App\Models;

use App\Scopes\NomeScope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OrgaoSolicitante extends Model
{
    use SoftDeletes;

    protected $table = 'orgaos_solicitantes';

    protected $fillable = ['nome', 'cidade_id'];

    public $timestamps = false;

    protected $dates = ['deleted_at'];

    public function cidade()
    {
        return $this->belongsTo(Cidade::class);
    }

    /**
     * Global scope utilizado para ordenar a busca pelo nome
     */
    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope(new NomeScope());
    }
}
