<?php

namespace App\Http\Controllers;

use App\Http\Controllers\help\ConsultaBanco;
use Illuminate\Http\Request;

class RegistrosAno extends Controller
{
    public function index(Request $request)
    {
        $consulta= new ConsultaBanco();
        $anos= $consulta->registroAnos($request->user());

        return view('registros-ano', [
            'anos'=> $anos
        ]);
    }
}
