<?php

namespace App\Models;

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

//    public function laudos(){
//        return $this->hasMany(Laudo::class);
//    }
}
