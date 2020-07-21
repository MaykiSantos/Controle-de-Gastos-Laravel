@extends('layouts.principal')

@section('conteudo-lateral')
    <div class="container">
        @csrf

        <div class="row" id="icones-topo">
            <div class="col div-icone-topo">
                <p class="titulo position-absolute">Saldo Atual</p>
                <div class="valor position-absolute"><strong>R$</strong> {{$totalSaldo}}</div>
                <img class="img-fluid" src="{{asset('img\icone-caixa-entrada.svg')}}" alt="">
            </div>

            <div class="col div-icone-topo">
                <p class="titulo position-absolute">Receitas</p>
                <div class="valor position-absolute"><strong>R$</strong> {{$totalReceitas}}</div>
                <img class="img-fluid" src="{{asset('img\icone-grafico-mais.svg')}}" alt="">
            </div>

            <div class="col div-icone-topo">
                <p class="titulo position-absolute">Despesas</p>
                <div class="valor position-absolute"><strong>R$</strong> {{$totalDespesas}}</div>
                <img class="img-fluid" src="{{asset('img\icone-grafico-menos.svg')}}" alt="">

            </div>

            <div class="col div-icone-topo">
                <p class="titulo position-absolute">Reservas</p>
                <div class="valor position-absolute"><strong>R$</strong> {{$totalReservas}}</div>
                <img class="img-fluid" src="{{asset('img\icone-caixa-reserva.svg')}}" alt="">
            </div>

        </div>


        <div id="" class="row mt-4"><!--Graficos detalhados-->
            <div class="col"><!--Graficos coluna esquerda-->
                <div id="grafico-despesas-mes" class="border rounded shadow bg-white" style="width: 100%; height: 100%;"><!--Grafico despesas do mes--></div>
            </div><!--Fim graficos coluna esquerda-->
            <div class="col"><!--Graficos coluna direita-->
                <div id="grafico-receita-mes" class="border rounded shadow bg-white"><!--Grafico receita do mes--></div>

            </div><!--Fim graficos coluna direita-->
        </div><!--Fim graficos detalhados-->
    </div>
    <div class="container mt-4">

        <div class="row">
            <div class="col">
                <div id="receitas-despesas-6-meses" class="border rounded shadow bg-white">
                    Receitas x Despesas nos últimos 6 meses:<br>
                    grafico em barra comparando os dois valores
                </div>
            </div>
            <div class="col">
                <div id="receita-despesas-mes"class="border rounded shadow bg-white">

                </div>
            </div>
            <div class="col-12">
                <div id="grafico-geral" class="border rounded shadow bg-white mt-4 mb-4">

                </div>
            </div>
        </div>
        <input type="hidden" name="usuario" value="{{$request->User()->id}}">
    </div>


    <!-- Scripts JS personalizado-->

    <script src="{{ asset('js/controller/dashboard.js') }}"></script>



@endsection
