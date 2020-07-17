<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Receita extends Model
{
    protected $fillable= ['id_user', 'id_cat_rec', 'valor', 'descricao', 'data_referencia'];

    public function user()
    {
        return $this->belongsTo(User::class, 'id');
    }

    public function ReceitaCategoria()
    {
        return $this->belongsTo(ReceitaCategoria::class, 'id');
    }
}
