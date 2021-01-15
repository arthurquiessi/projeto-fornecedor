<?php
    //include('nav.php');
    session_start();
    error_reporting(E_NOTICE);
    ini_set("display_errors",0);

    if (!isset($_SESSION['usuarioNomeCompleto'])){
        echo "
        <script type=\"text/javascript\">
         window.location.href='index.php'
					alert(\"FAZER LOGIN\");
				</script>
			";
    }

   include_once('conexao.php');
    $sql = "SELECT * FROM cadastro";
    $resultado = mysqli_query($conn,  $sql);
    $total = mysqli_num_rows($resultado);

    $ambiental = "SELECT * FROM cadastro where tipo = 'Ambiental' ";
    $resultadoAmbiental = mysqli_query($conn,  $ambiental);
    $totalAmbiental = mysqli_num_rows($resultadoAmbiental);

    $qualidade = "SELECT * FROM cadastro where tipo = 'Qualidade' ";
    $resultadoQuanlidade = mysqli_query($conn,  $qualidade);
    $totalQualidade = mysqli_num_rows($resultadoQuanlidade);

    $servico = "SELECT * FROM cadastro where tipo = 'Servicos' ";
    $resultadoServico = mysqli_query($conn,  $servico);
    $totalServico = mysqli_num_rows($resultadoServico);

?>
<html lang="pt-br">
    <head>
        <!-- Meta tags Obrigatórias -->
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">

        

        <!-- Ícone da aba do navegador -->
        <link rel="icon" href="img\arquivos.png">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <link href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css" rel="stylesheet"> <!-- jQUERY Datable -->
        <link href=https://code.jquery.com/jquery-3.4.1.min.js rel="stylesheet">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js"></script>

        <title>Gestão de Fornecedores</title>
    </head>
    <body class="bg-light">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="py-5 text-center">
                        <a  href="#"><img class="d-block mx-auto mb-4" src="img\logoalpino.png" alt="" width="250" height="90"></a>
                        <h2>Gestão de Fornecedores</h2>
                        <p class="lead">Sistema para gestão das informações de Compras, Ambiental e Documental de Fornecedores.</p>                       
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="py-5 text-center">
                        <ul class="list-group mb-6">
                            <li class="list-group-item d-flex justify-content-between lh-condensed">
                                <div><h6 class="my-0">Usuário:</h6></div>
                                <span class="text-muted"><?php echo $_SESSION['usuarioNomeCompleto']; ?></span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between lh-condensed">
                                <div><h6 class="my-0">Acesso:</h6></div>
                                <span class="text-muted"><?php if($_SESSION['usuarioNiveisAcessoId'] == "1"){ echo "Administrador";}elseif($_SESSION['usuarioNiveisAcessoId'] == "2"){echo "Compras";}elseif($_SESSION['usuarioNiveisAcessoId'] == "3"){echo "SGI";}elseif($_SESSION['usuarioNiveisAcessoId'] == "4"){echo "Consulta";} ?></span>
                            </li>
                            <li class="list-group-item d-flex justify-content-center lh-condensed">
                                <span class="text-center" data-toggle="modal" data-target="#ModalSair">Sair</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <main role="main" class="flex-shrink-0">
                <div class="row">
                    <div class="col">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="card text-center text-white bg-primary mb-3">
                                    <div class="card-header">Cadastro
                                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-person-badge-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" d="M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2zm4.5 0a.5.5 0 0 0 0 1h3a.5.5 0 0 0 0-1h-3zM8 11a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm5 2.755C12.146 12.825 10.623 12 8 12s-4.146.826-5 1.755V14a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1v-.245z"/>
                                        </svg>
                                    </div>
                                <div class="card-body">
                                    <p class="card-text">Cadastros das informações de Compras, Gestão Ambiental e Documental de Auditorias.</p>
                                    <a href="cadastro\index.php" class="btn btn-outline-light btn-sm">Novo</a>
                                    <a href="cadastro\busca.php?BuscarCodFor=10713" class="btn btn-outline-light btn-sm">Alterar</a>
                                </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="card text-center text-white bg-primary mb-3">
                                    <div class="card-header">Filtro avançado
                                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-search" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" d="M10.442 10.442a1 1 0 0 1 1.415 0l3.85 3.85a1 1 0 0 1-1.414 1.415l-3.85-3.85a1 1 0 0 1 0-1.415z"/>
                                            <path fill-rule="evenodd" d="M6.5 12a5.5 5.5 0 1 0 0-11 5.5 5.5 0 0 0 0 11zM13 6.5a6.5 6.5 0 1 1-13 0 6.5 6.5 0 0 1 13 0z"/>
                                        </svg>
                                    </div>
                                    <div class="card-body">
                                        <p class="card-text">Filtro das informações de Compras, Gestão Ambiental e Documental de Auditorias.</p>
                                        <a href="cadastro\tabela.php" class="btn btn-outline-light btn-sm">Visitar</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="card text-center text-white bg-primary mb-3">
                                    <div class="card-header">Contatos
                                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-person-badge-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" d="M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2zm4.5 0a.5.5 0 0 0 0 1h3a.5.5 0 0 0 0-1h-3zM8 11a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm5 2.755C12.146 12.825 10.623 12 8 12s-4.146.826-5 1.755V14a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1v-.245z"/>
                                        </svg>
                                    </div>
                                <div class="card-body">
                                    <p class="card-text">Cadastros das informações de Contatos dos Fornecedores.</p>
                                    <a href="cadastro\contato.php" class="btn btn-outline-light btn-sm">Pesquisar</a>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>                   
                    <div class="col-md-4 order-md-2 mb-4">
                        <h4 class="d-flex justify-content-between align-items-center mb-3">
                            <span class="text-muted">Cadastrados</span>
                            <span class="badge badge-secondary badge-success badge-pill"><?php echo $total; ?></span>
                        </h4>
                        <ul class="list-group mb-3">
                            <li class="list-group-item d-flex justify-content-between lh-condensed">
                            <div>
                                <h6 class="my-0">Ambiental</h6>
                            </div>
                            <span class="text-muted"><?php echo $totalAmbiental; ?></span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between lh-condensed">
                            <div>
                                <h6 class="my-0">Qualidade</h6>
                            </div>
                            <span class="text-muted"><?php echo $totalQualidade; ?></span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between lh-condensed">
                            <div>
                                <h6 class="my-0">Serviço</h6>
                            </div>
                            <span class="text-muted"><?php echo $totalServico; ?></span>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-6">
                    <canvas id="myChart" class="chartjs"></canvas>
                    <script>
                        var ctx = document.getElementById('myChart').getContext('2d');
                        var myChart = new Chart(ctx, {
                            type: 'doughnut',
                            data: {
                                labels: ['Ambiental', 'Qualidade', 'Serviço'],
                                datasets: [{
                                    label: '# of Votes',
                                    data: [<?php echo $totalAmbiental; ?>,<?php echo $totalQualidade; ?>, <?php echo $totalServico; ?>],
                                    backgroundColor:["rgb(255, 99, 132)","rgb(54, 162, 235)","rgb(255, 205, 86)"]
                                   }]
                            },
                            options: {
                               
                            }
                        });
                    </script>
                    </div>
            </main>
            <footer class="footer mt-auto py-3">
                <div class="container">
                    <span class="text-muted">ALPINO INDUSTRIA METALURGICA LTDA - 2020</span>
                </div>
            </footer>
        </div>
        <div class="modal fade" id="ModalSair" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Deseja realmente sair?</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="sair.php" class="form-signin">
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">Sim</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>  <!--AJAX -->
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    </body> 
</html>


