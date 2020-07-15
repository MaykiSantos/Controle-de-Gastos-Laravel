@extends('layouts.principal')

@section('conteudo-lateral')
    <div class="container d-flex">
        <div class="row justify-content-center">

            @foreach($meses->keys() as $mes)

                @include('layouts.botao-grande', [
                            'ano'=> $mes,
                            'link'=> "/controle-de-gastos/{$ano}/{$meses[$mes]}"
                            ])
            @endforeach


        </div>
    </div>
@endsection
