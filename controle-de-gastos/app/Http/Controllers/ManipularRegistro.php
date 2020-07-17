<?php

namespace App\Http\Controllers;

use App\Despesa;
use App\DespesaCategoria;
use App\Receita;
use App\ReceitaCategoria;
use App\Reserva;
use App\ReservaCategoria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ManipularRegistro extends Controller
{
    public function salvarReceita(Request $request, int $ano, int $mes)
    {
        $usuario= $request->user();

        $idCategoria= ReceitaCategoria::query()->where('categoria', '=', "$request->categoria")->pluck('id')->all();

        DB::beginTransaction();
        $receita = new Receita();
        $receita->id_user= $usuario->id;
        $receita->id_rec_cat= $idCategoria[0];
        $receita->valor= $request->valor;
        $receita->descricao= $request->descricao;
        $receita->data_referencia= "$ano-$mes-01";
        $receita->save();
        DB::commit();

        return redirect()->back();
    }

    public function salvarDespesa(Request $request, int $ano, int $mes)
    {
        $usuario= $request->user();

        $idCategoria= DespesaCategoria::query()->where('categoria', '=', "$request->categoria")->pluck('id')->all();

        DB::beginTransaction();
        $despesa = new Despesa();
        $despesa->id_user= $usuario->id;
        $despesa->id_des_cat= $idCategoria[0];
        $despesa->valor= $request->valor;
        $despesa->descricao= $request->descricao;
        $despesa->data_referencia= "$ano-$mes-01";
        $despesa->save();
        DB::commit();

        return redirect()->back();
    }

    public function salvarReserva(Request $request, int $ano, int $mes)
    {
        $usuario= $request->user();

        $idCategoria= ReservaCategoria::query()->where('categoria', '=', "$request->categoria")->pluck('id')->all();

        DB::beginTransaction();
        $reserva = new Reserva();
        $reserva->id_user= $usuario->id;
        $reserva->id_res_cat= $idCategoria[0];
        $reserva->valor= $request->valor;
        $reserva->descricao= $request->descricao;
        $reserva->data_referencia= "$ano-$mes-01";
        $reserva->save();
        DB::commit();

        return redirect()->back();
    }

    public function editarReceita(Request $request, int $ano, int $mes, int $id)
    {
        $usuario= $request->user();

        $idCategoria= ReceitaCategoria::query()->where('categoria', '=', "$request->categoria")->pluck('id')->all();

        DB::beginTransaction();
        $receitaEditado = Receita::query()->find("$id");
        $receitaEditado->id_user= $usuario->id;
        $receitaEditado->id_rec_cat= $idCategoria[0];
        $receitaEditado->valor= $request->valor;
        $receitaEditado->descricao= $request->descricao;
        $receitaEditado->save();
        DB::commit();

        return redirect()->back();
    }

    public function editarDespesa(Request $request, int $ano, int $mes, int $id)
    {
        $usuario= $request->user();

        $idCategoria= DespesaCategoria::query()->where('categoria', '=', "$request->categoria")->pluck('id')->all();

        DB::beginTransaction();
        $despesaEditado = Despesa::query()->find("$id");
        $despesaEditado->id_user= $usuario->id;
        $despesaEditado->id_des_cat= $idCategoria[0];
        $despesaEditado->valor= $request->valor;
        $despesaEditado->descricao= $request->descricao;
        $despesaEditado->save();
        DB::commit();

        return redirect()->back();
    }

    public function editarReserva(Request $request, int $ano, int $mes, int $id)
    {
        $usuario= $request->user();

        $idCategoria= ReservaCategoria::query()->where('categoria', '=', "$request->categoria")->pluck('id')->all();

        DB::beginTransaction();
        $reservaEditado = Reserva::query()->find("$id");
        $reservaEditado->id_user= $usuario->id;
        $reservaEditado->id_res_cat= $idCategoria[0];
        $reservaEditado->valor= $request->valor;
        $reservaEditado->descricao= $request->descricao;
        $reservaEditado->save();
        DB::commit();

        return redirect()->back();
    }

    public function apagaReceita(Request $request, int $ano, int $mes, int $id)
    {
        DB::beginTransaction();
        $item= Receita::query()->find("$id");
        Receita::destroy("$id");
        $request->session()->flash('mensagem', "Item $item->descricao excluido das Receitas");
        DB::commit();

        return redirect()->back();
    }

    public function apagaDespesa(Request $request, int $ano, int $mes, int $id)
    {
        DB::beginTransaction();
        $item= Despesa::query()->find("$id");
        Despesa::destroy("$id");
        $request->session()->flash('mensagem', "Item $item->descricao excluido das Despesa");
        DB::commit();

        return redirect()->back();
    }

    public function apagaReserva(Request $request, int $ano, int $mes, int $id)
    {
        DB::beginTransaction();
        $item= Reserva::query()->find("$id");
        Reserva::destroy("$id");
        $request->session()->flash('mensagem', "Item $item->descricao excluido das Reserva");
        DB::commit();

        return redirect()->back();
    }


}
