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
        $registros= $consulta->registrosUsuario($request->user());

        $despesaCategorias= DB::table('despesa_categorias')->get();
        $receitaCategorias= DB::table('receita_categorias')->get();
        $reservaCategorias = DB::table('reserva_categorias')->get();

        //$itens= Despesa::query()
        //    ->where('id_user', '=', "$usuario->id")
        //    ->join('despesa_categorias', 'despesas.id_des_cat', '=', 'despesa_categorias.id')
        //    ->selectRaw("MONTH(data_referencia) as 'mes'")->groupBy('mes')
        //    ->pluck('mes');
//
        //$itens2= Despesa::query()
        //    ->where('id_user', '=', "$usuario->id")
        //    ->join('despesa_categorias', 'despesas.id_des_cat', '=', 'despesa_categorias.id')
        //    ->selectRaw("YEAR(data_referencia) as 'ano'")->groupBy('ano')
        //    ->pluck('ano');



        //SELECT MONTH(data_referencia) as 'despesas.data_referencia' FROM despesas


        //$itens2= DB::table('despesas')
        //    ->where('id_user', '=', "$usuario->id")
        //    ->join('despesa_categorias', 'despesas.id_des_cat', '=', 'despesa_categorias.id')
        //    ->where(DB::raw("MONTH(data_referencia) as despesas.data_referencia");

        //var_dump($itens);
        //var_dump($itens2);




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
