<?php
session_start();
error_reporting(E_NOTICE);
ini_set("display_errors",0);



include("conexao.php");


if (!isset($_SESSION['usuarioNomeCompleto'])){
    echo "
            
            <script type=\"text/javascript\">
            window.location.href='../index.php'
                alert(\"FAZER LOGIN\");
            </script>
        ";
}
include('../nav.php');
$query = "SELECT codFor, fornecedor FROM cadastro";
$resultado_codfor = mysqli_query($conn,  $query);
$resultado_codfor_grafico = mysqli_query($conn,  $query);
$resultado_codfor_fornecedor = mysqli_query($conn,  $query);
?>
<html lang="pt-br">

<head>
    <!-- Meta tags Obrigatórias -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="img\arquivos.png">

    <!-- Bootstrap CSS -->
    <link href=https://code.jquery.com/jquery-3.5.1.min.js rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <title>Desempenho de Fornecedores</title>
</head>

<body class="bg-light">
    <div class="container-fluid">
        <br>
        <div class="py-2 text-center">
            <h3>Desempenho de Fornecedores</h2>
                <p class="lead">Cadastro das informações de Desempenho dos Fornecedores.</p>
        </div>
        <div class="shadow-lg p-3 mb-5 bg-white rounded">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalCadastro">Incluir Fornecedor
                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-file-earmark-person" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path d="M4 0h5.5v1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V4.5h1V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2z" />
                    <path d="M9.5 3V0L14 4.5h-3A1.5 1.5 0 0 1 9.5 3z" />
                    <path fill-rule="evenodd" d="M8 11a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
                    <path d="M8 12c4 0 5 1.755 5 1.755V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1v-.245S4 12 8 12z" />
                </svg>
            </button>
            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modalMes">Visualizar Por Mês
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                    <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                </svg>
            </button>
            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modalFornecedor">Visualizar Por Fornecedor
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-bounding-box" viewBox="0 0 16 16">
                    <path d="M1.5 1a.5.5 0 0 0-.5.5v3a.5.5 0 0 1-1 0v-3A1.5 1.5 0 0 1 1.5 0h3a.5.5 0 0 1 0 1h-3zM11 .5a.5.5 0 0 1 .5-.5h3A1.5 1.5 0 0 1 16 1.5v3a.5.5 0 0 1-1 0v-3a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 1-.5-.5zM.5 11a.5.5 0 0 1 .5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 1 0 1h-3A1.5 1.5 0 0 1 0 14.5v-3a.5.5 0 0 1 .5-.5zm15 0a.5.5 0 0 1 .5.5v3a1.5 1.5 0 0 1-1.5 1.5h-3a.5.5 0 0 1 0-1h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 1 .5-.5z"/>
                    <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm8-9a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                </svg>
            </button>
            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modalGrafico">Gerar Gráficos
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-earmark-bar-graph-fill" viewBox="0 0 16 16">
                    <path d="M9.293 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.707A1 1 0 0 0 13.707 4L10 .293A1 1 0 0 0 9.293 0zM9.5 3.5v-2l3 3h-2a1 1 0 0 1-1-1zm.5 10v-6a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zm-2.5.5a.5.5 0 0 1-.5-.5v-4a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v4a.5.5 0 0 1-.5.5h-1zm-3 0a.5.5 0 0 1-.5-.5v-2a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-.5.5h-1z"/>
                </svg>
            </button>
            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modalCopiaMes">Novo Mês
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-folder-plus" viewBox="0 0 16 16">
                    <path d="M.5 3l.04.87a1.99 1.99 0 0 0-.342 1.311l.637 7A2 2 0 0 0 2.826 14H9v-1H2.826a1 1 0 0 1-.995-.91l-.637-7A1 1 0 0 1 2.19 4h11.62a1 1 0 0 1 .996 1.09L14.54 8h1.005l.256-2.819A2 2 0 0 0 13.81 3H9.828a2 2 0 0 1-1.414-.586l-.828-.828A2 2 0 0 0 6.172 1H2.5a2 2 0 0 0-2 2zm5.672-1a1 1 0 0 1 .707.293L7.586 3H2.19c-.24 0-.47.042-.684.12L1.5 2.98a1 1 0 0 1 1-.98h3.672z"/>
                    <path d="M13.5 10a.5.5 0 0 1 .5.5V12h1.5a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0V13h-1.5a.5.5 0 0 1 0-1H13v-1.5a.5.5 0 0 1 .5-.5z"/>
                </svg>
            </button>          
        </div>
    </div>
    <div class="modal fade bd-example-modal-lg" id="modalCopiaMes" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <form method="POST" action="copiaMes.php">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Copiar dados entre períodos</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-row">
                            <p>De:</p>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="mesDe">Mês:</label>
                                <input type="number" class="form-control" id="mesDe" name="mesDe" >
                            </div>

                            <div class="form-group col-md-6">
                                <label for="anoDe">Ano:</label>
                                <input type="number" class="form-control" id="anoDe" name="anoDe" >
                            </div>
                        </div>
                        <div class="form-row">
                            <p>Para:</p>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="mesPara">Mês:</label>
                                <input type="number" class="form-control" id="mesPara" name="mesPara" >
                            </div>

                            <div class="form-group col-md-6">
                                <label for="anoPara">Ano:</label>
                                <input type="number" class="form-control" id="anoPara" name="anoPara" >
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Copiar</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="modal fade bd-example-modal-lg" id="modalMes" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <form method="POST" action="tabelaMes.php">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Visualizar Tabela Mês</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="mes">Mês:</label>
                                <input type="number" class="form-control" id="mes" name="mes" >
                            </div>

                            <div class="form-group col-md-6">
                                <label for="ano">Ano:</label>
                                <input type="number" class="form-control" id="ano" name="ano" >
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Visualizar</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="modal fade bd-example-modal-lg" id="modalCadastro" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <form method="POST" action="cadastrarDesempenho.php">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Adicionar Desempenho</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="Codfor">Fornecedor:</label>
                            <select class="form-control" id="Codfor" name="Codfor">
                            <?php while($rows_codfor = mysqli_fetch_assoc($resultado_codfor)){ ?>
                                <option><?php echo $rows_codfor['codFor']. " - " .$rows_codfor['fornecedor']; ?></opition>
                            <?php } ?>
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="mes">Mês:</label>
                            <input type="number" class="form-control" id="mes" name="mes" >
                        </div>
                        <div class="form-group col-md-4">
                            <label for="ano">Ano:</label>
                            <input type="number" class="form-control" id="ano" name="ano" >
                        </div>
                    </div> 
                    </div>   
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Adicionar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="modal fade bd-example-modal-lg" id="modalGrafico" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <form method="POST" action="grafico.php">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Gerar Gráficos Mensal</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-row">
                            <div class="form-group col-md-8">
                                <label for="CodforGrafico">Fornecedor:</label>
                                <select class="form-control" id="CodforGrafico" name="CodforGrafico">
                                <?php while($rows_codfor_grafico = mysqli_fetch_assoc($resultado_codfor_grafico)){ ?>
                                    <option><?php echo $rows_codfor_grafico['codFor']. " - " .$rows_codfor_grafico['fornecedor']; ?></opition>
                                <?php } ?>
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="ano">Ano:</label>
                                <input type="number" class="form-control" id="anoGrafico" name="anoGrafico" >
                            </div>
                        </div>
                    </div>  
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success">Gerar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="modal fade bd-example-modal-lg" id="modalFornecedor" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <form method="POST" action="tabelaMesFornecedor.php">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Visualização Desempenho por Fornecedor</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="CodforFornecedor">Fornecedor:</label>
                                <select class="form-control" id="CodforFornecedor" name="CodforFornecedor">
                                <?php while($rows_codfor_fornecedor = mysqli_fetch_assoc($resultado_codfor_fornecedor)){ ?>
                                    <option><?php echo $rows_codfor_fornecedor['codFor']. " - " .$rows_codfor_fornecedor['fornecedor'];?></opition>
                                <?php } ?>
                                </select>
                            </div>
                        </div>
                    </div>  
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success">Visualizar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script type="text/javascript" src="js/table.js"></script> 
    <script type="text/javascript">
       $('#modalCadastro').on('show.bs.modal', function(event) {
        yearAtual = new Date().getFullYear();
        var currentTime = new Date()
        monthAtual = currentTime.getMonth() + 1
        var modal = $(this)
        modal.find('#ano').val(yearAtual)
        modal.find('#mes').val(monthAtual)
       })
       $('#modalMes').on('show.bs.modal', function(event) {
        yearAtual = new Date().getFullYear();
        var currentTime = new Date()
        monthAtual = currentTime.getMonth() + 1
        var modal = $(this)
        modal.find('#ano').val(yearAtual)
        modal.find('#mes').val(monthAtual)
       })
       $('#modalCopiaMes').on('show.bs.modal', function(event) {
        yearAtual = new Date().getFullYear();
        var currentTime = new Date()
        monthAtual = currentTime.getMonth() + 1
        var modal = $(this)
        modal.find('#anoDe').val(yearAtual)
        modal.find('#mesDe').val(monthAtual)
        modal.find('#anoPara').val(yearAtual)
        modal.find('#mesPara').val(monthAtual)
       })
       $('#modalGrafico').on('show.bs.modal', function(event) {
        yearAtual = new Date().getFullYear();
        var modal = $(this)
        modal.find('#anoGrafico').val(yearAtual)
       })
     </script>
</html>