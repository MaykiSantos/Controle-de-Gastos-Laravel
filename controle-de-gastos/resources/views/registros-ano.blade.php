@extends('layouts.principal')

@section('conteudo-lateral')

    <div class="container d-flex">
        <div class="row justify-content-center">



            @foreach($anos as $ano)
            @include('layouts.botao-grande', [
                        'ano'=> $ano,
                        'link'=> "/controle-de-gastos/{$ano}"
                        ])
            @endforeach

        </div>
    </div>

@endsection
