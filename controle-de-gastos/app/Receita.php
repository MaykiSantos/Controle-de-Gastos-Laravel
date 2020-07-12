<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Receita extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class, 'id');
    }

    public function ReceitaCategoria()
    {
        return $this->belongsTo(ReceitaCategoria::class, 'id');
    }
}
