<?php

namespace App\Http\Controllers;

use App\Http\Controllers\help\ConsultaBanco;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DetalhesMes extends Controller
{
    public function index(Request $request, $ano, $mes)
    {
        $usuario= $request->user();
        $consulta= new ConsultaBanco();
        $registros= $consulta->registrosUsuario($request->user(), $mes, $ano);

        $despesaCategorias= DB::table('despesa_categorias')->get();
        $receitaCategorias= DB::table('receita_categorias')->get();
        $reservaCategorias = DB::table('reserva_categorias')->get();

        $descricao = collect(['NULL', 'Janeiro','Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro']);
        $mesDescricao= collect(["$mes"=>"$descricao[$mes]"]);

        return view('detalhes-mes', [
            'usuario'=> $usuario,
            'mesDescricao'=> $mesDescricao,
            'mes'=> $mes,
            'ano'=> $ano,
            'despesas'=> $registros['despesas'],
            'receitas'=> $registros['receitas'],
            'reservas'=> $registros['reservas'],
            'despesaCategorias'=> $despesaCategorias,
            'receitaCategorias'=> $receitaCategorias,
            'reservaCategorias'=> $reservaCategorias
        ]);
    }
}
