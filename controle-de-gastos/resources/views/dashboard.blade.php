@extends('layouts.principal')

@section('conteudo-lateral')
    <div class="container">

        <div id="area-graficos" class="row"><!--Graficos detalhados-->
            <div class="col"><!--Graficos coluna esquerda-->
                <div id="grafico-despesas-mes" class="border rounded shadow bg-white"><!--Grafico despesas do mes-->
                    Despesas do Mês:<br>
                    Grafico de pizza contendo o total de despesas do mês e separando por cor cada tipo de despesa
                    e sua porcentagem<br><br>
                    web.mobills.com.br <br>
                    http://gionkunz.github.io/chartist-js/
                </div>
            </div><!--Fim graficos coluna esquerda-->
            <div class="col"><!--Graficos coluna direita-->
                <div id="grafico-receita-mes" class="border rounded shadow bg-white"><!--Grafico receita do mes-->
                    Receitas do Mês:<br>
                    Grafico de pizza contendo o total da receita do mês e separando por cor cada fonte
                    e seu percentual<br><br>
                    web.mobills.com.br
                </div>


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
                    Receitas x Despesas no último mês:<br>
                    grafico em linha fazendo a comparação
                </div>
            </div>
            <div class="col-12">
                <div id="grafico-geral" class="border rounded shadow bg-white mt-4">
                    Visão Geral:<br>
                    grafico em linha contendo os valores de receita, despesas e valor quardado no banco do ultimo ano.
                </div>
            </div>
        </div>
    </div>
@endsection
