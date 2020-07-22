@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="card mb-3">
                <img class="card-img-top" src="{{asset('img/imagem-doc.jpg')}}" alt="Imagem de capa do card">
                <div class="card-body">
                    <h4 class="card-title">Projeto Controle de Gastos</h4>
                    <p>O projeto foi baseado em uma tabela de controle de gastos de uso pessoal, embora simples o sistma é
                    funcional e é possivel a utilização de vários usuários. Este tambem é o primeiro projeto em Laravel e servil
                        para entender melhor o funcionamento do framework.</p>
                        <h5>Inicio</h5>
                        <p>Para fazer uso do sistema é precisso realizar o login. Caso ainda não possua um login basta se registrar clicando em "Register"
                        no canto superior direito da tela.<br>
                        Ao realizar o login o usuário será direcionado para a tela de Dashboar onde encontrará os campos de "Saldo Atual", "Receita",
                        "Despesas" e "Reservas" zerados, alem dos gráficos não estarem preenchidos. Estes compos trazem dados apenas do mês atual, sendo assim
                        os mesmos só estarão disponíveis quando exixtirem registros no mês.</p>
                    <h5>Adicionando Mês</h5>
                    <p>Para realizar o cadastro de um mês basta clicar no botão "Novo mês", onde será solicitado o mês e o ano que será registrado. Apos
                    preenchimento basta clicar em "Adicionar", que será redirecionado para a tela de preenchimento dos dados.</p>

                    <h5>Registros Anteriores</h5>
                    <p>Para visualizar os dados registrados de forma detalhada ou edita-los basta clicar em "Registros". As informações estarão separadas
                    por ano e posteriorente por meses.</p>
                    <p class="card-text"><small class="text-muted">21/07/2020</small></p>
                </div>
            </div>
        </div>
    </div>



@endsection
