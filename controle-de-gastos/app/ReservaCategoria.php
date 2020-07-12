<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReservaCategoria extends Model
{
    public function reserva()
    {
        return $this->hasMany(Reserva::class, 'id');
    }
}
