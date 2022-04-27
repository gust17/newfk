<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css"
        integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap-theme.min.css"
        integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js"
        integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous">
    </script>
</head>

<body style="background-color: black">

    <div class="container">
        <div style="background-color: black" class="panel">

            <div class="panel-body text-center">
                <center>
                    <strong><h2 style="color: #00FF77;">Simulador de Investimento</h2></strong>
                    <br>
                    <button onclick="diminui()">-</button> <input type="text" id="valor" value="100000"> <button
                        onclick="aumenta()">+</button>
                </center>

                <p>Selecione o período de duração do Investimento</p>



            </div>
        </div>

        <ul class="nav nav-pills text-center">
            <li class="active"><a onclick="buscaresultado(1)" data-toggle="pill" href="#home">12 meses</a></li>
            <li><a onclick="buscaresultado(2)" data-toggle="pill" href="#menu1">24 meses</a></li>
            <li><a onclick="buscaresultado(3)" data-toggle="pill" href="#menu2">48 meses</a></li>

        </ul>
        <div class="tab-content text-center">


                <div id="home" class="tab-pane fade in active">

                    <p>Taxa de rendimento 12% ao ano para o periodo de 12 meses</p>
                </div>
                <div id="menu1" class="tab-pane fade">

                    <p>Taxa de rendimento 13% ao ano para o periodo de 24 meses</p>
                </div>
                <div id="menu2" class="tab-pane fade">

                    <p>Taxa de rendimento 14% ao ano para o periodo de 12 meses</p>
                </div>


        </div>
        <div class="row">
            <div class="col-md-6 text-center">
                <h4>Início do Investimento</h4>
                <p>{{ $now->format('d/m/y') }}</p>
            </div>
            <div class="col-md-6 text-center">
                <h4>Resgate do Investimento</h4>
                <p id="futuro"></p>
            </div>
            <div class="col-md-12 text-center">
                <h4>Valor Final</h4>
                <p id="rendimento"></p>
            </div>
        </div>

    </div>

</body>
<script>
    function aumenta() {

        valor = $('#valor').val();
        novovalor = parseFloat(valor) + parseFloat(5000);
        busca = document.getElementById("valor");
        document.getElementById("valor").value = novovalor;
        //alert(novovalor);


    }

    function diminui() {

        valor = $('#valor').val();
        novovalor = parseFloat(valor) - parseFloat(5000);
        busca = document.getElementById("valor");
        document.getElementById("valor").value = novovalor;
        //alert(novovalor);


    }

    function buscaresultado(tipo) {
        valor = $('#valor').val();
        //alert(tipo);
        $.get("api/datavalores/" + tipo + "/valor/" + valor, function(resultado) {
            var datas = resultado;
            futuro = datas.data;
            rendimento = datas.rendimento;

            $('#futuro').html(futuro)
            $('#rendimento').html('R$ ' + rendimento + ',00')
            // alert(futuro);


            // chart.data.labels = nomes;
            // chart.data.datasets[0].data = insc; // or you can iterate for multiple datasets
            // or you can iterate for multiple datasets
            //   chart.update(); // finally update our chart
        });


    }
</script>

<script>
    $(document).ready(function() {
        buscaresultado(1);

    });
</script>

</html>
