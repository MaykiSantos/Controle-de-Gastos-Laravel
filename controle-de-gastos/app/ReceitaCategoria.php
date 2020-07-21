<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReceitaCategoria extends Model
{
    protected $fillable= ['categoria'];

    public function receita()
    {
        return $this->hasMany(Receita::class, 'id');
    }
}
