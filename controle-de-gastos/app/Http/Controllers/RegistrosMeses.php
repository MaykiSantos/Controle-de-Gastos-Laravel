<?php

namespace App\Http\Controllers;

use App\Http\Controllers\help\ConsultaBanco;
use Illuminate\Http\Request;

class RegistrosMeses extends Controller
{
    public function index(Request $request, $ano)
    {
        $consulta = new ConsultaBanco();
        $meses= $consulta->registrosMeses($request->user(), $ano);

        return view('registro-mes', [
            'meses'=> $meses,
            'ano'=> $ano
        ]);

    }
}
