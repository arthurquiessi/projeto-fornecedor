<?php
 error_reporting(E_NOTICE);
 ini_set("display_errors",0);

 session_start();
 include('../nav.php');
 if (!isset($_SESSION['usuarioNomeCompleto'])){
     echo "
             
             <script type=\"text/javascript\">
             window.location.href='../index.php'
                 alert(\"FAZER LOGIN\");
             </script>
         ";
 }
 
include_once('../conexao.php');

$arrayPostAll = $_POST['CodforGrafico'];
$arrayPost = explode(" - ",$arrayPostAll);

if (!isset($_POST['CodforGrafico'])){
    echo "
            
            <script type=\"text/javascript\">
            window.location.href='desempenho.php'
            </script>
        ";
}


$codFor = $arrayPost[0]; 
//echo $codFor;
$fornecedor = $arrayPost[1];
$anoGrafico = $_POST['anoGrafico']; 
$query =    mysqli_query($conn, "SELECT * FROM desempenho where codFor = '$codFor' AND ano = '$anoGrafico' ORDER BY mes");
$queryJan = mysqli_query($conn, "SELECT * FROM desempenho where codFor = '$codFor' AND ano = '$anoGrafico' AND mes = '1' LIMIT 1");
$queryFev = mysqli_query($conn, "SELECT * FROM desempenho where codFor = '$codFor' AND ano = '$anoGrafico' AND mes = '2' LIMIT 1");
$queryMar = mysqli_query($conn, "SELECT * FROM desempenho where codFor = '$codFor' AND ano = '$anoGrafico' and mes = '3' LIMIT 1");
$queryAbr = mysqli_query($conn, "SELECT * FROM desempenho where codFor = '$codFor' AND ano = '$anoGrafico' and mes = '4' LIMIT 1");
$queryMai = mysqli_query($conn, "SELECT * FROM desempenho where codFor = '$codFor' AND ano = '$anoGrafico' and mes = '5' LIMIT 1");
$queryJun = mysqli_query($conn, "SELECT * FROM desempenho where codFor = '$codFor' AND ano = '$anoGrafico' and mes = '6' LIMIT 1");
$queryJul = mysqli_query($conn, "SELECT * FROM desempenho where codFor = '$codFor' AND ano = '$anoGrafico' and mes = '7' LIMIT 1");
$queryAgo = mysqli_query($conn, "SELECT * FROM desempenho where codFor = '$codFor' AND ano = '$anoGrafico' and mes = '8' LIMIT 1");
$querySet = mysqli_query($conn, "SELECT * FROM desempenho where codFor = '$codFor' AND ano = '$anoGrafico' and mes = '9' LIMIT 1");
$queryOut = mysqli_query($conn, "SELECT * FROM desempenho where codFor = '$codFor' AND ano = '$anoGrafico' and mes = '10' LIMIT 1");
$queryNov = mysqli_query($conn, "SELECT * FROM desempenho where codFor = '$codFor' AND ano = '$anoGrafico' and mes = '11' LIMIT 1");
$queryDez = mysqli_query($conn, "SELECT * FROM desempenho where codFor = '$codFor' AND ano = '$anoGrafico' and mes = '12' LIMIT 1");
$numJan = mysqli_num_rows($queryJan);
$numFev = mysqli_num_rows($queryFev);
$numMar = mysqli_num_rows($queryMar);
$numAbr = mysqli_num_rows($queryAbr);
$numMai = mysqli_num_rows($queryMai);
$numJun = mysqli_num_rows($queryJun);
$numJul = mysqli_num_rows($queryJul);
$numAgo = mysqli_num_rows($queryAgo);
$numSet = mysqli_num_rows($querySet);
$numOut = mysqli_num_rows($queryOut);
$numNov = mysqli_num_rows($queryNov);
$numDez = mysqli_num_rows($queryDez);
if($numJan == 0){$queryJan = mysqli_query($conn, "SELECT * FROM desempenho where codFor = '0'");}
if($numFev == 0){$queryFev = mysqli_query($conn, "SELECT * FROM desempenho where codFor = '0'");}
if($numMar == 0){$queryMar = mysqli_query($conn, "SELECT * FROM desempenho where codFor = '0'");}
if($numAbr == 0){$queryAbr = mysqli_query($conn, "SELECT * FROM desempenho where codFor = '0'");}
if($numMai == 0){$queryMai = mysqli_query($conn, "SELECT * FROM desempenho where codFor = '0'");}
if($numJun == 0){$queryJun = mysqli_query($conn, "SELECT * FROM desempenho where codFor = '0'");}
if($numJul == 0){$queryJul = mysqli_query($conn, "SELECT * FROM desempenho where codFor = '0'");}
if($numAgo == 0){$queryAgo = mysqli_query($conn, "SELECT * FROM desempenho where codFor = '0'");}
if($numSet == 0){$querySet = mysqli_query($conn, "SELECT * FROM desempenho where codFor = '0'");}
if($numOut == 0){$queryOut = mysqli_query($conn, "SELECT * FROM desempenho where codFor = '0'");}
if($numNov == 0){$queryNov = mysqli_query($conn, "SELECT * FROM desempenho where codFor = '0'");}
if($numDez == 0){$queryDez = mysqli_query($conn, "SELECT * FROM desempenho where codFor = '0'");}

?>
<html lang="pt-br">
    <head>
        <!-- Meta tags Obrigatórias -->
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="icon" href="img\arquivos.png">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <link href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css" rel="stylesheet"> <!-- jQUERY Datable -->
        <link href=https://code.jquery.com/jquery-3.4.1.min.js rel="stylesheet">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js"></script>

        <title>Gráficos</title>
    </head>

    <body class="bg-light">
        <div class="container-fluid">
            <br>
            <div class="py-2 text-center">
                <p class="lead">ÍNDICE DE DESEMPENHO DO FORNECEDOR - IDF</p>
            </div>
            <div class="shadow-lg p-3 mb-3 bg-white rounded">
                <table class="table table-bordered table-sm">
                    <thead>
                        <tr>
                            <th>Fornecedor:</th>
                            <th>Ano:</th>
                        <tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><?php echo $arrayPostAll ?></td>
                            <td><?php echo $anoGrafico ?></td>
                        </tr>
                    </tbody>
                </table>
            </div> 
            <?php while($rJan = mysqli_fetch_assoc($queryJan)){?>
            <?php while($rFev = mysqli_fetch_assoc($queryFev)){?>
            <?php while($rMar = mysqli_fetch_assoc($queryMar)){?>
            <?php while($rAbr = mysqli_fetch_assoc($queryAbr)){?> 
            <?php while($rMai = mysqli_fetch_assoc($queryMai)){?> 
            <?php while($rJun = mysqli_fetch_assoc($queryJun)){?>   
            <?php while($rJul = mysqli_fetch_assoc($queryJul)){?>    
            <?php while($rAgo = mysqli_fetch_assoc($queryAgo)){?>
            <?php while($rSet = mysqli_fetch_assoc($querySet)){?>    
            <?php while($rOut = mysqli_fetch_assoc($queryOut)){?>    
            <?php while($rNov = mysqli_fetch_assoc($queryNov)){?>
            <?php while($rDez = mysqli_fetch_assoc($queryDez)){?>
            <div class="row">
                <div class="col">
                    <div class="shadow-lg p-3 mb-3 bg-white rounded">
                        <canvas id="myChart" class="chartjs" width="570" height="150" style="display: block; width: 570px; height: 150px;"></canvas>
                        <script>
                            var ctx = document.getElementById('myChart').getContext('2d');
                            var myChart = new Chart(ctx, {
                                type: 'bar',
                                data: {
                                    datasets: [{     
                                        label: 'NOTAS IDF MENSAL',                          
                                        data: [<?php echo $rJan['idf'];?>,<?php echo $rFev['idf'];?>,<?php echo $rMar['idf'];?>,<?php echo $rAbr['idf'];?>,<?php echo $rMai['idf'];?>,<?php echo $rJun['idf'];?>,
                                        <?php echo $rJul['idf'];?>,<?php echo $rAgo['idf'];?>,<?php echo $rSet['idf'];?>,<?php echo $rOut['idf'];?>,<?php echo $rNov['idf'];?>,<?php echo $rDez['idf'];?>],
                                        backgroundColor:["rgba(0, 21, 255, 1)","rgba(0, 21, 255, 1)","rgba(0, 21, 255, 1)","rgba(0, 21, 255, 1)","rgba(0, 21, 255, 1)","rgba(0, 21, 255, 1)","rgba(0, 21, 255, 1)","rgba(0, 21, 255, 1)","rgba(0, 21, 255, 1)","rgba(0, 21, 255, 1)","rgba(0, 21, 255, 1)","rgba(0, 21, 255, 1)"],
                                        //borderColor:["rgb(255, 99, 132)","rgb(255, 159, 64)","rgb(255, 205, 86)","rgb(75, 192, 192)","rgb(54, 162, 235)","rgb(153, 102, 255)","rgb(201, 203, 207)"],
                                        borderWidth:1
                                        }],
                                    labels: ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho' , 'Agosto', 'Setembro', 'Outubro', 'Novembro',  'Dezembro'],
                                },
                                options: {
                                    scales:{
                                            yAxes:[
                                                {ticks:{
                                                    beginAtZero:true,
                                                    max: 100
                                                }}
                                                ]},
                                    legend:{
                                        display: 'false',
                                        position: 'top',                        
                                    }
                                }
                            });
                        </script>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="shadow-lg p-3 mb-3 bg-white rounded"> 
                        <table class="table table-bordered table-sm">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>Jan</th>
                                    <th>Fev</th>
                                    <th>Mar</th>
                                    <th>Abr</th>
                                    <th>Mai</th>
                                    <th>Jun</th>
                                    <th>Jul</th>
                                    <th>Ago</th>
                                    <th>Set</th>
                                    <th>Out</th>
                                    <th>Nov</th>
                                    <th>Dez</th>
                                <tr>
                            </thead>
                            <tbody>
                                <tr class="bg-primary">
                                    <td>IDF</td>
                                    <td><?php echo $rJan['idf'];?></td>
                                    <td><?php echo $rFev['idf'];?></td>
                                    <td><?php echo $rMar['idf'];?></td>
                                    <td><?php echo $rAbr['idf'];?></td>
                                    <td><?php echo $rMai['idf'];?></td>
                                    <td><?php echo $rJun['idf'];?></td>
                                    <td><?php echo $rJul['idf'];?></td>
                                    <td><?php echo $rAgo['idf'];?></td>
                                    <td><?php echo $rSet['idf'];?></td>
                                    <td><?php echo $rOut['idf'];?></td>
                                    <td><?php echo $rNov['idf'];?></td>
                                    <td><?php echo $rDez['idf'];?></td>
                                </tr>
                            </tbody>
                        </table>  
                        <table class="table table-bordered table-sm">
                            <thead>
                                <tr class="bg-danger">
                                    <th>IQP</th>
                                    <th><?php echo $rJan['qualidade'];?></th>
                                    <th><?php echo $rFev['qualidade'];?></th>
                                    <th><?php echo $rMar['qualidade'];?></th>
                                    <th><?php echo $rAbr['qualidade'];?></th>
                                    <th><?php echo $rMai['qualidade'];?></th>
                                    <th><?php echo $rJun['qualidade'];?></th>
                                    <th><?php echo $rJul['qualidade'];?></th>
                                    <th><?php echo $rAgo['qualidade'];?></th>
                                    <th><?php echo $rSet['qualidade'];?></th>
                                    <th><?php echo $rOut['qualidade'];?></th>
                                    <th><?php echo $rNov['qualidade'];?></th>
                                    <th><?php echo $rDez['qualidade'];?></th>
                                <tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>RAC Recebimento</td>
                                    <td><?php echo $rJan['recebimento'];?></td>
                                    <td><?php echo $rFev['recebimento'];?></td>
                                    <td><?php echo $rMar['recebimento'];?></td>
                                    <td><?php echo $rAbr['recebimento'];?></td>
                                    <td><?php echo $rMai['recebimento'];?></td>
                                    <td><?php echo $rJun['recebimento'];?></td>
                                    <td><?php echo $rJul['recebimento'];?></td>
                                    <td><?php echo $rAgo['recebimento'];?></td>
                                    <td><?php echo $rSet['recebimento'];?></td>
                                    <td><?php echo $rOut['recebimento'];?></td>
                                    <td><?php echo $rNov['recebimento'];?></td>
                                    <td><?php echo $rDez['recebimento'];?></td>
                                </tr>
                                <tr>
                                    <td>RAC Interna Nível 1</td>
                                    <td><?php echo $rJan['nivel1'];?></td>
                                    <td><?php echo $rFev['nivel1'];?></td>
                                    <td><?php echo $rMar['nivel1'];?></td>
                                    <td><?php echo $rAbr['nivel1'];?></td>
                                    <td><?php echo $rMai['nivel1'];?></td>
                                    <td><?php echo $rJun['nivel1'];?></td>
                                    <td><?php echo $rJul['nivel1'];?></td>
                                    <td><?php echo $rAgo['nivel1'];?></td>
                                    <td><?php echo $rSet['nivel1'];?></td>
                                    <td><?php echo $rOut['nivel1'];?></td>
                                    <td><?php echo $rNov['nivel1'];?></td>
                                    <td><?php echo $rDez['nivel1'];?></td>
                                </tr>
                                <tr>
                                    <td>RAC Interna Nível 2</td>
                                    <td><?php echo $rJan['nivel2'];?></td>
                                    <td><?php echo $rFev['nivel2'];?></td>
                                    <td><?php echo $rMar['nivel2'];?></td>
                                    <td><?php echo $rAbr['nivel2'];?></td>
                                    <td><?php echo $rMai['nivel2'];?></td>
                                    <td><?php echo $rJun['nivel2'];?></td>
                                    <td><?php echo $rJul['nivel2'];?></td>
                                    <td><?php echo $rAgo['nivel2'];?></td>
                                    <td><?php echo $rSet['nivel2'];?></td>
                                    <td><?php echo $rOut['nivel2'];?></td>
                                    <td><?php echo $rNov['nivel2'];?></td>
                                    <td><?php echo $rDez['nivel2'];?></td>
                                </tr>
                                <tr>
                                    <td>Cliente</td>
                                    <td><?php echo $rJan['cliente'];?></td>
                                    <td><?php echo $rFev['cliente'];?></td>
                                    <td><?php echo $rMar['cliente'];?></td>
                                    <td><?php echo $rAbr['cliente'];?></td>
                                    <td><?php echo $rMai['cliente'];?></td>
                                    <td><?php echo $rJun['cliente'];?></td>
                                    <td><?php echo $rJul['cliente'];?></td>
                                    <td><?php echo $rAgo['cliente'];?></td>
                                    <td><?php echo $rSet['cliente'];?></td>
                                    <td><?php echo $rOut['cliente'];?></td>
                                    <td><?php echo $rNov['cliente'];?></td>
                                    <td><?php echo $rDez['cliente'];?></td>
                                </tr>
                                <tr class="table-secondary">
                                    <td>Nota</td>
                                    <td><?php echo $rJan['pontos'];?></td>
                                    <td><?php echo $rFev['pontos'];?></td>
                                    <td><?php echo $rMar['pontos'];?></td>
                                    <td><?php echo $rAbr['pontos'];?></td>
                                    <td><?php echo $rMai['pontos'];?></td>
                                    <td><?php echo $rJun['pontos'];?></td>
                                    <td><?php echo $rJul['pontos'];?></td>
                                    <td><?php echo $rAgo['pontos'];?></td>
                                    <td><?php echo $rSet['pontos'];?></td>
                                    <td><?php echo $rOut['pontos'];?></td>
                                    <td><?php echo $rNov['pontos'];?></td>
                                    <td><?php echo $rDez['pontos'];?></td>
                                </tr>
                                <tr>
                                    <td>RACs Pendentes</td>
                                    <td><?php echo $rJan['qtdePrazo'];?></td>
                                    <td><?php echo $rFev['qtdePrazo'];?></td>
                                    <td><?php echo $rMar['qtdePrazo'];?></td>
                                    <td><?php echo $rAbr['qtdePrazo'];?></td>
                                    <td><?php echo $rMai['qtdePrazo'];?></td>
                                    <td><?php echo $rJun['qtdePrazo'];?></td>
                                    <td><?php echo $rJul['qtdePrazo'];?></td>
                                    <td><?php echo $rAgo['qtdePrazo'];?></td>
                                    <td><?php echo $rSet['qtdePrazo'];?></td>
                                    <td><?php echo $rOut['qtdePrazo'];?></td>
                                    <td><?php echo $rNov['qtdePrazo'];?></td>
                                    <td><?php echo $rDez['qtdePrazo'];?></td>
                                </tr>
                                <tr class="table-secondary">
                                    <td>NOTA</td>
                                    <td><?php echo $rJan['pontos2'];?></td>
                                    <td><?php echo $rFev['pontos2'];?></td>
                                    <td><?php echo $rMar['pontos2'];?></td>
                                    <td><?php echo $rAbr['pontos2'];?></td>
                                    <td><?php echo $rMai['pontos2'];?></td>
                                    <td><?php echo $rJun['pontos2'];?></td>
                                    <td><?php echo $rJul['pontos2'];?></td>
                                    <td><?php echo $rAgo['pontos2'];?></td>
                                    <td><?php echo $rSet['pontos2'];?></td>
                                    <td><?php echo $rOut['pontos2'];?></td>
                                    <td><?php echo $rNov['pontos2'];?></td>
                                    <td><?php echo $rDez['pontos2'];?></td>
                                </tr>
                                <tr>
                                    <td>Qtde Faltantes</td>
                                    <td><?php echo $rJan['qtdeEntrega'];?></td>
                                    <td><?php echo $rFev['qtdeEntrega'];?></td>
                                    <td><?php echo $rMar['qtdeEntrega'];?></td>
                                    <td><?php echo $rAbr['qtdeEntrega'];?></td>
                                    <td><?php echo $rMai['qtdeEntrega'];?></td>
                                    <td><?php echo $rJun['qtdeEntrega'];?></td>
                                    <td><?php echo $rJul['qtdeEntrega'];?></td>
                                    <td><?php echo $rAgo['qtdeEntrega'];?></td>
                                    <td><?php echo $rSet['qtdeEntrega'];?></td>
                                    <td><?php echo $rOut['qtdeEntrega'];?></td>
                                    <td><?php echo $rNov['qtdeEntrega'];?></td>
                                    <td><?php echo $rDez['qtdeEntrega'];?></td>
                                </tr>
                                <tr class="table-secondary">
                                    <td>NOTA</td>
                                    <td><?php echo $rJan['pontos3'];?></td>
                                    <td><?php echo $rFev['pontos3'];?></td>
                                    <td><?php echo $rMar['pontos3'];?></td>
                                    <td><?php echo $rAbr['pontos3'];?></td>
                                    <td><?php echo $rMai['pontos3'];?></td>
                                    <td><?php echo $rJun['pontos3'];?></td>
                                    <td><?php echo $rJul['pontos3'];?></td>
                                    <td><?php echo $rAgo['pontos3'];?></td>
                                    <td><?php echo $rSet['pontos3'];?></td>
                                    <td><?php echo $rOut['pontos3'];?></td>
                                    <td><?php echo $rNov['pontos3'];?></td>
                                    <td><?php echo $rDez['pontos3'];?></td>
                                </tr>
                                <tr>
                                    <td>Qtde fora prazo</td>
                                    <td><?php echo $rJan['fora'];?></td>
                                    <td><?php echo $rFev['fora'];?></td>
                                    <td><?php echo $rMar['fora'];?></td>
                                    <td><?php echo $rAbr['fora'];?></td>
                                    <td><?php echo $rMai['fora'];?></td>
                                    <td><?php echo $rJun['fora'];?></td>
                                    <td><?php echo $rJul['fora'];?></td>
                                    <td><?php echo $rAgo['fora'];?></td>
                                    <td><?php echo $rSet['fora'];?></td>
                                    <td><?php echo $rOut['fora'];?></td>
                                    <td><?php echo $rNov['fora'];?></td>
                                    <td><?php echo $rDez['fora'];?></td>
                                </tr>
                                <tr class="table-secondary">
                                    <td>NOTA</td>
                                    <td><?php echo $rJan['pontos4'];?></td>
                                    <td><?php echo $rFev['pontos4'];?></td>
                                    <td><?php echo $rMar['pontos4'];?></td>
                                    <td><?php echo $rAbr['pontos4'];?></td>
                                    <td><?php echo $rMai['pontos4'];?></td>
                                    <td><?php echo $rJun['pontos4'];?></td>
                                    <td><?php echo $rJul['pontos4'];?></td>
                                    <td><?php echo $rAgo['pontos4'];?></td>
                                    <td><?php echo $rSet['pontos4'];?></td>
                                    <td><?php echo $rOut['pontos4'];?></td>
                                    <td><?php echo $rNov['pontos4'];?></td>
                                    <td><?php echo $rDez['pontos4'];?></td>
                                </tr>
                            </tbody>
                        </table>   
                        <table class="table table-bordered table-sm">
                                <thead>
                                    <tr class="bg-success">
                                        <th>IPE</th>
                                        <th><?php echo $rJan['logistica'];?></th>
                                        <th><?php echo $rFev['logistica'];?></th>
                                        <th><?php echo $rMar['logistica'];?></th>
                                        <th><?php echo $rAbr['logistica'];?></th>
                                        <th><?php echo $rMai['logistica'];?></th>
                                        <th><?php echo $rJun['logistica'];?></th>
                                        <th><?php echo $rJul['logistica'];?></th>
                                        <th><?php echo $rAgo['logistica'];?></th>
                                        <th><?php echo $rSet['logistica'];?></th>
                                        <th><?php echo $rOut['logistica'];?></th>
                                        <th><?php echo $rNov['logistica'];?></th>
                                        <th><?php echo $rDez['logistica'];?></th>
                                    <tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Entregas Realizadas</td>
                                        <td><?php echo $rJan['entrega'];?></td>
                                        <td><?php echo $rFev['entrega'];?></td>
                                        <td><?php echo $rMar['entrega'];?></td>
                                        <td><?php echo $rAbr['entrega'];?></td>
                                        <td><?php echo $rMai['entrega'];?></td>
                                        <td><?php echo $rJun['entrega'];?></td>
                                        <td><?php echo $rJul['entrega'];?></td>
                                        <td><?php echo $rAgo['entrega'];?></td>
                                        <td><?php echo $rSet['entrega'];?></td>
                                        <td><?php echo $rOut['entrega'];?></td>
                                        <td><?php echo $rNov['entrega'];?></td>
                                        <td><?php echo $rDez['entrega'];?></td>
                                    </tr>
                                    <tr>
                                        <td>Entregas com atraso</td>
                                        <td><?php echo $rJan['entregaAtraso'];?></td>
                                        <td><?php echo $rFev['entregaAtraso'];?></td>
                                        <td><?php echo $rMar['entregaAtraso'];?></td>
                                        <td><?php echo $rAbr['entregaAtraso'];?></td>
                                        <td><?php echo $rMai['entregaAtraso'];?></td>
                                        <td><?php echo $rJun['entregaAtraso'];?></td>
                                        <td><?php echo $rJul['entregaAtraso'];?></td>
                                        <td><?php echo $rAgo['entregaAtraso'];?></td>
                                        <td><?php echo $rSet['entregaAtraso'];?></td>
                                        <td><?php echo $rOut['entregaAtraso'];?></td>
                                        <td><?php echo $rNov['entregaAtraso'];?></td>
                                        <td><?php echo $rDez['entregaAtraso'];?></td>
                                    </tr>
                                    <tr class="table-secondary">
                                        <td>NOTA</td>
                                        <td><?php echo $rJan['pontos5'];?></td>
                                        <td><?php echo $rFev['pontos5'];?></td>
                                        <td><?php echo $rMar['pontos5'];?></td>
                                        <td><?php echo $rAbr['pontos5'];?></td>
                                        <td><?php echo $rMai['pontos5'];?></td>
                                        <td><?php echo $rJun['pontos5'];?></td>
                                        <td><?php echo $rJul['pontos5'];?></td>
                                        <td><?php echo $rAgo['pontos5'];?></td>
                                        <td><?php echo $rSet['pontos5'];?></td>
                                        <td><?php echo $rOut['pontos5'];?></td>
                                        <td><?php echo $rNov['pontos5'];?></td>
                                        <td><?php echo $rDez['pontos5'];?></td>
                                    </tr>
                                    <tr>
                                        <td>Quebra/Parada Alpino</td>
                                        <td><?php echo $rJan['quebra'];?></td>
                                        <td><?php echo $rFev['quebra'];?></td>
                                        <td><?php echo $rMar['quebra'];?></td>
                                        <td><?php echo $rAbr['quebra'];?></td>
                                        <td><?php echo $rMai['quebra'];?></td>
                                        <td><?php echo $rJun['quebra'];?></td>
                                        <td><?php echo $rJul['quebra'];?></td>
                                        <td><?php echo $rAgo['quebra'];?></td>
                                        <td><?php echo $rSet['quebra'];?></td>
                                        <td><?php echo $rOut['quebra'];?></td>
                                        <td><?php echo $rNov['quebra'];?></td>
                                        <td><?php echo $rDez['quebra'];?></td>
                                    </tr>
                                    <tr>
                                        <td>Quebra/Parada Cliente</td>
                                        <td><?php echo $rJan['quebraCliente'];?></td>
                                        <td><?php echo $rFev['quebraCliente'];?></td>
                                        <td><?php echo $rMar['quebraCliente'];?></td>
                                        <td><?php echo $rAbr['quebraCliente'];?></td>
                                        <td><?php echo $rMai['quebraCliente'];?></td>
                                        <td><?php echo $rJun['quebraCliente'];?></td>
                                        <td><?php echo $rJul['quebraCliente'];?></td>
                                        <td><?php echo $rAgo['quebraCliente'];?></td>
                                        <td><?php echo $rSet['quebraCliente'];?></td>
                                        <td><?php echo $rOut['quebraCliente'];?></td>
                                        <td><?php echo $rNov['quebraCliente'];?></td>
                                        <td><?php echo $rDez['quebraCliente'];?></td>
                                    </tr>
                                    <tr class="table-secondary">
                                        <td>NOTA</td>
                                        <td><?php echo $rJan['pontos6'];?></td>
                                        <td><?php echo $rFev['pontos6'];?></td>
                                        <td><?php echo $rMar['pontos6'];?></td>
                                        <td><?php echo $rAbr['pontos6'];?></td>
                                        <td><?php echo $rMai['pontos6'];?></td>
                                        <td><?php echo $rJun['pontos6'];?></td>
                                        <td><?php echo $rJul['pontos6'];?></td>
                                        <td><?php echo $rAgo['pontos6'];?></td>
                                        <td><?php echo $rSet['pontos6'];?></td>
                                        <td><?php echo $rOut['pontos6'];?></td>
                                        <td><?php echo $rNov['pontos6'];?></td>
                                        <td><?php echo $rDez['pontos6'];?></td>
                                    </tr>
                                    <tr>
                                        <td>Parada linha Alpino</td>
                                        <td><?php echo $rJan['parada'];?></td>
                                        <td><?php echo $rFev['parada'];?></td>
                                        <td><?php echo $rMar['parada'];?></td>
                                        <td><?php echo $rAbr['parada'];?></td>
                                        <td><?php echo $rMai['parada'];?></td>
                                        <td><?php echo $rJun['parada'];?></td>
                                        <td><?php echo $rJul['parada'];?></td>
                                        <td><?php echo $rAgo['parada'];?></td>
                                        <td><?php echo $rSet['parada'];?></td>
                                        <td><?php echo $rOut['parada'];?></td>
                                        <td><?php echo $rNov['parada'];?></td>
                                        <td><?php echo $rDez['parada'];?></td>
                                    </tr>
                                    <tr>
                                        <td>Parada linha Cliente</td>
                                        <td><?php echo $rJan['paradaCliente'];?></td>
                                        <td><?php echo $rFev['paradaCliente'];?></td>
                                        <td><?php echo $rMar['paradaCliente'];?></td>
                                        <td><?php echo $rAbr['paradaCliente'];?></td>
                                        <td><?php echo $rMai['paradaCliente'];?></td>
                                        <td><?php echo $rJun['paradaCliente'];?></td>
                                        <td><?php echo $rJul['paradaCliente'];?></td>
                                        <td><?php echo $rAgo['paradaCliente'];?></td>
                                        <td><?php echo $rSet['paradaCliente'];?></td>
                                        <td><?php echo $rOut['paradaCliente'];?></td>
                                        <td><?php echo $rNov['paradaCliente'];?></td>
                                        <td><?php echo $rDez['paradaCliente'];?></td>
                                    </tr>
                                    <tr class="table-secondary">
                                        <td>NOTA</td>
                                        <td><?php echo $rJan['pontos7'];?></td>
                                        <td><?php echo $rFev['pontos7'];?></td>
                                        <td><?php echo $rMar['pontos7'];?></td>
                                        <td><?php echo $rAbr['pontos7'];?></td>
                                        <td><?php echo $rMai['pontos7'];?></td>
                                        <td><?php echo $rJun['pontos7'];?></td>
                                        <td><?php echo $rJul['pontos7'];?></td>
                                        <td><?php echo $rAgo['pontos7'];?></td>
                                        <td><?php echo $rSet['pontos7'];?></td>
                                        <td><?php echo $rOut['pontos7'];?></td>
                                        <td><?php echo $rNov['pontos7'];?></td>
                                        <td><?php echo $rDez['pontos7'];?></td>
                                    </tr>
                                </tbody>
                            </table>
                            <table class="table table-bordered table-sm">
                                <thread>
                                    <tr class="bg-primary">
                                        <th>AUDITORIA</th>
                                        <th><?php echo $rJan['auditoria'];?></th>
                                        <th><?php echo $rFev['auditoria'];?></th>
                                        <th><?php echo $rMar['auditoria'];?></th>
                                        <th><?php echo $rAbr['auditoria'];?></th>
                                        <th><?php echo $rMai['auditoria'];?></th>
                                        <th><?php echo $rJun['auditoria'];?></th>
                                        <th><?php echo $rJul['auditoria'];?></th>
                                        <th><?php echo $rAgo['auditoria'];?></th>
                                        <th><?php echo $rSet['auditoria'];?></th>
                                        <th><?php echo $rOut['auditoria'];?></th>
                                        <th><?php echo $rNov['auditoria'];?></th>
                                        <th><?php echo $rDez['auditoria'];?></th>
                                    </tr>
                                    <tr class="bg-primary">
                                        <th>CERT. ISO</th>
                                        <th><?php echo $rJan['pontuacao'];?></th>
                                        <th><?php echo $rFev['pontuacao'];?></th>
                                        <th><?php echo $rMar['pontuacao'];?></th>
                                        <th><?php echo $rAbr['pontuacao'];?></th>
                                        <th><?php echo $rMai['pontuacao'];?></th>
                                        <th><?php echo $rJun['pontuacao'];?></th>
                                        <th><?php echo $rJul['pontuacao'];?></th>
                                        <th><?php echo $rAgo['pontuacao'];?></th>
                                        <th><?php echo $rSet['pontuacao'];?></th>
                                        <th><?php echo $rOut['pontuacao'];?></th>
                                        <th><?php echo $rNov['pontuacao'];?></th>
                                        <th><?php echo $rDez['pontuacao'];?></th>
                                    </tr>
                                </thread>
                            </table>  
                    </div>       
                </div>
                <div class="col-sm-6">
                    <div class="shadow-lg p-3 mb-3 bg-white rounded"> 
                        <canvas id="myChartIPQ" class="chartjs" width="570" height="410" style="display: block; width: 570px; height: 410px;"></canvas>
                        <script>
                            var ctx = document.getElementById('myChartIPQ').getContext('2d');
                            var myChartIPQ = new Chart(ctx, {
                                type: 'bar',
                                data: {
                                    datasets: [{     
                                        label: 'IPQ',                          
                                        data: [<?php echo $rJan['qualidade'];?>,<?php echo $rFev['qualidade'];?>,<?php echo $rMar['qualidade'];?>,<?php echo $rAbr['qualidade'];?>,<?php echo $rMai['qualidade'];?>,<?php echo $rJun['qualidade'];?>,
                                        <?php echo $rJul['qualidade'];?>,<?php echo $rAgo['qualidade'];?>,<?php echo $rSet['qualidade'];?>,<?php echo $rOut['qualidade'];?>,<?php echo $rNov['qualidade'];?>,<?php echo $rDez['qualidade'];?>],
                                        backgroundColor:["rgba(197, 0, 0, 1)","rgba(197, 0, 0, 1)","rgba(197, 0, 0, 1)","rgba(197, 0, 0, 1)","rgba(197, 0, 0, 1)","rgba(197, 0, 0, 1)","rgba(197, 0, 0, 1)","rgba(197, 0, 0, 1)","rgba(197, 0, 0, 1)","rgba(197, 0, 0, 1)","rgba(197, 0, 0, 1)","rgba(197, 0, 0, 1)"],
                                        //borderColor:["rgb(255, 99, 132)","rgb(255, 159, 64)","rgb(255, 205, 86)","rgb(75, 192, 192)","rgb(54, 162, 235)","rgb(153, 102, 255)","rgb(201, 203, 207)"],
                                        borderWidth:1
                                        }],
                                    labels: ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho' , 'Agosto', 'Setembro', 'Outubro', 'Novembro',  'Dezembro'],
                                },
                                options: {
                                    scales:{
                                            yAxes:[
                                                {ticks:{
                                                    beginAtZero:true,
                                                    max: 100
                                                }}
                                                ]},
                                    legend:{
                                        display: 'false',
                                        position: 'top',                        
                                    }
                                }
                            });
                        </script>
                    </div>
                    <div class="shadow-lg p-3 mb-3 bg-white rounded"> 
                        <canvas id="myChartIPE" class="chartjs" width="570" height="410" style="display: block; width: 570px; height: 410px;"></canvas>
                        <script>
                            var ctx = document.getElementById('myChartIPE').getContext('2d');
                            var myChartIPE = new Chart(ctx, {
                                type: 'bar',
                                data: {
                                    datasets: [{     
                                        label: 'IPE',                          
                                        data: [<?php echo $rJan['logistica'];?>,<?php echo $rFev['logistica'];?>,<?php echo $rMar['logistica'];?>,<?php echo $rAbr['logistica'];?>,<?php echo $rMai['logistica'];?>,<?php echo $rJun['logistica'];?>,
                                        <?php echo $rJul['logistica'];?>,<?php echo $rAgo['logistica'];?>,<?php echo $rSet['logistica'];?>,<?php echo $rOut['logistica'];?>,<?php echo $rNov['logistica'];?>,<?php echo $rDez['logistica'];?>],
                                        backgroundColor:[" rgba(0, 133, 28, 1)","rgba(0, 133, 28, 1)","rgba(0, 133, 28, 1)","rgba(0, 133, 28, 1)","rgba(0, 133, 28, 1)","rgba(0, 133, 28, 1)","rgba(0, 133, 28, 1)","rgba(0, 133, 28, 1)","rgba(0, 133, 28, 1)","rgba(0, 133, 28, 1)","rgba(0, 133, 28, 1)","rgba(0, 133, 28, 1)"],
                                        //borderColor:["rgb(255, 99, 132)","rgb(255, 159, 64)","rgb(255, 205, 86)","rgb(75, 192, 192)","rgb(54, 162, 235)","rgb(153, 102, 255)","rgb(201, 203, 207)"],
                                        borderWidth:1
                                        }],
                                    labels: ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho' , 'Agosto', 'Setembro', 'Outubro', 'Novembro',  'Dezembro'],
                                },
                                options: {
                                    legend:{
                                        display: 'false',
                                        position: 'top',                        
                                    }
                                }
                            });
                        </script>
                    </div>
                </div>
            </div>
            <div class="py-2 text-center">
                <p class="lead">Fórmulas:</p>
            </div>
            <div class="row">
                <div class="col-sm-4">  
                    <div class="shadow-lg p-3 mb-3 bg-white rounded">
                        <div class="py-2 text-center">
                            <p class="lead">IDF:</p>
                            <h6>[(ISO * 0,10) + (IQP * 0,45) + (IPE * 0,45) *0,9] + AUD * 0,10</h6>
                        </div>
                    </div> 
                </div>  
                <div class="col-sm-5">  
                    <div class="shadow-lg p-3 mb-3 bg-white rounded">
                        <div class="py-2 text-center">
                            <p class="lead">IPQ:</p>
                            <h6>{ [ (N° RAC’s * 0,50) + (Repostas no Prazo * 0,40) + (Certif de Qualidade * 0,10) ] * 0,8} + IQD (Amostras entregues do prazo * 0,2)</h6>
                        </div>
                    </div> 
                </div> 
                <div class="col-sm-3">  
                    <div class="shadow-lg p-3 mb-3 bg-white rounded">
                        <div class="py-2 text-center">
                            <p class="lead">IPE:</p>
                            <h6>(Índice de entrega * 0,85) + (Fretes especiais * 0,15)</h6>
                        </div>
                    </div> 
                </div>          
            </div>
        </div>
    <?php } ?>
    <?php } ?>
    <?php } ?>
    <?php } ?>
    <?php } ?>
    <?php } ?>
    <?php } ?>
    <?php } ?>
    <?php } ?>
    <?php } ?>
    <?php } ?>
    <?php } ?>
    </body>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</html>    