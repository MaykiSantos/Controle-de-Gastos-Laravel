<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Auth\VerificationController;
use Illuminate\Http\Request;

class CriaMes extends Controller
{
    public function criar(Request $request)
    {
        $mes= $request->mes;
        $ano= $request->ano;

        if (($mes<1 or $mes>12) or ($ano<2019 or $ano>2023)){
            $request->session()->flash('mensagem', 'Mês ou Ano invalidos');
            return redirect('/controle-de-gastos');
        };

        return redirect("/controle-de-gastos/{$ano}/{$mes}");
    }
}
