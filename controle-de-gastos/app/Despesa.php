<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Despesa extends Model
{
    protected $fillable= ['id_user', 'id_cat_des', 'valor', 'descricao', 'data_referencia'];
    public function user()
    {
        return $this->belongsTo(User::class, 'id');
    }

    public function despesaCategoria()
    {
        return $this->belongsTo(DespesaCategoria::class, 'id');
    }
}
