<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Documentacao extends Controller
{
    public function index()
    {
        return view('doc');
    }
}
