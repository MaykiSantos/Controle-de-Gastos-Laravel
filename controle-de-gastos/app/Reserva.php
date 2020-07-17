<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reserva extends Model
{
    protected $fillable= ['id_user', 'id_cat_res', 'valor', 'descricao', 'data_referencia'];
    public function user()
    {
        return $this->belongsTo(User::class, 'id');
    }

    public function ReservaCategoria()
    {
        return $this->belongsTo(ReceitaCategoria::class, 'id');
    }
}
