@extends('layouts.principal')

@section('conteudo-lateral')
    <div class="container">
        <div class="row">


            <div id="receita" class="col-12 border rounded shadow bg-white mt-4">
                <div class="row mt-4">
                    <!--<h1 id="mes-ano">Dezembro/2020</h1>-->

                    <div class="row" id="mes-ano">
                            <div class="input-group input-group-lg">
                                <select class="form-control" id="inputGroupSelect01">
                                    <option selected>Mes...</option>
                                    <option value="1">Janeiro</option>
                                    <option value="2">Fevereiro</option>
                                    <option value="3">Março</option>
                                    <option value="4">Abril</option>
                                    <option value="5">Maio</option>
                                    <option value="6">Junho</option>
                                    <option value="7">Julho</option>
                                    <option value="8">Agosto</option>
                                    <option value="9">Setembro</option>
                                    <option value="10">Outubro</option>
                                    <option value="11">Novembro</option>
                                    <option value="12">Dezembro</option>
                                </select>

                                <div class="input-group-prepend">
                                    <span class="input-group-text">/</span>
                                </div>

                                <select class="form-control" id="inputGroupSelect01">
                                    <option selected>Escolher...</option>
                                    <option value="1">2019</option>
                                    <option value="2">2020</option>
                                    <option value="3">2021</option>
                                    <option value="3">2022</option>
                                    <option value="3">2023</option>
                                </select>
                            </div>
                    </div>



                </div>
                <div class="text-center my-4">
                    <button class="btn btn-lg btn-success ml-3" type="button" name="button" data-toggle="modal" data-target="#modalReceita">
                        Criar Mes
                    </button>
                </div>
            </div>

        </div>
    </div>


@endsection

