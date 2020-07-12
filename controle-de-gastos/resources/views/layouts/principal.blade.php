<!DOCTYPE html>
<html lang="pt-br" dir="ltr">
<head>
    <!-- Meta tags Obrigatórias -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <!--CSS-->
    <style>
        body{
            margin-top: 56px;
        }

        .icone-resumo{

        }
        .descricao-resumo-saldo{
            position: absolute;
            margin-left: 138px;
            margin-top: 40px;
            font-weight: bold;
        }

        .descricao-resumo-receita{
            position: absolute;
            margin-left: 170px;
            margin-top: 40px;
            font-weight: bold;
        }

        .descricao-resumo-despesas{
            position: absolute;
            margin-left: 155px;
            margin-top: 40px;
            font-weight: bold;
        }

        .descricao-resumo-reserva{
            position: absolute;
            margin-left: 122px;
            margin-top: 40px;
            font-weight: bold;
        }



        .imagem-resumo{
            position: absolute;
            width: 80%;
        }
        #area-graficos{
            margin-top: 170px;
        }
        #grafico-despesas-mes{
            width: 100%;
            height: 350px
        }

        #grafico-receita-mes{
            width: 100%;
            height: 350px
        }

        #receitas-despesas-6-meses{
            width: 100%;
            height: 300px
        }
        #receita-despesas-mes{
            width: 100%;
            height: 300px
        }

        #grafico-geral{
            width: 100%;
            height: 220px
        }

        #mes-ano{
            font-weight: bold;
            margin: auto;

        }

    </style>

    <title>Controle de Gastos</title>

</head>
<body class="bg-light">
    <nav class="navbar navbar-dark bg-info fixed-top shadow-sm">
        <a class="navbar-brand" href="/controle-de-gastos">
            <img src="{{asset('img\logo.png')}}" width="30" height="30" class="d-inline-block align-top" alt="">
            <strong>Controle de Gastos</strong>
        </a>

        @auth()
            <form action="http://localhost:8000/logout" method="POST">
                @csrf
                <button class="btn btn-danger btn-sm">Sair</button>
            </form>
        @endauth

    </nav>

    <div class="container col-12"><!--Container Principal-->
        <div class="row"><!--Row Principal-->
            <div class="col-1">
                <div class="row position-fixed list-group bg-info h-100 shadow">
                    <a href="/controle-de-gastos" class="list-group-item-action mx-auto text-center p-2">
                        <img src="{{asset('img\home.svg')}}" alt="" width="40px">
                        <p class="">Dashboard</p>
                    </a>
                    <a href="#" class="list-group-item-action mx-auto text-center p-2">
                        <img src="{{asset('img\lista.svg')}}" alt="" width="40px">
                        <p>Transações</p>
                    </a>
                    <a href="#" class="list-group-item-action mx-auto text-center p-2">
                        <img src="{{asset('img\contas.svg')}}" alt="" width="40px">
                        <p>Contas</p>
                    </a>
                    <a href="#" class="list-group-item-action mx-auto text-center p-2">
                        <img src="{{asset('img\relatorio.svg')}}" alt="" width="40px">
                        <p>Relarotios</p>
                    </a>
                    <a href="/controle-de-gastos/novo-mes" class="list-group-item-action mx-auto text-center p-2">
                        <img src="{{asset('img\novo-mes.svg')}}" alt="" width="40px">
                        <p>Novo Mês</p>
                    </a>
                </div>
            </div>
            <div class="col-11"><!--Conteudo lateral-->

                @yield('conteudo-lateral')


            </div><!--Fim conteudo lateral-->
        </div><!--Fim row principal-->
    </div><!--Fim container principal-->


<!-- jQuery primeiro, depois Popper.js, depois Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<!-- JavaScript (Opcional) -->
</body>
</html>
