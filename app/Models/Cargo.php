<?php

namespace App\Models;

use App\Scopes\NomeScope;
use Illuminate\Database\Eloquent\Model;

class Cargo extends Model
{
    protected $fillable = ['nome'];

    public $timestamps = false;

    public function user()
    {
        return $this->hasMany(User::class);
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
