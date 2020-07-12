<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DespesaCategoria extends Model
{
    public function despesa()
    {
        return $this->hasMany(Despesa::class, 'id');
    }
}
