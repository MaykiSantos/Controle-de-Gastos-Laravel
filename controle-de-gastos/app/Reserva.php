<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reserva extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class, 'id');
    }

    public function ReservaCategoria()
    {
        return $this->belongsTo(ReceitaCategoria::class, 'id');
    }
}
