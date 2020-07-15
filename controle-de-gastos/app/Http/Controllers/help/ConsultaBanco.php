<?php


namespace App\Http\Controllers\help;


use App\Despesa;
use App\Http\Controllers\Controller;
use App\Receita;
use App\Reserva;
use App\User;
use Illuminate\Support\Facades\DB;
use phpDocumentor\Reflection\Types\Collection;

class ConsultaBanco extends Controller
{

    public function registrosUsuario(User $usuario)
    {
        $despesas= Despesa::query()
            ->where('id_user', '=', "$usuario->id")
            ->join('despesa_categorias', 'despesas.id_des_cat', '=', 'despesa_categorias.id')
            ->get();
        $receitas= Receita::query()
            ->where('id_user', '=', "$usuario->id")
            ->join('receita_categorias', 'receitas.id_rec_cat', '=', 'receita_categorias.id')
            ->get();
        $reservas= Reserva::query()
            ->where('id_user', '=', "$usuario->id")
            ->join('reserva_categorias', 'reservas.id_res_cat', '=', 'reserva_categorias.id')
            ->get();

        return [
            'despesas'=>$despesas,
            'receitas'=> $receitas,
            'reservas'=> $reservas
        ];
    }

    public function registroAnos(User $usuario)
    {
        $anosDespesas= Despesa::query()
            ->where('id_user', '=', "$usuario->id")
            ->join('despesa_categorias', 'despesas.id_des_cat', '=', 'despesa_categorias.id')
            ->selectRaw("YEAR(data_referencia) as 'ano'")->groupBy('ano')
            ->pluck('ano');

        $anosReceita= Receita::query()
            ->where('id_user', '=', "$usuario->id")
            ->join('receita_categorias', 'receitas.id_rec_cat', '=', 'receita_categorias.id')
            ->selectRaw("YEAR(data_referencia) as 'ano'")->groupBy('ano')
            ->pluck('ano');

        $anosReserva= Reserva::query()
            ->where('id_user', '=', "$usuario->id")
            ->join('reserva_categorias', 'reservas.id_res_cat', '=', 'reserva_categorias.id')
            ->selectRaw("YEAR(data_referencia) as 'ano'")->groupBy('ano')
            ->pluck('ano');

        $anosDesordenado= collect();//Cria uma coleção vazia para armazenar meses

        //adiciona todos os meses na variavel $mesesDesordenado
        $anosDespesas->flatMap(function ($item) use (&$anosDesordenado){
            $anosDesordenado->prepend($item);
        });
        $anosReceita->flatMap(function ($item) use (&$anosDesordenado){
            $anosDesordenado->prepend($item);
        });
        $anosReserva->flatMap(function ($item) use (&$anosDesordenado){
            $anosDesordenado->prepend($item);
        });

        $anosOrdenado= collect(); //Cria coleção para armazenar os meses ordenados

        //remove duplicidade dos meses e adiciona na variavel $mesesOrdenado. Foi feito desta forma par que o indice do array ficase em ordem crescente
        $anosDesordenado= $anosDesordenado->unique()->sortDesc()->each(function ($item) use (&$anosOrdenado){
            $anosOrdenado->prepend($item);
        });


        return $anosOrdenado;
    }


    public function registrosMeses(User $usuario, int $ano)
    {
        $mesesDespesas= Despesa::query()
            ->where('id_user', '=', "$usuario->id")
            ->join('despesa_categorias', 'despesas.id_des_cat', '=', 'despesa_categorias.id')
            ->whereYear('data_referencia', '=', "$ano")
            ->selectRaw("MONTH(data_referencia) as 'mes'")->groupBy('mes')
            ->pluck('mes');

        $mesesReceita= Receita::query()
            ->where('id_user', '=', "$usuario->id")
            ->join('receita_categorias', 'receitas.id_rec_cat', '=', 'receita_categorias.id')
            ->whereYear('data_referencia', '=', "$ano")
            ->selectRaw("MONTH(data_referencia) as 'mes'")->groupBy('mes')
            ->pluck('mes');

        $mesesReserva= Reserva::query()
            ->where('id_user', '=', "$usuario->id")
            ->join('reserva_categorias', 'reservas.id_res_cat', '=', 'reserva_categorias.id')
            ->whereYear('data_referencia', '=', "$ano")
            ->selectRaw("MONTH(data_referencia) as 'mes'")->groupBy('mes')
            ->pluck('mes');

        $mesesDesordenado= collect();//Cria uma coleção vazia para armazenar meses

        //adiciona todos os meses na variavel $mesesDesordenado
        $mesesDespesas->flatMap(function ($item) use (&$mesesDesordenado){
            $mesesDesordenado->prepend($item);
        });
        $mesesReceita->flatMap(function ($item) use (&$mesesDesordenado){
            $mesesDesordenado->prepend($item);
        });
        $mesesReserva->flatMap(function ($item) use (&$mesesDesordenado){
            $mesesDesordenado->prepend($item);
        });

        $mesesOrdenado= collect(); //Cria coleção para armazenar os meses ordenados

        $descricao = collect(['NULL', 'Jan','Fev', 'Mar', 'Abr', 'Mai', 'Jun', 'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez']);

        //remove duplicidade dos meses e adiciona na variavel $mesesOrdenado. Foi feito desta forma par que o indice do array ficase em ordem crescente

        $mesesDesordenado= $mesesDesordenado->unique()->sortDesc()->each(function ($item) use (&$mesesOrdenado, $descricao){
            $mesesOrdenado->prepend($item, "$descricao[$item]");
        });


        return $mesesOrdenado;
    }



}
