const token= document.getElementsByName('_token');
const usuario= document.getElementsByName('usuario')[0].value;

const formModel = new FormData();
formModel.append('_token', token[0].value);
formModel.append('usuario', usuario);

/*===============Requisita dados e monta grafico de fizza do mes atual===============*/

fetch('/controle-de-gastos/dados-mes',{
    method: 'POST',
    body: formModel
}).then(resposta=>resposta.json()).then(function (dados) {
    console.log(dados);
    let listaDespesas = [];
    let listaReceita = [];

    dados[0].forEach(function (item){
        listaDespesas.push([item.categoria, item.total]);
    });

    dados[1].forEach(function (item){
        listaReceita.push([item.categoria, item.total]);
    });

    google.charts.load("current", {packages:["corechart"]});
    google.charts.setOnLoadCallback(drawChart);
    function drawChart() {
        let dataDespesas = google.visualization.arrayToDataTable([
            ['Task', 'Hours per Day'], ...listaDespesas]);
        let dataReceita = google.visualization.arrayToDataTable([
            ['Task', 'Hours per Day'], ...listaReceita]);

        let optionsDespesas = {
            title: 'Despesas do Mês',
            pieHole: 0.4,
            chartArea: {left:40,top:40,width:'90%',height:'90%'},
            titleTextStyle: {fontSize: 20}
        };
        let optionsReceitas = {
            title: 'Receitas do Mês',
            pieHole: 0.4,
            chartArea: {left:40,top:40,width:'90%',height:'90%'},
            titleTextStyle: {fontSize: 20}
        };

        let despesasMes = new google.visualization.PieChart(document.getElementById('grafico-despesas-mes'));
        despesasMes.draw(dataDespesas, optionsDespesas);

        let receitaMes = new google.visualization.PieChart(document.getElementById('grafico-receita-mes'));
        receitaMes.draw(dataReceita, optionsReceitas);
    }
});


/*===============Requisita dados e monta grafico em linha do ultimo ano===============*/

fetch('/controle-de-gastos/dados-ultimo-ano', {
    method: 'POST',
    body: formModel
    }).then(resposta=>resposta.json()).then(function (dados) {

    google.charts.load('current', {'packages':['corechart']});
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
        var data = google.visualization.arrayToDataTable([['Year', 'Receita', 'Despesa', 'Reserva'], ...dados]);

        var options = {
            title: 'Histórioco ultimo ano',
            curveType: 'none',//none ou function
            legend: { position: 'bottom' },
            chartArea: {left:60,top:55,width:'90%',height:'66%'},
            titleTextStyle: {fontSize: 20},
            lineWidth: 4,
            pointSize: 7
        };
        var chart = new google.visualization.LineChart(document.getElementById('grafico-geral'));
        chart.draw(data, options);
    }
});



/*===============Requisita dados e monta grafico em barra===============*/

fetch('/controle-de-gastos/dados-mes-barra',{
    method: 'POST',
    body: formModel
}).then(retorno=>retorno.json()).then(function (dados) {

    console.log(dados);

    google.charts.load('current', {'packages':['bar']});
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
        var data = google.visualization.arrayToDataTable([
            ['', 'Receita', 'Despesa', 'Reserva'],
            dados
        ]);

        var options = {
            title: 'Receita X Desesa X Reserva',
            titleTextStyle: {color: 'black',fontSize: 20, bold: true},
            chartArea: {left:40,top:40,width:'50%',height:'75%'}
        };

        var chart = new google.charts.Bar(document.getElementById('receita-despesas-mes'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
    }



});




