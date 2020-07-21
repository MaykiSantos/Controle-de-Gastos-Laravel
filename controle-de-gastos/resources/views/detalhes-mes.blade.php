@extends('layouts.principal')

@section('conteudo-lateral')
    <div class="container">
        <div class="row">


            <div id="receita" class="col-12 border rounded shadow bg-white mt-4">
                <div class="row mt-4">
                    <h1 id="mes-ano">{{$mesDescricao->get($mes)}}/{{$ano}}</h1>
                </div>
                <div class="text-center my-4">
                    <button class="btn btn-lg btn-success ml-3" type="button" name="button" data-toggle="modal" data-target="#modalReceita">
                        Adicionar Receita
                    </button>
                    @include('layouts.modal',['idModal'=>'modalReceita',
                                'tituloModal'=> 'Receita',
                                'corTitulo'=>'text-success',
                                'categorias'=> $receitaCategorias,
                                'linkRequisicao'=> "/controle-de-gastos/{$ano}/{$mes}/salvar-receita"])
                    <button class="btn btn-lg btn-danger ml-3" type="button" name="button" data-toggle="modal" data-target="#modalDespesa">
                        Adicionar Despesa
                    </button>
                    @include('layouts.modal', ['idModal'=>'modalDespesa',
                                'tituloModal'=>'Despesa',
                                'corTitulo'=>'text-danger',
                                'categorias'=> $despesaCategorias,
                                'linkRequisicao'=> "/controle-de-gastos/{$ano}/{$mes}/salvar-despesa"])
                    <button class="btn btn-lg btn-primary ml-3" type="button" name="button" data-toggle="modal" data-target="#modalReserva">
                        Adicionar Reserva
                    </button>
                    @include('layouts.modal', ['idModal'=>'modalReserva',
                                'tituloModal'=>'Reserva',
                                'corTitulo'=>'text-primary',
                                'categorias'=> $reservaCategorias,
                                'linkRequisicao'=> "/controle-de-gastos/{$ano}/{$mes}/salvar-reserva"])
                </div>
            </div>

            <div id="receita" class="col-12 border rounded shadow bg-white mt-4 py-2">
                <h2 class="text-success"><strong>Receitas</strong></h2>
                <table class="table table-bordered">
                    <thead class="thead-light">
                    <th>Categoria</th>
                    <th>Descrição</th>
                    <th>Valor</th>
                    <th></th>
                    </thead>
                    <tbody>
                    @foreach($receitas as $receita)

                        <tr>
                            <td>{{$receita->categoria}}</td>
                            <td>{{$receita->descricao}}</td>
                            <td>R$ {{$receita->valor}}</td>
                            <td class="text-right d-flex justify-content-end">
                                <button class="btn btn-outline-secondary btn-sm" data-toggle="modal" data-target="#modalEditarReceita{{$receita->id}}">
                                    <i class="far fa-edit"></i>
                                    Editar
                                </button>

                                @include('layouts.modal', ['idModal'=>"modalEditarReceita{$receita->id}",
                                'tituloModal'=>'Editar Receita',
                                'corTitulo'=>'text-success',
                                'categorias'=> $receitaCategorias,
                                'categoria'=> "$receita->categoria",
                                'valor'=>"$receita->valor",
                                'descricao'=> "$receita->descricao",
                                'linkRequisicao'=> "/controle-de-gastos/{$ano}/{$mes}/editar-receita/{$receita->id}"])

                                <form action="/controle-de-gastos/{{$ano}}/{{$mes}}/apagar-receita/{{$receita->id}}" method="POST">
                                    @csrf
                                    <button class="btn btn-outline-danger btn-sm" >
                                        <i class="far fa-trash-alt"></i>
                                        Excluir
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
            </div>

            <div id="receita" class="col-12 border rounded shadow bg-white mt-4 py-2">
                <h2 class="text-danger"><strong>Despesas</strong></h2>
                <table class="table table-bordered">
                    <thead class="thead-light">
                    <th>Categoria</th>
                    <th>Descrição</th>
                    <th>Valor</th>
                    <th></th>
                    </thead>
                    <tbody>
                    @foreach($despesas as $despesa)
                        <tr>

                            <td>{{$despesa->categoria}}</td>
                            <td>{{$despesa->descricao}}</td>
                            <td>R$ {{$despesa->valor}}</td>
                            <td class="text-right d-flex justify-content-end">
                                <button class="btn btn-outline-secondary btn-sm" data-toggle="modal" data-target="#modalEditarDespesa{{$despesa->id}}">
                                    <i class="far fa-edit"></i>
                                    Editar
                                </button>

                                @include('layouts.modal', ['idModal'=>"modalEditarDespesa{$despesa->id}",
                                'tituloModal'=>'Editar Despesa',
                                'corTitulo'=>'text-danger',
                                'categorias'=> $despesaCategorias,
                                'categoria'=> "$despesa->categoria",
                                'valor'=>"$despesa->valor",
                                'descricao'=> "$despesa->descricao",
                                'linkRequisicao'=> "/controle-de-gastos/{$ano}/{$mes}/editar-despesa/{$despesa->id}"])

                                <form action="/controle-de-gastos/{{$ano}}/{{$mes}}/apagar-despesa/{{$despesa->id}}" method="POST">
                                    @csrf
                                    <button class="btn btn-outline-danger btn-sm" >
                                        <i class="far fa-trash-alt"></i>
                                        Excluir
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
            </div>

            <div id="receita" class="col-12 border rounded shadow bg-white mt-4 mb-4 py-2">
                <h2 class="text-primary"><strong>Reservas</strong></h2>
                <table class="table table-bordered">
                    <thead class="thead-light">
                    <th>Categoria</th>
                    <th>Descrição</th>
                    <th>Valor</th>
                    <th></th>
                    </thead>
                    <tbody>
                    @foreach($reservas as $reserva)
                        <tr>
                            <td>{{$reserva->categoria}}</td>
                            <td>{{$reserva->descricao}}</td>
                            <td>R$ {{$reserva->valor}}</td>
                            <td class="text-right d-flex justify-content-end">
                                <button class="btn btn-outline-secondary btn-sm" data-toggle="modal" data-target="#modalEditarReserva{{$reserva->id}}">
                                    <i class="far fa-edit"></i>
                                    Editar
                                </button>

                                @include('layouts.modal', ['idModal'=>"modalEditarReserva{$reserva->id}",
                                'tituloModal'=>'Editar Reserva',
                                'corTitulo'=>'text-danger',
                                'categorias'=> $reservaCategorias,
                                'categoria'=> "$reserva->categoria",
                                'valor'=>"$reserva->valor",
                                'descricao'=> "$reserva->descricao",
                                'linkRequisicao'=> "/controle-de-gastos/{$ano}/{$mes}/editar-reserva/{$reserva->id}"])

                                <form action="/controle-de-gastos/{{$ano}}/{{$mes}}/apagar-reserva/{{$reserva->id}}" method="POST">
                                    @csrf
                                    <button class="btn btn-outline-danger btn-sm" >
                                        <i class="far fa-trash-alt"></i>
                                        Excluir
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </div>
@endsection
