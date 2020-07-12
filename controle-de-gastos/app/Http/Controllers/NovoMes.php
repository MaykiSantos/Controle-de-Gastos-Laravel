<?php

namespace App\Http\Controllers;

use App\Despesa;
use App\Receita;
use App\Reserva;
use Illuminate\Http\Request;

class NovoMes extends Controller
{
    public function index(Request $request)
    {
        $usuario= $request->user();
        $despesas= Despesa::query()
            ->where('id_user', '=', "$usuario->id")
            ->join('despesa-categorias', 'despesas.id_des_cat', '=', 'despesa-categorias.id')
            ->get();
        $receitas= Receita::query()
            ->where('id_user', '=', "$usuario->id")
            ->join('receita-categorias', 'receitas.id_rec_cat', '=', 'receita-categorias.id')
            ->get();
        $reservas= Reserva::query()
            ->where('id_user', '=', "$usuario->id")
            ->join('reserva-categorias', 'reservas.id_res_cat', '=', 'reserva-categorias.id')
            ->get();
        return view('novo-mes', [
            'usuario'=> $usuario,
            'despesas'=> $despesas,
            'receitas'=> $receitas,
            'reservas'=> $reservas
        ]);
    }
}
