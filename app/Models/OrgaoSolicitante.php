<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrgaoSolicitante extends Model
{
    protected $table = 'orgaos_solicitantes';

    protected $fillable = ['nome', 'cidade_id'];

    public $timestamps = false;

    public function cidade()
    {
        return $this->belongsTo(Cidade::class);
    }
}
