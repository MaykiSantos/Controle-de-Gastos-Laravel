<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Despesa extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class, 'id');
    }

    public function despesaCategoria()
    {
        return $this->belongsTo(DespesaCategoria::class, 'id');
    }
}
