<?php

namespace App\Http\Controllers;

use App\Despesa;
use App\DespesaCategoria;
use App\Http\Controllers\help\ConsultaBanco;
use App\Receita;
use App\ReceitaCategoria;
use App\Reserva;
use App\ReservaCategoria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NovoMes extends Controller
{
    public function index(Request $request)
    {
        $usuario= $request->user();
        $consulta= new ConsultaBanco();
        $registros= $consulta->registrosUsuario($request->user(), 3, 2020);

        $despesaCategorias= DB::table('despesa_categorias')->get();
        $receitaCategorias= DB::table('receita_categorias')->get();
        $reservaCategorias = DB::table('reserva_categorias')->get();


        return view('novo-mes', [
            'usuario'=> $usuario,
            'despesas'=> $registros['despesas'],
            'receitas'=> $registros['receitas'],
            'reservas'=> $registros['reservas'],
            'despesaCategorias'=> $despesaCategorias,
            'receitaCategorias'=> $receitaCategorias,
            'reservaCategorias'=> $reservaCategorias

        ]);
    }
}
