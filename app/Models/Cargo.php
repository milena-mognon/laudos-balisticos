<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cargo extends Model
{
    protected $fillable = ['nome'];

    public $timestamps = false;

    public function user()
    {
        return $this->hasMany(User::class);
    }
}
