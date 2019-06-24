<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Secao extends Model
{
    use SoftDeletes;

    protected $table = 'secoes';

    protected $fillable = ['nome', 'cidade_id'];

    public $timestamps = false;

    protected $dates = ['deleted_at'];

    public function users(){
        return $this->hasMany(User::class);
    }

//    public function laudos(){
//        return $this->hasMany(Laudo::class);
//    }
}
