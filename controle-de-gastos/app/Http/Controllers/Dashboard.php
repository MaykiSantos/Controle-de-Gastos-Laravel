<?php

namespace App\Http\Controllers;

use App\Despesa;
use App\Http\Controllers\help\ConsultaBanco;
use App\Receita;
use App\Reserva;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use phpDocumentor\Reflection\Types\Collection;
use function MongoDB\BSON\toJSON;

class Dashboard extends Controller
{
    public function index(Request $request)
    {
        $data = now();
        $ano= $data->year;
        $mes= $data->month;
        $consulta= new ConsultaBanco();
        $registros= $consulta->registrosUsuario($request->user(), $mes, $ano);

        $totalReceitas= $registros['receitas']->pluck('valor')->sum();
        $totalDespesas= $registros['despesas']->pluck('valor')->sum();
        $totalReservas= $registros['reservas']->pluck('valor')->sum();


        return view('dashboard', [
            'totalReceitas'=> $totalReceitas,
            'totalDespesas'=> $totalDespesas,
            'totalReservas'=> $totalReservas,
            'totalSaldo'=> $totalReceitas - ($totalDespesas + $totalReservas),
            'request'=> $request
        ]);
    }

    public function graficosPiza(Request $request)
    {
        $data = now();
        $ano= $data->year;
        $mes= $data->month;
        $usuario= User::query()->find($request->usuario);

        $despesas= Despesa::query()
            ->where('id_user', '=', "$usuario->id")
            ->join('despesa_categorias', 'despesas.id_des_cat', '=', 'despesa_categorias.id')
            ->whereYear('data_referencia', '=', "$ano")
            ->whereMonth('data_referencia', '=', "$mes")
            ->selectRaw("despesa_categorias.categoria, SUM(despesas.valor) as 'total'")
            ->groupBy('id_des_cat', 'categoria')->get();

        $receitas= Receita::query()
            ->where('id_user', '=', "$usuario->id")
            ->join('receita_categorias', 'receitas.id_rec_cat', '=', 'receita_categorias.id')
            ->whereYear('data_referencia', '=', "$ano")
            ->whereMonth('data_referencia', '=', "$mes")
            ->selectRaw("receita_categorias.categoria, SUM(receitas.valor) as 'total'")
            ->groupBy('id_rec_cat', 'categoria')->get();


        return [$despesas, $receitas];
    }

    public function graficosLinha(Request $request)
    {
        $data = now();
        $dataAtual = $data->format('Y-m-d');
        $dataAntes = $data->subYear(1)->format('Y-m-d');
        $usuario= User::query()->find($request->usuario);

        $despesas= Despesa::query()
            ->where('id_user', '=', "$usuario->id")
            ->where('data_referencia', '<=', "$dataAtual", 'and')
            ->where('data_referencia', '>=', "$dataAntes")
            ->selectRaw("DATE_FORMAT(data_referencia, '%Y-%m') as mesAno, MONTH(data_referencia) as mes, SUM(valor) as total")
            ->latest('data_referencia')
            ->groupBy('mes', 'mesAno')
            ->get();

        $receitas= Receita::query()
            ->where('id_user', '=', "$usuario->id")
            ->where('data_referencia', '<=', "$dataAtual", 'and')
            ->where('data_referencia', '>=', "$dataAntes")
            ->selectRaw("DATE_FORMAT(data_referencia, '%Y-%m') as mesAno, MONTH(data_referencia) as mes, SUM(valor) as total")
            ->latest('data_referencia')
            ->groupBy('mes', 'mesAno')
            ->get();

        $reservas= Reserva::query()
            ->where('id_user', '=', "$usuario->id")
            ->where('data_referencia', '<=', "$dataAtual", 'and')
            ->where('data_referencia', '>=', "$dataAntes")
            ->selectRaw("DATE_FORMAT(data_referencia, '%Y-%m') as mesAno, MONTH(data_referencia) as mes, SUM(valor) as total")
            ->latest('data_referencia')
            ->groupBy('mes', 'mesAno')
            ->get();

        $matriz= collect();
        $datas= collect();
        $despesasOrg = collect();
        $receitasOrg = collect();
        $reservasOrg = collect();

        $despesas->each(function ($item) use (&$datas, &$despesasOrg){
            $datas->put("$item->mesAno", "$item->mesAno");
            $despesasOrg->put("$item->mesAno", $item->total);
        });

        $receitas->each(function ($item) use (&$datas, &$receitasOrg){
            $datas->put("$item->mesAno", "$item->mesAno");
            $receitasOrg->put("$item->mesAno", $item->total);
        });

        $reservas->each(function ($item) use (&$datas, &$reservasOrg) {
            $datas->put("$item->mesAno", "$item->mesAno");
            $reservasOrg->put("$item->mesAno", $item->total);
        });

        $dataOrdenada = $datas->sort();

        $dataOrdenada->each(function ($data) use (&$matriz, $despesasOrg, $receitasOrg, $reservasOrg){
            $des = $despesasOrg->has("$data") ? $despesasOrg[$data] : 0;
            $rec= $receitasOrg->has("$data") ? $receitasOrg[$data] : 0;
            $res= $reservasOrg->has("$data") ? $reservasOrg[$data] : 0;

            $matriz->push([$data, $rec, $des, $res]);
        });

        return $matriz;
    }


    public function graficosBarra(Request $request)
    {
        $data = now();
        $ano= $data->year;
        $mes= $data->month;
        $mesAno= $data->format('m-Y');
        $usuario= User::query()->find($request->usuario);

        $despesa= Despesa::query()
            ->where('id_user', '=', "$usuario->id")
            ->whereYear('data_referencia', '=', "$ano")
            ->whereMonth('data_referencia', '=', "$mes")
            ->selectRaw("SUM(valor) as 'total'")->pluck('total');

        $receita= Receita::query()
            ->where('id_user', '=', "$usuario->id")
            ->whereYear('data_referencia', '=', "$ano")
            ->whereMonth('data_referencia', '=', "$mes")
            ->selectRaw("SUM(valor) as 'total'")->pluck('total');

        $reserva= Reserva::query()
            ->where('id_user', '=', "$usuario->id")
            ->whereYear('data_referencia', '=', "$ano")
            ->whereMonth('data_referencia', '=', "$mes")
            ->selectRaw("SUM(valor) as 'total'")->pluck('total');

        return [$mesAno, $receita[0], $despesa[0], $reserva[0]];
    }





}
