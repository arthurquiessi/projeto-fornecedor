<?php

include("conexao.php");
error_reporting(E_NOTICE);
ini_set("display_errors",0);
session_start();

if (!isset($_SESSION['usuarioNomeCompleto'])){
    echo "
            <script type=\"text/javascript\">
            window.location.href='../index.php'
                alert(\"FAZER LOGIN\");
            </script>
        ";
}
include('../nav.php');
error_reporting(E_NOTICE);
ini_set("display_errors", 0);

$vPost = $_POST['BuscarCodFor'];
$vGet = $_GET['BuscarCodFor'];

if (empty($vGet)) {
    $busca = $_POST['BuscarCodFor'];
} else {
    $busca = $_GET['BuscarCodFor'];
}

//$busca = $_GET['BuscarCodFor']; //Recebe requisição do html

//echo $busca;

$query = mysqli_query($conn, "SELECT * FROM cadastro WHERE codFor LIKE '%$busca%' LIMIT 1"); //Pré-recarrega busca no banco de dados
$queryDocumentos = mysqli_query($conn, "SELECT * FROM documentos WHERE codFor LIKE '%$busca%' LIMIT 1");
$queryAuditoria = mysqli_query($conn, "SELECT * FROM auditoria WHERE codFor LIKE '%$busca%' LIMIT 1");
$querySgq = mysqli_query($conn,       "SELECT * FROM sgq       WHERE codFor LIKE '%$busca%' LIMIT 1");
$queryContato = mysqli_query($conn, "SELECT * FROM contato WHERE codFor LIKE '%$busca%'");


$numDocumentos = mysqli_num_rows($queryDocumentos);
$numAuditoria = mysqli_num_rows($queryAuditoria);
$numSgq = mysqli_num_rows($querySgq);
$num = mysqli_num_rows($query); //Count informações carregadas pesquisadas do bd

if ($num > 0) { //Se maior que zero, monta tabela html e print na interface

    while ($row = mysqli_fetch_assoc($query)) {

     echo ' <html lang="pt-br">
    <head>
        <!-- Meta tags Obrigatórias -->
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">

        <!--<script>$(function(){$("#nav-placeholder").load("nav.html");});</script> -->
        <!-- Ícone da aba do navegador -->
        <!--<link rel="icon" href="img\iconeTI.ico"> -->

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <link href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css" rel="stylesheet"> <!-- jQUERY Datable -->
        <link href=https://code.jquery.com/jquery-3.4.1.min.js rel="stylesheet">

        <title>Cadastro de Fornecedores</title>
        
    </head>
    <body class="bg-light">
        <div class="py-2 text-center">
            <h3>Cadastro de Fornecedores</h3>
        </div>
        <div class="container-fluid">
            <form action="busca.php" method="POST">
                <div class="form-row">
                    <div class="col-5"></div>
                    <div class="col-md-2">
                        <input type="text" class="form-control form-control-sm" id="BuscarCodFor" name="BuscarCodFor" placeholder="Código do Fornecedor" required>
                    </div>
                    <div class="col">
                        <button type="submit" class="btn btn-primary btn-sm">Procurar</button>
                    </div>
                </div>
            </form>
            <br>
            <div class="card">
                <div class="card-header">
                    <ul class="nav nav-tabs card-header-tabs"  role="tablist">
                        <li class="nav-item"><a class="nav-link active"  id="nav-menu1-tab" role="tab" data-toggle="tab" href="#menu1">Cadastro</a></li>
                        <li class="nav-item"><a class="nav-link"         id="nav-menu2-tab" role="tab" data-toggle="tab" href="#menu2">Documentos</a></li>
                        <li class="nav-item"><a class="nav-link"         id="nav-menu3-tab" role="tab" data-toggle="tab" href="#menu3">Auditoria</a></li>
                        <li class="nav-item"><a class="nav-link"         id="nav-menu3-tab" role="tab" data-toggle="tab" href="#menu4">SGQ</a></li>
                        <li class="nav-item"><a class="nav-link"         id="nav-menu3-tab" role="tab" data-toggle="tab" href="#menu5">Contatos</a></li>
                    </ul>
                </div>
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane active" id="menu1">
                        <div class="card-body">                      
                            <form method="POST" action="gravarregistro.php">
                                <div class="row">
                                    <div class="col-md-2">
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend"><span class="input-group-text" id="inputGroup-sizing-default">ID:</span></div>
                                            <input type="text" class="form-control" id="id" name="id" value="';
        echo $row['id'];
        echo '" aria-describedby="inputGroup-sizing-sm" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend"><span class="input-group-text" id="inputGroup-sizing-default">Fornecedor:</span></div>
                                            <input type="text" class="form-control cadastro" id="fornecedor" name="fornecedor" value="';
        echo $row['fornecedor'];
        echo '"  aria-describedby="inputGroup-sizing-sm" disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend"><span class="input-group-text" id="inputGroup-sizing-default">Código:</span></div>
                                            <input type="text" class="form-control cadastro" id="codfor" name="codfor" value="';
        echo $row['codFor'];
        echo '" aria-describedby="inputGroup-sizing-sm" disabled>
                                        </div>
                                    </div>                                
                                    <div class="col-md-4">
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <label class="input-group-text" for="tipo">Tipo:</label>
                                            </div>
                                            <select class="custom-select cadastro" name="tipo" id="tipo" disabled>
                                                <option selected>';
        echo $row['tipo'];
        echo '</option>
                                                <option value="Qualidade">Qualidade</option>
                                                <option value="Ambiental">Ambiental</option>
                                                <option value="Serviços que não impactam na conformidade do serviço">Serviços que não impactam na conformidade do serviço</option>
                                            </select>
                                         </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <label class="input-group-text" for="fabricante">Tipo:</label>
                                            </div>
                                            <select class="custom-select cadastro" name="fabricante" id="fabricante" disabled>
                                                <option selected>';
        echo $row['fabricante'];
        echo '</option>
                                                <option value="Fabricante matéria-prima">Fabricante matéria-prima</option>
                                                <option value="Distribuidor matéria-prima">Distribuidor matéria-prima</option>
                                                <option value="Componente / Consumível">Componente / Consumível</option>
                                                <option value="Serviços">Serviços</option>
                                                <option value="Outros">Outros</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend"><span class="input-group-text" id="inputGroup-sizing-default">Detalhe:</span></div>
                                            <input type="text" class="form-control cadastro" id="detalhe"  value="';
                                            echo $row['detalhe'];
                                            echo '" name="detalhe" aria-describedby="inputGroup-sizing-sm" disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                                <div class="form-check">
                                                    <input class="form-check-input cadastro" type="checkbox" value="fiat" name="fiat" id="fiat" disabled ';
                                                if ($row['fiat'] == 'fiat') {
                                                    echo 'checked';
                                                }
                                                echo '>
                                                    <label class="form-check-label" for="fiat">Fiat/Iveco</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input cadastro" type="checkbox" value="volvo" name="volvo" id="volvo" disabled ';
                                                        if ($row['volo'] == 'volvo') {
                                                            echo 'checked';
                                                        }
                                                        echo '>
                                                    <label class="form-check-label" for="volvo">Volvo</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input cadastro" type="checkbox" value="mbb" name="mbb" id="mbb" disabled ';
                                                        if ($row['mbb'] == 'mbb') {
                                                            echo 'checked';
                                                        }
                                                        echo '>
                                                    <label class="form-check-label" for="mbb">MBB</label>
                                                </div>
                                        </div>
                                        <div class="col-md-2">
                                                <div class="form-check">
                                                    <input class="form-check-input cadastro" type="checkbox" value="scania" name="scania" id="scania" disabled ';
                                                    if ($row['scania'] == 'scania') {
                                                        echo 'checked';
                                                    }
                                                    echo '>
                                                    <label class="form-check-label" for="scania">Scania/MAN</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input cadastro" type="checkbox" value="daf" name="daf" id="daf" disabled ';
                                                        if ($row['daf'] == 'daf') {
                                                            echo 'checked';
                                                        }
                                                        echo '>
                                                    <label class="form-check-label" for="daf">DAF</label>
                                                </div>
                                    
                                                <div class="form-check">
                                                    <input class="form-check-input cadastro" type="checkbox" value="hpe" name="hpe" id="hpe" disabled ';
                                                        if ($row['hpe'] == 'hpe') {
                                                            echo 'checked';
                                                        }
                                                        echo '>
                                                    <label class="form-check-label" for="hpe">HPE Mitsubishi</label>
                                                </div>
                                                </div>
                                    <div class="col-md-2">
                                                <div class="form-check">
                                                    <input class="form-check-input cadastro" type="checkbox" value="branca" name="branca" id="branca" disabled ';
                                                    if ($row['branca'] == 'branca') {
                                                        echo 'checked';
                                                    }
                                                    echo '>
                                                    <label class="form-check-label" for="branca">Linha Branca</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input cadastro" type="checkbox" value="maquina"  name="maquina" id="maquina" disabled ';
                                                    if ($row['maquina'] == 'maquina') {
                                                        echo 'checked';
                                                    }
                                                    echo '>
                                                    <label class="form-check-label" for="maquina">L. Máq./Equip.</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input cadastro" type="checkbox" value="outras" name="outras" id="outras" disabled ';
                                                    if ($row['outras'] == 'outras') {
                                                        echo 'checked';
                                                    }
                                                    echo '>
                                                    <label class="form-check-label" for="outras">Outras</label>
                                                </div>
                                     </div>
                                    
                                </div>                                        
                                 <div class="row">
                                 <div class="col-md-2">
                                 <div class="input-group mb-3">
                                     <div class="input-group-prepend">
                                         <label class="input-group-text" for="fonte">Fonte:</label>
                                     </div>
                                     <select class="custom-select cadastro" name="fonte" id="fonte" disabled>
                                         <option selected>';
                                     echo $row['fonte'];
                                     echo '</option>
                                         <option value="Fonte Única">Fonte Única</option>
                                         <option value="Indicada pelo Cliente">Indicada pelo Cliente</option>
                                         <option value="Importada">Importada</option>
                                         <option value="Peças de Segurança">Peças de Segurança</option>
                                     </select>
                                 </div>
                             </div>
                                    <div class="col-md-2">
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <label class="input-group-text" for="critico">Critico:</label>
                                            </div>
                                            <select class="custom-select cadastro" name="critico" id="critico" disabled>
                                                <option selected>';
                                            echo $row['critico'];
                                            echo '</option>
                                                <option value="Sim">Sim</option>
                                                <option value="Não">Não</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <label class="input-group-text" for="situacao">Situação:</label>
                                            </div>
                                            <select class="custom-select cadastro"  name="situacao" id="situacao" disabled>
                                                <option selected>';
                                                echo $row['situacao'];
                                                echo '</option>
                                                <option value="Ok">Ok</option>
                                                <option value="Não Ok">Não Ok</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend"><span class="input-group-text" id="inputGroup-sizing-default">Consulta:</span></div>
                                            <input type="date" class="form-control cadastro" id="consulta" name="consulta" value="';
                                            echo $row['consulta'];
                                            echo '" aria-describedby="inputGroup-sizing-sm" disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <label class="input-group-text" for="termo">Termo:</label>
                                            </div>
                                            <select class="custom-select cadastro" name="termo" id="termo" disabled>
                                                <option selected>';
                                                echo $row['termo'];
                                                echo '</option>
                                                <option value="Ok">Ok</option>
                                                <option value="Não Ok">Não Ok</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend"><span class="input-group-text" id="inputGroup-sizing-default">Confid.:</span></div>
                                            <input type="date" class="form-control cadastro" id="confidencialidade" name="confidencialidade" value="';
                                        echo $row['confidencialidade'];
                                        echo '" aria-describedby="inputGroup-sizing-sm" disabled>
                                        </div>
                                    </div>
                               
                                    <div class="col-md-2">
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <label class="input-group-text" for="tResponsabilidade">Termo:</label>
                                            </div>
                                            <select class="custom-select cadastro" name="tresponsabilidade" id="tresponsabilidade" disabled>
                                                <option selected>';
                                        echo $row['tresponsabilidade'];
                                        echo '</option>
                                                <option value="Ok">Ok</option>
                                                <option value="Não Ok">Não Ok</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend"><span class="input-group-text" id="inputGroup-sizing-default">Responsabilidade:</span></div>
                                            <input type="date" class="form-control cadastro" id="responsabilidade" value="';
                                                echo $row['responsabilidade'];
                                                echo '" name="responsabilidade" aria-describedby="inputGroup-sizing-sm" disabled>
                                        </div>
                                    </div>
                                </div> 

                                <div class="row">
                                    <div class="col-md-2"><h6 class="card-title">Ultima modificação:</h6></div>             
                                    <div class="col-md-4">
                                        <div class="input-group mb-4">
                                        <div class="input-group-prepend"><span class="input-group-text" id="inputGroup-sizing-default">Usuario:</span></div>
                                        <input type="text" class="form-control cadastro" id="usuario" value="';
                                            echo $row['usuario'];
                                            echo '" name="usuario" aria-describedby="inputGroup-sizing-sm" readonly>     
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend"><span class="input-group-text" id="inputGroup-sizing-default">Data:</span></div>
                                            <input type="date" class="form-control cadastro" id="dataAtual" value="';
                                            echo $row['dataAtual'];
                                            echo '" name="dataAtual" aria-describedby="inputGroup-sizing-sm" readonly>
                                        </div>
                                    </div>
                                        <div class="col-sm-3">
                                        ';
                                        if ($_SESSION['usuarioNiveisAcessoId'] == "1" or $_SESSION['usuarioNiveisAcessoId'] == "2") {
                                            echo '
                                            <button type="submit" class="btn btn-success  cadastro" disabled>Salvar</button>
                                            <button type="button" class="btn btn-warning " onclick="habilitar()">Editar</button>
                                            <button type="button" class="btn btn-danger" data-toggle="modal" data-excluircodigo=';
                                                echo $row['codFor'];
                                                echo ' data-excluirid=';
                                                echo $row['id'];
                                                echo ' data-excluirfornecedor=';
                                                echo $row['fornecedor'];
                                                echo ' data-target="#excluir">Excluir</button>                                                                                      
                                                                                ';
                                            }
                                            echo '
                                        </div>
                                    </div>
                                </div>                    
                            </form>                   
                        </div>
                        <div role="tabpanel" class="tab-pane" id="menu2">
                        <div class="card-body border-primary mb-3">                       
                            <form class="needs-validation" novalidate method="POST" action="gravarregistroDocumentos.php">
                                <div class="row">
                                    <div class="col-md-1">
                                        <div class="form-group">
                                            <label>Fornecedor:</label>
                                            <input type="text" class="form-control form-control-sm" id="id" name="id" value="';
                                            echo $row['codFor'];
                                            echo '" readonly>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <label >IATF 16949:</label>';
                                        while ($rows_documentos = mysqli_fetch_assoc($queryDocumentos)) {
                                            echo '
                                        <div class="form-check form-check-inline documentos">
                                            <input class="form-check-input ml-2 documentos" type="radio" name="OpIatf" id="OpIatfSim" value="OpIatfSim" onchange="exibir_iatf(this)"';  if ($rows_documentos['iatf'] != '2001-01-01'){ ; echo 'checked'; } echo'  disabled>
                                            <label class="form-check-label documentos" for="OpIatf">Sim</label>
                                         </div>
                                            <div class="form-check form-check-inline">
                                            <input class="form-check-input documentos" type="radio" name="OpIatf" id="OpIatfNao" value="OpIatfNao" onchange="exibir_iatf(this)" ';  if ($rows_documentos['iatf'] == '2001-01-01'){ ; echo 'checked' ; } echo' disabled>
                                            <label class="form-check-label documentos" for="OpIatfNao">Não</label>
                                        </div>
                                        <div class="form-group">
                                            <input type="date" class="form-control form-control-sm documentos" id="iatf" name="iatf"';
                                            if ($rows_documentos['iatf'] == '2001-01-01') {
                                                echo 'style="display:none;"';
                                            } else {
                                                echo ' value="'; echo  $rows_documentos['iatf'];                                              
                                            }
                                            echo '" disabled>  ';

                                            if ($rows_documentos['iatf'] == '2001-01-01') {
                                                echo '<span id="AlertaiatfNao" class="badge badge-pill badge-danger">Sem IATF</span>';
                                            }else{
                                                echo '<span id="AlertaiatfNao" class="badge badge-pill badge-danger"></span>';
                                            }
                                           echo '                            
                                            <script>
                                            function exibir_iatf(val){
                                                if(val.value == "OpIatfNao"){
                                                   document.getElementById("iatf").value = "01/01/0001";
                                                   document.getElementById("iatf").style.display = "none";
                                                   document.getElementById("AlertaiatfNao").style.display = "block";  
                                                   $("#AlertaiatfNao").html("Sem IATF");
                                                   
                                                }else{
                                                    document.getElementById("iatf").style.display = "block";
                                                    document.getElementById("AlertaiatfNao").style.display = "none"; 
                                                }
                                            }
                                            </script>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <label>9001:</label>
                                        <div class="form-check form-check-inline documentos">
                                            <input class="form-check-input ml-2 documentos" type="radio" name="Opv9001" id="Opv9001Sim" value="Opv9001Sim" onchange="exibir_v9001(this)"';  if ($rows_documentos['v9001'] != '2001-01-01'){ ; echo 'checked'; } echo'  disabled>
                                            <label class="form-check-label" for="Opv9001">Sim</label>
                                         </div>
                                            <div class="form-check form-check-inline">
                                            <input class="form-check-input documentos" type="radio" name="Opv9001" id="Opv9001Nao" value="Opv9001Nao"  onchange="exibir_v9001(this)" ';  if ($rows_documentos['v9001'] == '2001-01-01'){ ; echo 'checked' ; } echo' disabled>
                                            <label class="form-check-label" for="Opv9001Nao">Não</label>
                                        </div>
                                        <div class="form-group">
                                            <input type="date" class="form-control form-control-sm documentos" id="v9001" name="v9001"';
                                            if ($rows_documentos['v9001'] == '2001-01-01') {
                                                echo 'style="display:none;"';
                                            } else {
                                                echo ' value="'; echo  $rows_documentos['v9001'];
                                            }
                                            echo '" disabled>';

                                            if ($rows_documentos['v9001'] == '2001-01-01') {
                                                echo '<span id="Alertav9001Nao" class="badge badge-pill badge-danger">Sem ISO 9001</span>';
                                            }else{
                                                echo '<span id="Alertav9001Nao" class="badge badge-pill badge-danger"></span>';
                                            }

                                            echo '
                                        
                                            <script>
                                            function exibir_v9001(val){
                                                if(val.value == "Opv9001Nao"){
                                                    document.getElementById("v9001").value = "01/01/0001";
                                                document.getElementById("v9001").style.display = "none";
                                                document.getElementById("Alertav9001Nao").style.display = "block";
                                                $("#Alertav9001Nao").html("Sem ISO 9001"); 
                                                }else{
                                                    document.getElementById("v9001").style.display = "block";
                                                    document.getElementById("Alertav9001Nao").style.display = "none"; 
                                                }
                                            }
                                            </script>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <label >14001:</label>
                                        <div class="form-check form-check-inline ">
                                            <input class="form-check-input ml-2 documentos" type="radio" name="Opv14001" id="Opv14001Sim" value="Opv14001Sim" onchange="exibir_v14001(this)"';  if ($rows_documentos['v14001'] != '2001-01-01'){ ; echo 'checked'; } echo' disabled>
                                            <label class="form-check-label" for="Opv14001">Sim</label>
                                        </div>
                                            <div class="form-check form-check-inline">
                                            <input class="form-check-input documentos" type="radio" name="Opv14001" id="Opv14001Nao" value="Opv14001Nao" onchange="exibir_v14001(this)" ';  if ($rows_documentos['v14001'] == '2001-01-01'){ ; echo 'checked' ; } echo' disabled>
                                            <label class="form-check-label" for="Opv14001Nao">Não</label>
                                        </div>
                                        <div class="form-group">
                                            <input type="date" class="form-control form-control-sm documentos" id="v14001" name="v14001"';
                                            if ($rows_documentos['v14001'] == '2001-01-01') {
                                                echo 'style="display:none;"';
                                            } else {
                                                echo ' value="'; echo  $rows_documentos['v14001'];
                                            }
                                            echo '" disabled>';

                                            if ($rows_documentos['v14001'] == '2001-01-01') {
                                                echo '<span id="Alertav14001Nao" class="badge badge-pill badge-danger">Sem ISO 14001</span>';
                                            }else{
                                                echo '<span id="Alertav14001Nao" class="badge badge-pill badge-danger"></span>';
                                            }

                                            echo '
                                            <script>
                                            function exibir_v14001(val){
                                                if(val.value == "Opv14001Nao"){
                                                    document.getElementById("v14001").value = "01/01/0001";
                                                document.getElementById("v14001").style.display = "none";
                                                document.getElementById("Alertav14001Nao").style.display = "block"; 
                                                $("#Alertav14001Nao").html("Sem ISO 14001"); 
                                                }else{
                                                    document.getElementById("v14001").style.display = "block";
                                                    document.getElementById("Alertav14001Nao").style.display = "none"; 
                                                }
                                            }
                                            </script>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label>Pontuação:</label>';
                                            if ($rows_documentos['pontuacao'] <= '85') {
                                                echo '
                                                    <style type="text/css">
                                                    #pontuacao {
                                                    color: white;
                                                    border-width: medium;
                                                    border-style: solid;
                                                    border-color: #ff0000;
                                                    background-color: #ff0000;
                                                    }
                                                    </style>
                                                    ';
                                            }else{
                                                echo '
                                                <style type="text/css">
                                                #pontuacao {
                                                color: white;
                                                border-width: medium;
                                                border-style: solid;
                                                border-color: green;
                                                background-color: green;
                                                }
                                                </style>
                                            ';}

                                            echo '
                                            <input type="text" class="form-control form-control-sm documentos" id="pontuacao" name="pontuacao"  style="text-align:center; font-weight: bold;" value="';
                                            echo $rows_documentos['pontuacao'];
                                            echo '" readonly>
                                        </div>
                                    </div>                    
                                </div>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <label>Alvará Municipal:</label>
                                        <div class="form-check form-check-inline ">
                                            <input class="form-check-input ml-2 documentos" type="radio" name="Opmunicipal" id="OpmunicipalSim" value="OpmunicipalSim"  onchange="exibir_municipal(this)"';  if ($rows_documentos['municipal'] != '2001-01-01'){ ; echo 'checked'; } echo' disabled>
                                            <label class="form-check-label" for="Opmunicipal">Sim</label>
                                        </div>
                                            <div class="form-check form-check-inline">
                                            <input class="form-check-input documentos" type="radio" name="Opmunicipal" id="OpmunicipalNao" value="OpmunicipalNao" onchange="exibir_municipal(this)" ';  if ($rows_documentos['municipal'] == '2001-01-01'){ ; echo 'checked' ; } echo' disabled>
                                            <label class="form-check-label" for="OpmunicipalNao">Não</label>
                                        </div>
                                        <div class="form-group">
                                            <input type="date" class="form-control form-control-sm documentos" id="municipal" name="municipal"';
                                            if ($rows_documentos['municipal'] == '2001-01-01') {
                                                echo 'style="display:none;"';
                                            } else {
                                                echo ' value="'; echo  $rows_documentos['municipal'];
                                            }
                                            echo '" disabled>
                                            <script>
                                            function exibir_municipal(val){
                                                if(val.value == "OpmunicipalNao"){
                                                document.getElementById("municipal").style.display = "none";
                                                }else{
                                                    document.getElementById("municipal").style.display = "block";
                                                }
                                            }
                                            </script>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <label>Licença de Operação:</label>
                                        <div class="form-check form-check-inline ">
                                            <input class="form-check-input ml-2 documentos" type="radio" name="Opoperacao" id="OpoperacaoSim" value="OpoperacaoSim" onchange="exibir_operacao(this)"';  if ($rows_documentos['operacao'] != '2001-01-01'){ ; echo 'checked'; } echo' disabled>
                                            <label class="form-check-label" for="Opoperacao">Sim</label>
                                        </div>
                                            <div class="form-check form-check-inline">
                                            <input class="form-check-input documentos" type="radio" name="Opoperacao" id="OpoperacaoNao" value="OpoperacaoNao" onchange="exibir_operacao(this)" ';  if ($rows_documentos['operacao'] == '2001-01-01'){ ; echo 'checked' ; } echo' disabled>
                                            <label class="form-check-label" for="OpoperacaoNao">Não</label>
                                        </div>
                                       
                                        <div class="form-group">
                                            <input type="date" class="form-control form-control-sm documentos" id="operacao" name="operacao"';
                                            if ($rows_documentos['operacao'] == '2001-01-01') {
                                                echo 'style="display:none;"';
                                            } else {
                                                echo ' value="'; echo  $rows_documentos['operacao'];
                                            }
                                            echo '" disabled>
                                            <script>
                                            function exibir_operacao(val){
                                                if(val.value == "OpoperacaoNao"){
                                                document.getElementById("operacao").style.display = "none";
                                                }else{
                                                    document.getElementById("operacao").style.display = "block";
                                                }
                                            }
                                            </script>
                                        </div>
                                    </div>                               
                                    <div class="col-sm-2">
                                        <label>IBAMA:</label>
                                        <div class="form-check form-check-inline ">
                                            <input class="form-check-input ml-2 documentos" type="radio" name="Opibama" id="OpibamaSim" value="OpibamaSim" onchange="exibir_ibama(this)"';  if ($rows_documentos['ibama'] != '2001-01-01'){ ; echo 'checked'; } echo' disabled>
                                            <label class="form-check-label" for="Opibama">Sim</label>
                                        </div>
                                            <div class="form-check form-check-inline">
                                            <input class="form-check-input documentos" type="radio" name="Opibama" id="OpibamaNao" value="OpibamaNao" onchange="exibir_ibama(this)" ';  if ($rows_documentos['ibama'] == '2001-01-01'){ ; echo 'checked' ; } echo' disabled>
                                            <label class="form-check-label" for="OpibamaNao">Não</label>
                                        </div>
                                    
                                        <div class="form-group">
                                            <input type="date" class="form-control form-control-sm documentos" id="ibama" name="ibama"';
                                            if ($rows_documentos['ibama'] == '2001-01-01') {
                                                echo 'style="display:none;"';
                                            } else {
                                                echo ' value="'; echo  $rows_documentos['ibama'];
                                            }
                                            echo '" disabled>
                                            <script>
                                            function exibir_ibama(val){
                                                if(val.value == "OpibamaNao"){
                                                document.getElementById("ibama").style.display = "none";
                                                }else{
                                                    document.getElementById("ibama").style.display = "block";
                                                }
                                            }
                                            </script>
                                        </div>
                                    </div>    
                                    <div class="col-sm-2">
                                        <label>AVCB:</label>
                                        <div class="form-check form-check-inline ">
                                            <input class="form-check-input ml-2 documentos" type="radio" name="Opavcb" id="OpavcbSim" value="OpavcbSim" onchange="exibir_avcb(this)"';  if ($rows_documentos['avcb'] != '2001-01-01'){ ; echo 'checked'; } echo' disabled>
                                            <label class="form-check-label" for="Opavcb">Sim</label>
                                        </div>
                                            <div class="form-check form-check-inline">
                                            <input class="form-check-input documentos" type="radio" name="Opavcb" id="OpavcbNao" value="OpavcbNao" onchange="exibir_avcb(this)" ';  if ($rows_documentos['avcb'] == '2001-01-01'){ ; echo 'checked' ; } echo' disabled>
                                            <label class="form-check-label" for="OpavcbNao">Não</label>
                                        </div>
                                        <div class="form-group">
                                            <input type="date" class="form-control form-control-sm documentos" id="avcb" name="avcb"';
                                            if ($rows_documentos['avcb'] == '2001-01-01') {
                                                echo 'style="display:none;"';
                                            } else {
                                                echo ' value="'; echo  $rows_documentos['avcb'];
                                            }
                                            echo '" disabled>
                                            <script>
                                            function exibir_avcb(val){
                                                if(val.value == "OpavcbNao"){
                                                document.getElementById("avcb").style.display = "none";
                                                }else{
                                                    document.getElementById("avcb").style.display = "block";
                                                }
                                            }
                                            </script>
                                        </div>
                                    </div>  
                                    <div class="col-sm-2">
                                        <label>CADRIs:</label>
                                        <div class="form-check form-check-inline ">
                                            <input class="form-check-input ml-1 documentos" type="radio" name="Opcadris" id="OpcadrisSim" value="OpcadrisSim"  onchange="exibir_cadris(this)"';  if ($rows_documentos['cadris'] != '2001-01-01'){ ; echo 'checked'; } echo' disabled>
                                            <label class="form-check-label" for="Opcadris">Sim</label>
                                        </div>
                                            <div class="form-check form-check-inline">
                                            <input class="form-check-input documentos" type="radio" name="Opcadris" id="OpcadrisNao" value="OpcadrisNao" onchange="exibir_cadris(this)" ';  if ($rows_documentos['cadris'] == '2001-01-01'){ ; echo 'checked' ; } echo' disabled>
                                            <label class="form-check-label" for="OpcadrisNao">Não</label>
                                        </div>
                                        <div class="form-group">
                                            <input type="date" class="form-control form-control-sm documentos" id="cadris" name="cadris"';
                                            if ($rows_documentos['cadris'] == '2001-01-01') {
                                                echo 'style="display:none;"';
                                            } else {
                                                echo ' value="'; echo  $rows_documentos['cadris'];
                                            }
                                            echo '" disabled>
                                            <script>
                                            function exibir_cadris(val){
                                                if(val.value == "OpcadrisNao"){
                                                document.getElementById("cadris").style.display = "none";
                                                }else{
                                                    document.getElementById("cadris").style.display = "block";
                                                }
                                            }
                                            </script>
                                        </div>
                                    </div>   
                                </div>   
                                <div class="row">  
                                    <div class="col-sm-3">
                                        <label>CREA/CRQ/CRBio:</label>
                                        <div class="form-check form-check-inline ">
                                            <input class="form-check-input ml-1 documentos" type="radio" name="Opcrea" id="OpcreaSim" value="OpcreaSim" onchange="exibir_crea(this)"';  if ($rows_documentos['crea'] != '2001-01-01'){ ; echo 'checked'; } echo' disabled>
                                            <label class="form-check-label" for="Opcrea">Sim</label>
                                        </div>
                                            <div class="form-check form-check-inline">
                                            <input class="form-check-input documentos" type="radio" name="Opcrea" id="OpcreaNao" value="OpcreaNao" onchange="exibir_crea(this)"';  if ($rows_documentos['crea'] == '2001-01-01'){ ; echo 'checked'; } echo' disabled>
                                            <label class="form-check-label" for="OpcreaNao">Não</label>
                                        </div>
                                       
                                        <div class="form-group">
                                            <input type="date" class="form-control form-control-sm documentos" id="crea" name="crea"';
                                            if ($rows_documentos['crea'] == '2001-01-01') {
                                                echo 'style="display:none;"';
                                            } else {
                                                echo ' value="'; echo  $rows_documentos['crea'];
                                            }
                                            echo '" disabled>
                                            <script>
                                            function exibir_crea(val){
                                                if(val.value == "OpcreaNao"){
                                                document.getElementById("crea").style.display = "none";
                                                }else{
                                                    document.getElementById("crea").style.display = "block";
                                                }
                                            }
                                            </script>
                                        </div>
                                    </div>                             
                                    <div class="col-sm-3">
                                        <label>Licença Policia Civil:</label>
                                        <div class="form-check form-check-inline ">
                                            <input class="form-check-input ml-1 documentos" type="radio" name="Opcivil" id="OpcivilSim" value="OpcivilSim"  onchange="exibir_civil(this)"';  if ($rows_documentos['civil'] != '2001-01-01'){ ; echo 'checked'; } echo' disabled>
                                            <label class="form-check-label" for="Opcivil">Sim</label>
                                        </div>
                                            <div class="form-check form-check-inline">
                                            <input class="form-check-input documentos" type="radio" name="Opcivil" id="OpcivilNao" value="OpcivilNao" onchange="exibir_civil(this)"';  if ($rows_documentos['civil'] == '2001-01-01'){ ; echo 'checked'; } echo'  disabled>
                                            <label class="form-check-label" for="OpcivilNao">Não</label>
                                        </div>
                                        <div class="form-group">
                                            <input type="date" class="form-control form-control-sm documentos" id="civil" name="civil"';
                                            if ($rows_documentos['civil'] == '2001-01-01') {
                                                echo 'style="display:none;"';
                                            } else {
                                                echo ' value="'; echo  $rows_documentos['civil'];
                                            }
                                            echo '" disabled>
                                            <script>
                                            function exibir_civil(val){
                                                if(val.value == "OpcivilNao"){
                                                document.getElementById("civil").style.display = "none";
                                                }else{
                                                    document.getElementById("civil").style.display = "block";
                                                }
                                            }
                                            </script>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <label>Licença Policia Federal:</label>
                                        <div class="form-check form-check-inline ">
                                            <input class="form-check-input ml-1 documentos" type="radio" name="Oppolicia" id="OppoliciaSim" value="OppoliciaSim" onchange="exibir_policia(this)"';  if ($rows_documentos['policia'] != '2001-01-01'){ ; echo 'checked'; } echo' disabled>
                                            <label class="form-check-label" for="Oppolicia">Sim</label>
                                        </div>
                                            <div class="form-check form-check-inline">
                                            <input class="form-check-input documentos" type="radio" name="Oppolicia" id="OppoliciaNao" value="OppoliciaNao" onchange="exibir_policia(this)"';  if ($rows_documentos['policia'] == '2001-01-01'){ ; echo 'checked'; } echo' disabled>
                                            <label class="form-check-label" for="OppoliciaNao">Não</label>
                                        </div>
                                       
                                        <div class="form-group">
                                            <input type="date" class="form-control form-control-sm documentos" id="policia" name="policia"';
                                            if ($rows_documentos['policia'] == '2001-01-01') {
                                                echo 'style="display:none;"';
                                            } else {
                                                echo ' value="'; echo  $rows_documentos['policia'];
                                            }
                                            echo '" disabled>
                                            <script>
                                            function exibir_policia(val){
                                                if(val.value == "OppoliciaNao"){
                                                document.getElementById("policia").style.display = "none";
                                                }else{
                                                    document.getElementById("policia").style.display = "block";
                                                }
                                            }
                                            </script>
                                        </div>
                                    </div>
                                   
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Licença Exército:</label>
                                            <div class="form-check form-check-inline ">
                                            <input class="form-check-input ml-1 documentos" type="radio" name="Opexercito" id="OpexercitoSim" value="OpexercitoSim" onchange="exibir_exercito(this)"';  if ($rows_documentos['exercito'] != '2001-01-01'){ ; echo 'checked'; } echo' disabled>
                                            <label class="form-check-label" for="Opexercito">Sim</label>
                                        </div>
                                         <div class="form-check form-check-inline">
                                            <input class="form-check-input documentos" type="radio" name="Opexercito" id="OpexercitoNao" value="OpexercitoNao" onchange="exibir_exercito(this)"';  if ($rows_documentos['exercito'] == '2001-01-01'){ ; echo 'checked'; } echo' disabled>
                                            <label class="form-check-label" for="OpexercitoNao">Não</label>
                                        </div>
                                        <div class="form-group">
                                            <input type="date" class="form-control form-control-sm documentos" id="exercito" name="exercito"';
                                            if ($rows_documentos['exercito'] == '2001-01-01') {
                                                echo 'style="display:none;"';
                                            } else {
                                                echo ' value="'; echo  $rows_documentos['exercito'];
                                            }
                                            echo '" disabled>
                                            <script>
                                            function exibir_exercito(val){
                                                if(val.value == "OpexercitoNao"){
                                                document.getElementById("exercito").style.display = "none";
                                                }else{
                                                    document.getElementById("exercito").style.display = "block";
                                                }
                                            }
                                            </script>
                                        </div>
                                    </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Registro ANP/ ANTT:</label>
                                            <div class="form-check form-check-inline ">
                                                <input class="form-check-input ml-1 documentos" type="radio" name="Opanp" id="OpanpSim" value="OpanpSim" onchange="exibir_anp(this)"';  if ($rows_documentos['anp'] != '2001-01-01'){ ; echo 'checked'; } echo'  disabled>
                                                <label class="form-check-label" for="Opanp">Sim</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input documentos" type="radio" name="Opanp" id="OpanpNao" value="OpanpNao" onchange="exibir_anp(this)"';  if ($rows_documentos['anp'] == '2001-01-01'){ ; echo 'checked'; } echo' disabled>
                                                <label class="form-check-label" for="OpanpNao">Não</label>
                                            </div>
                                            <div class="form-group">
                                                <input type="date" class="form-control form-control-sm documentos" id="anp" name="anp"';
                                                if ($rows_documentos['anp'] == '2001-01-01') {
                                                    echo 'style="display:none;"';
                                                } else {
                                                    echo ' value="'; echo  $rows_documentos['anp'];
                                                }
                                                echo '" disabled>
                                                <script>
                                                function exibir_anp(val){
                                                    if(val.value == "OpanpNao"){
                                                    document.getElementById("anp").style.display = "none";
                                                    }else{
                                                        document.getElementById("anp").style.display = "block";
                                                    }
                                                }
                                                </script>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Certificado INMETRO:</label>
                                            <div class="form-check form-check-inline ">
                                            <input class="form-check-input ml-1 documentos" type="radio" name="Opinmetro" id="OpinmetroSim" value="OpinmetroSim" onchange="exibir_inmetro(this)"';  if ($rows_documentos['inmetro'] != '2001-01-01'){ ; echo 'checked'; } echo'  disabled>
                                            <label class="form-check-label" for="Opinmetro">Sim</label>
                                        </div>
                                            <div class="form-check form-check-inline">
                                            <input class="form-check-input documentos" type="radio" name="Opinmetro" id="OpinmetroNao" value="OpinmetroNao" onchange="exibir_inmetro(this)"';  if ($rows_documentos['inmetro'] == '2001-01-01'){ ; echo 'checked'; } echo' disabled>
                                            <label class="form-check-label" for="OpinmetroNao">Não</label>
                                        </div>
                                        <div class="form-group">
                                            <input type="date" class="form-control form-control-sm documentos" id="inmetro" name="inmetro"';
                                            if ($rows_documentos['inmetro'] == '2001-01-01') {
                                                echo 'style="display:none;"';
                                            } else {
                                                echo ' value="'; echo  $rows_documentos['inmetro'];
                                            }
                                            echo '" disabled>
                                            <script>
                                            function exibir_inmetro(val){
                                                if(val.value == "OpinmetroNao"){
                                                document.getElementById("inmetro").style.display = "none";
                                                }else{
                                                    document.getElementById("inmetro").style.display = "block";
                                                }
                                            }
                                            </script>
                                        </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Habilitação MOPP:</label>
                                            <div class="form-check form-check-inline ">
                                            <input class="form-check-input ml-1 documentos" type="radio" name="Opmopp" id="OpmoppSim" value="OpmoppSim" onchange="exibir_mopp(this)"';  if ($rows_documentos['mopp'] != '2001-01-01'){ ; echo 'checked'; } echo' disabled>
                                            <label class="form-check-label" for="Opmopp">Sim</label>
                                        </div>
                                            <div class="form-check form-check-inline">
                                            <input class="form-check-input documentos" type="radio" name="Opmopp" id="OpmoppNao" value="OpmoppNao" onchange="exibir_mopp(this)"';  if ($rows_documentos['mopp'] == '2001-01-01'){ ; echo 'checked'; } echo' disabled>
                                            <label class="form-check-label" for="OpmoppNao">Não</label>
                                        </div>
                                        <div class="form-group">
                                            <input type="date" class="form-control form-control-sm documentos" id="mopp" name="mopp"';
                                            if ($rows_documentos['mopp'] == '2001-01-01') {
                                                echo 'style="display:none;"';
                                            } else {
                                                echo ' value="'; echo  $rows_documentos['mopp'];
                                            }
                                            echo '" disabled>
                                            <script>
                                            function exibir_mopp(val){
                                                if(val.value == "OpmoppNao"){
                                                document.getElementById("mopp").style.display = "none";
                                                }else{
                                                    document.getElementById("mopp").style.display = "block";
                                                }
                                            }
                                            </script>
                                        </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Outros:</label>
                                            <div class="form-check form-check-inline ">
                                            <input class="form-check-input ml-1 documentos" type="radio" name="Opoutros" id="OpoutrosSim" value="OpoutrosSim" onchange="exibir_outros(this)"';  if ($rows_documentos['outros'] != '2001-01-01'){ ; echo 'checked'; } echo' disabled>
                                            <label class="form-check-label" for="Opoutros">Sim</label>
                                        </div>
                                            <div class="form-check form-check-inline">
                                            <input class="form-check-input documentos" type="radio" name="Opoutros" id="OpoutrosNao" value="OpoutrosNao"  onchange="exibir_outros(this)"';  if ($rows_documentos['outros'] == '2001-01-01'){ ; echo 'checked'; } echo' disabled>
                                            <label class="form-check-label" for="OpoutrosNao">Não</label>
                                        </div>
                                        <div class="form-group">
                                            <input type="date" class="form-control form-control-sm documentos" id="outros" name="outros"';
                                            if ($rows_documentos['outros'] == '2001-01-01') {
                                                echo 'style="display:none;"';
                                            } else {
                                                echo ' value="'; echo  $rows_documentos['outros'];
                                            }
                                            echo '" disabled>
                                            <script>
                                            function exibir_outros(val){
                                                if(val.value == "OpoutrosNao"){
                                                document.getElementById("outros").style.display = "none";
                                                }else{
                                                    document.getElementById("outros").style.display = "block";
                                                }
                                            }
                                            </script>
                                        </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Observações:</label>
                                            <input type="text" class="form-control form-control-sm documentos" id="observacoes" name="observacoes" value="';
                                                    echo $rows_documentos['observacoes'];
                                                    echo '" disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <h6 class="card-title">Ultima modificação:</h6>
                                    </div>
                                        <div class="col-md-4">
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend"><span class="input-group-text" id="inputGroup-sizing-default">Usuario:</span></div>
                                                <input type="text" class="form-control documentos" id="usuario" value="';
                                                echo $rows_documentos['usuario'];
                                                echo '" name="usuario" aria-describedby="inputGroup-sizing-sm" readonly>     
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend"><span class="input-group-text" id="inputGroup-sizing-default">Data:</span></div>
                                                <input type="date" class="form-control documentos" id="dataAtual" value="';
                                                echo $rows_documentos['dataAtual'];
                                                echo '" name="dataAtual" aria-describedby="inputGroup-sizing-sm" readonly>
                                            </div>
                                        </div>';}echo '
                                        <div class="col-sm-3">
                                            ';if ($_SESSION['usuarioNiveisAcessoId'] == "1" or $_SESSION['usuarioNiveisAcessoId'] == "3") {
                                                echo '
                                            <button type="submit" class="btn btn-success  documentos" disabled>Salvar</button>
                                            <button type="button" class="btn btn-warning  " onclick="habilitarDocumentos()">Editar</button>
                                            <button type="button" class="btn btn-info   documentos" onclick="CalculaPontuacaoDocumentos()" disabled>Calcular</button>';
                                            }echo '
                                        </div>                        
                                    
                                </div>
                                
                                                       
                                </div>
                                
                               
                                   
                            </form>
                        </div>                     
                        <div role="tabpanel" class="tab-pane" id="menu3">
                        <div class="card-body border-primary mb-3">                       
                            <form method="POST" action="gravarregistroAuditoria.php">
                                <div class="row">
                                    <div class="col-md-1">
                                        <div class="form-group">
                                            <label>Fornecedor:</label>
                                            <input type="text" class="form-control form-control-sm" id="id" name="id" value="';
                                            echo $row['codFor'];
                                            echo '" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label>Nota</label>';
                                            while ($rows_auditoria = mysqli_fetch_assoc($queryAuditoria)) {
                                                echo '<input type="text" class="form-control form-control-sm auditoria" id="nota" name="nota" value="';
                                                echo $rows_auditoria['nota'];
                                                echo '" disabled>
                                        </div>
                                    </div>
                                   <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Realizada em:</label>
                                                <div class="form-check form-check-inline auditoria">
                                                    <input class="form-check-input ml-2 auditoria" type="radio" name="Oprealizado" id="OprealizadoSim" value="OprealizadoSim" onchange="exibir_realizado(this)"';  if ($rows_auditoria['realizado'] != '2001-01-01'){ ; echo 'checked'; } echo'  disabled>
                                                    <label class="form-check-label" for="OprealizadoSim">Sim</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input auditoria" type="radio" name="Oprealizado" id="OprealizadoNao" value="OprealizadoNao"  onchange="exibir_realizado(this)" ';  if ($rows_auditoria['realizado'] == '2001-01-01'){ ; echo 'checked' ; } echo' disabled>
                                                    <label class="form-check-label" for="OprealizadoNao">Não</label>
                                                </div>';
                                                echo '<input type="date" class="form-control form-control-sm auditoria" id="realizado" name="realizado"';
                                                if ($rows_auditoria['realizado'] == '2001-01-01') {
                                                    echo 'style="display:none;"';
                                                } else {
                                                    echo ' value="'; echo  $rows_auditoria['realizado'];
                                                }
                                                echo '" disabled>';

                                                if ($rows_auditoria['realizado'] == '2001-01-01') {
                                                    echo '<span id="AlertarealizadoNao" class="badge badge-pill badge-danger">Sem Auditoria</span>';
                                                }else{
                                                    echo '<span id="AlertarealizadoNao" class="badge badge-pill badge-danger"></span>';
                                                }

                                                echo '
                                                <script>
                                                    function exibir_realizado(val){
                                                        if(val.value == "OprealizadoNao"){
                                                            document.getElementById("realizado").value = "01/01/0001";
                                                        document.getElementById("realizado").style.display = "none";
                                                        document.getElementById("AlertarealizadoNao").style.display = "block";
                                                        $("#AlertarealizadoNao").html("Sem Auditoria"); 
                                                        }else{
                                                            document.getElementById("realizado").style.display = "block";
                                                            document.getElementById("AlertarealizadoNao").style.display = "none"; 
                                                        }
                                                    }
                                                </script>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Programada para:</label>
                                            <div class="form-check form-check-inline auditoria">
                                                <input class="form-check-input ml-2 auditoria" type="radio" name="Opprogramada" id="OpprogramadaSim" value="OpprogramadaSim" onchange="exibir_programada(this)"';  if ($rows_auditoria['programada'] != '2001-01-01'){ ; echo 'checked'; } echo'  disabled>
                                                <label class="form-check-label" for="OpprogramadaSim">Sim</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input auditoria" type="radio" name="Opprogramada" id="OpprogramadaNao" value="OpprogramadaNao"  onchange="exibir_programada(this)" ';  if ($rows_auditoria['programada'] == '2001-01-01'){ ; echo 'checked' ; } echo' disabled>
                                                <label class="form-check-label" for="OpprogramadaNao">Não</label>
                                            </div>';
                                            echo '<input type="date" class="form-control form-control-sm auditoria" id="programada" name="programada"';
                                            if ($rows_auditoria['programada'] == '2001-01-01') {
                                                echo 'style="display:none;"';
                                            } else {
                                                echo ' value="'; echo  $rows_auditoria['programada'];
                                            }
                                            echo '" disabled>';

                                            if ($rows_auditoria['programada'] == '2001-01-01') {
                                                echo '<span id="AlertaprogramadaNao" class="badge badge-pill badge-danger">Sem Programação</span>';
                                            }else{
                                                echo '<span id="AlertaprogramadaNao" class="badge badge-pill badge-danger"></span>';
                                            }

                                            echo '
                                            <script>
                                                function exibir_programada(val){
                                                    if(val.value == "OpprogramadaNao"){
                                                        document.getElementById("programada").value = "01/01/0001";
                                                    document.getElementById("programada").style.display = "none";
                                                    document.getElementById("AlertaprogramadaNao").style.display = "block";
                                                    $("#AlertaprogramadaNao").html("Sem Programação"); 
                                                    }else{
                                                        document.getElementById("programada").style.display = "block";
                                                        document.getElementById("AlertaprogramadaNao").style.display = "none"; 
                                                    }
                                                }
                                            </script>
                                        </div>
                                    </div>                                    
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Relátorio em:</label>
                                                <div class="form-check form-check-inline auditoria">
                                                    <input class="form-check-input ml-2 auditoria" type="radio" name="Oprelatorio" id="OprelatorioSim" value="OprelatorioSim" onchange="exibir_relatorio(this)"';  if ($rows_auditoria['relatorio'] != '2001-01-01'){ ; echo 'checked'; } echo'  disabled>
                                                    <label class="form-check-label" for="OprelatorioSim">Sim</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input auditoria" type="radio" name="Oprelatorio" id="OprelatorioNao" value="OprelatorioNao"  onchange="exibir_relatorio(this)" ';  if ($rows_auditoria['relatorio'] == '2001-01-01'){ ; echo 'checked' ; } echo' disabled>
                                                    <label class="form-check-label" for="OprelatorioNao">Não</label>
                                                </div>';
                                                echo '<input type="date" class="form-control form-control-sm auditoria" id="relatorio" name="relatorio"';
                                                if ($rows_auditoria['relatorio'] == '2001-01-01') {
                                                    echo 'style="display:none;"';
                                                } else {
                                                    echo ' value="'; echo  $rows_auditoria['relatorio'];
                                                }
                                                echo '" disabled>';

                                                if ($rows_auditoria['relatorio'] == '2001-01-01') {
                                                    echo '<span id="AlertarelatorioNao" class="badge badge-pill badge-danger">Sem Relátorio</span>';
                                                }else{
                                                    echo '<span id="AlertarelatorioNao" class="badge badge-pill badge-danger"></span>';
                                                }

                                                echo '
                                                <script>
                                                    function exibir_relatorio(val){
                                                        if(val.value == "OprelatorioNao"){
                                                            document.getElementById("relatorio").value = "01/01/0001";
                                                        document.getElementById("relatorio").style.display = "none";
                                                        document.getElementById("AlertarelatorioNao").style.display = "block";
                                                        $("#AlertarelatorioNao").html("Sem Relátorio"); 
                                                        }else{
                                                            document.getElementById("relatorio").style.display = "block";
                                                            document.getElementById("AlertarelatorioNao").style.display = "none"; 
                                                        }
                                                    }
                                                </script>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Prazo Plano:</label>
                                            <div class="form-check form-check-inline auditoria">
                                                <input class="form-check-input ml-2 auditoria" type="radio" name="Opprazo" id="OpprazoSim" value="OpprazoSim" onchange="exibir_prazo(this)"';  if ($rows_auditoria['prazo'] != '2001-01-01'){ ; echo 'checked'; } echo'  disabled>
                                                <label class="form-check-label" for="OpprazoSim">Sim</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input auditoria" type="radio" name="Opprazo" id="OpprazoNao" value="OpprazoNao"  onchange="exibir_prazo(this)" ';  if ($rows_auditoria['prazo'] == '2001-01-01'){ ; echo 'checked' ; } echo' disabled>
                                                <label class="form-check-label" for="OpprazoNao">Não</label>
                                            </div>';
                                            echo '<input type="date" class="form-control form-control-sm auditoria" id="prazo" name="prazo"';
                                            if ($rows_auditoria['prazo'] == '2001-01-01') {
                                                echo 'style="display:none;"';
                                            } else {
                                                echo ' value="'; echo  $rows_auditoria['prazo'];
                                            }
                                            echo '" disabled>';

                                            if ($rows_auditoria['prazo'] == '2001-01-01') {
                                                echo '<span id="AlertaprazoNao" class="badge badge-pill badge-danger">Sem Relátorio</span>';
                                            }else{
                                                echo '<span id="AlertaprazoNao" class="badge badge-pill badge-danger"></span>';
                                            }

                                            echo '
                                            <script>
                                                function exibir_prazo(val){
                                                    if(val.value == "OpprazoNao"){
                                                        document.getElementById("prazo").value = "01/01/0001";
                                                    document.getElementById("prazo").style.display = "none";
                                                    document.getElementById("AlertaprazoNao").style.display = "block";
                                                    $("#AlertaprazoNao").html("Sem Relátorio"); 
                                                    }else{
                                                        document.getElementById("prazo").style.display = "block";
                                                        document.getElementById("AlertaprazoNao").style.display = "none"; 
                                                    }
                                                }
                                            </script>
                                    </div>
                                </div>                 
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label>Plano entregue:</label>';
            echo '<input type="text" class="form-control form-control-sm auditoria" id="plano" name="plano" value="';
            echo $rows_auditoria['plano'];
            echo '" disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Planejar nova auditoria:</label>
                                            <div class="form-check form-check-inline auditoria">
                                                <input class="form-check-input ml-2 auditoria" type="radio" name="OpPrevisao" id="OpPrevisaoSim" value="OpPrevisaoSim" onchange="exibir_Previsao(this)"';  if ($rows_auditoria['previsao'] != '2001-01-01'){ ; echo 'checked'; } echo'  disabled>
                                                <label class="form-check-label" for="OpPrevisaoSim">Sim</label>
                                            </div>
                                             <div class="form-check form-check-inline">
                                                <input class="form-check-input auditoria" type="radio" name="OpPrevisao" id="OpPrevisaoNao" value="OpPrevisaoNao"  onchange="exibir_Previsao(this)" ';  if ($rows_auditoria['previsao'] == '2001-01-01' || $rows_auditoria['previsao'] == '0000-00-00'){ ; echo 'checked' ; } echo' disabled>
                                                <label class="form-check-label" for="OpPrevisaoNao">Não</label>
                                            </div>';
                                                echo '<input type="date" class="form-control form-control-sm auditoria" id="previsao" name="previsao"';
                                                if ($rows_auditoria['previsao'] == '2001-01-01' || $rows_auditoria['previsao'] == '0000-00-00') {
                                                    echo 'style="display:none;"';
                                                } else {
                                                    echo ' value="'; echo  $rows_auditoria['previsao'];
                                                }
                                                echo '" disabled>';
    
                                                if ($rows_auditoria['previsao'] == '2001-01-01' || $rows_auditoria['previsao'] == '0000-00-00') {
                                                    echo '<span id="AlertaPrevisaoNao" class="badge badge-pill badge-danger">Sem Planejamento</span>';
                                                }else{
                                                    echo '<span id="AlertaPrevisaoNao" class="badge badge-pill badge-danger"></span>';
                                                }
    
                                                echo '
                                                <script>
                                                function exibir_Previsao(val){
                                                    if(val.value == "OpPrevisaoNao"){
                                                        document.getElementById("previsao").value = "01/01/0001";
                                                    document.getElementById("previsao").style.display = "none";
                                                    document.getElementById("AlertaPrevisaoNao").style.display = "block";
                                                    $("#AlertaPrevisaoNao").html("Sem Planejamento"); 
                                                    }else{
                                                        document.getElementById("previsao").style.display = "block";
                                                        document.getElementById("AlertaPrevisaoNao").style.display = "none"; 
                                                    }
                                                }
                                                </script>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label>Classificação:</label>';
            echo '<input type="text" class="form-control form-control-sm auditoria" id="classificacao" name="classificacao" value="';
            echo $rows_auditoria['classificacao'];
            echo '" disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label>Nota Auditoria:</label>';
            echo '<input type="text" class="form-control form-control-sm auditoria" id="auditoria" name="auditoria" value="';
            echo $rows_auditoria['auditoria'];
            echo '" disabled>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <br>           
                                <div class="row">
                                <div class="col-md-2"><h6 class="card-title">Ultima modificação:</h6></div>
                                <div class="col-md-4">
                                    <div class="input-group mb-3">
                                    <div class="input-group-prepend"><span class="input-group-text" id="inputGroup-sizing-default">Usuario:</span></div>
                                    <input type="text" class="form-control auditoria" id="usuario" value="';
                                        echo $rows_auditoria['usuario'];
                                        echo '" name="usuario" aria-describedby="inputGroup-sizing-sm" readonly>     
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend"><span class="input-group-text" id="inputGroup-sizing-default">Data:</span></div>
                                        <input type="date" class="form-control auditoria" id="dataAtual" value="';
                                        echo $rows_auditoria['dataAtual'];
                                        echo '" name="dataAtual" aria-describedby="inputGroup-sizing-sm" readonly>
                                    </div>
                                </div>';
                            }
                            echo '                         
                                        <div class="col-sm-3">
                                        ';
        if ($_SESSION['usuarioNiveisAcessoId'] == "1" or $_SESSION['usuarioNiveisAcessoId'] == "3") {
            echo '
                                            <button type="submit" class="btn btn-success auditoria" disabled>Salvar</button>
                                            <button type="button" class="btn btn-warning" onclick="habilitarAuditoria()">Editar</button>
                                            <button type="button" class="btn btn-info auditoria" onclick="CalculaDataAuditoria()" disabled>Calcular</button>
                                        ';
        }
        echo '
                                        </div>
                                    </div>
                                    
                                    
                                </div>
                                
                            </form>
                        </div>                     
                        <div role="tabpanel" class="tab-pane" id="menu4">
                        <div class="card-body border-primary mb-3">                       
                        <form method="POST" action="gravarregistroSgq.php">
                            <div class="row">
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label>Fornecedor:</label>
                                        <input type="text" class="form-control form-control-sm" id="id" name="id" value="';
        echo $row['codFor'];
        echo '" readonly>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                        <div class="form-group">
                                                <label for="tipo">IATF 16949 Dispensado:</label>';
        while ($rows_sgq = mysqli_fetch_assoc($querySgq)) {
            echo '
                                            <select class="form-control form-control-sm sgq" name="iatfSGQ" id="iatfSGQ" disabled>
                                                <option selected>';
            echo $rows_sgq['iatfSGQ'];
            echo '</option>
                                                <option value="Sim">Sim</option>
                                                <option value="Não">Não</option>
                                            </select>
                                        </div>
                                 </div>                                
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label>Programada:</label>';
            echo '<input type="date" class="form-control form-control-sm sgq" id="programadaSGQ" name="programadaSGQ" value="';
            echo $rows_sgq['programadaSGQ'];
            echo '" disabled>
                                    </div>
                                </div> 
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label>Pontuação:</label>';
            echo '<input type="text" class="form-control form-control-sm sgq" id="pontuacaoSGQ" name="pontuacaoSGQ" value="';
            echo $rows_sgq['pontuacaoSGQ'];
            echo '" disabled>
                                    </div>
                                </div> 
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label>Frequência:</label>';
            echo '<input type="text" class="form-control form-control-sm sgq" id="frequencia" name="frequencia" value="';
            echo $rows_sgq['frequencia'];
            echo '" disabled>
                                    </div>
                                </div> 
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label>Nova auditoria:</label>';
            echo '<input type="date" class="form-control form-control-sm sgq" id="novaSgq" name="novaSgq" value="';
            echo $rows_sgq['nova'];
            echo '" disabled>
                                    </div>
                                </div> 
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label>Desenvolvimento SGQ:</label>';
            echo '<input type="text" class="form-control form-control-sm sgq" id="sgq" name="sgq" value="';
            echo $rows_sgq['sgq'];
            echo '" disabled>
                                    </div>
                                 </div>                             
                            </div>           
                            <div class="row">
                            <div class=col-md-2><h6 class="card-title">Ultima modificação:</h6></div>
                            <div class="col-md-3">
                            <div class="input-group mb-4">
                            <div class="input-group-prepend"><span class="input-group-text" id="inputGroup-sizing-default">Usuario:</span></div>
                            <input type="text" class="form-control sgq" id="usuario" value="';
                                echo $rows_sgq['usuario'];
                                echo '" name="usuario" aria-describedby="inputGroup-sizing-sm" readonly>     
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend"><span class="input-group-text" id="inputGroup-sizing-default">Data:</span></div>
                                <input type="date" class="form-control sgq" id="dataAtual" value="';
                                echo $rows_sgq['dataAtual'];
                                echo '" name="dataAtual" aria-describedby="inputGroup-sizing-sm" readonly>
                            </div>
                        </div>   
                                ';
                            }
                            echo '<div class="col-sm-3">
                                        ';
        if ($_SESSION['usuarioNiveisAcessoId'] == "1" or $_SESSION['usuarioNiveisAcessoId'] == "3") {
            echo '
                                        <button type="button" class="btn btn-info  sgq" onclick="CalculaDataSGQ()" disabled>Calcular</button>
                                        <button type="submit" class="btn btn-success  sgq" disabled>Salvar</button>
                                        <button type="button" class="btn btn-warning " onclick="habilitarSgq()">Editar</button>
                                        
                                        ';
        }
        echo '
                                    </div>
                                </div>
                                
                                
                                                         
                                 
                            </div>
                           
                        </form>
                    </div>
                    
                    <div role="tabpanel" class="tab-pane" id="menu5">
                        <div class="card-body border-primary mb-3">                       
                            <form>
                                <div class="row">
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label>Fornecedor:</label>
                                            <input type="text" class="form-control form-control-sm" id="id" name="id" value="'; echo $row['codFor'];echo '" readonly>
                                        </div>
                                    </div> 
                                    <div class="col-md-1">
                                    <div class="form-group">
                                       <label id="labelContatos">Contato:</label>
                                        <button type="button" class="btn btn-warning btn-sm " onclick="contato()">Cadastrar contato</button>
                                    </div>
                                </div> 
                                </div>     
                                <table id="result" class="table table-hover table-bordered table-sm" style="width:100%">
                                    <thead>
                                        <tr class="thead-dark">
                                            <th scope="col">Nome</th>
                                            <th scope="col">Email</th>
                                            <th scope="col">Telefone</th>
                                            <th scope="col">Observação</th>
                                        </tr>
                                    </thead>
                                    <tbody>';
        while ($rows_contato = mysqli_fetch_assoc($queryContato)) {
            echo '
                                            <tr>
                                                <td>';
            echo $rows_contato['nome'];
            echo '</td>
                                                <td>';
            echo $rows_contato['email'];
            echo '</td>
                                                <td>';
            echo $rows_contato['telefone'];
            echo '</td>
                                                <td>';
            echo $rows_contato['observacao'];
            echo '</td>
                                            </tr>
                                        ';
        }
        echo '
                                    </tbody>
                                </table>
                            </form>
                        </div>             
                </div> 
            </div>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="excluir" tabindex="-1" role="dialog" aria-labelledby="excluir" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Excluir</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form method="POST" action="deletar.php">
                        <div class="modal-body">                                                            
                            <p>Deseja realmente excluir o fornecedor com o código:</p>
                            <input type="text" class="form-control" id="regDeletecod" name="regDeletecod" value=';
        echo $row['codFor'];
        echo ' aria-describedby="inputGroup-sizing-sm" readonly>                                                  
                            <br>
                            <input type="text" class="form-control" id="regDeletefor" name="regDeletefor" value=';
        echo $row['Fornecedor'];
        echo ' aria-describedby="inputGroup-sizing-sm" readonly>                                                  
                            <br>
                            <input type="text" class="form-control" id="regDelete" name="regDelete" value=';
        echo $row['id'];
        echo ' aria-describedby="inputGroup-sizing-sm" readonly>
                            <br>
                            <p>Obs.: Irá excluir o fornecedor e todos os seus cadastros do banco de dados.</p>                                                
                            </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Não</button>
                        <button type="submit" class="btn btn-danger btn-sm">Sim</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>  
                <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
                <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
                <script src="js/moment.js"></script>
                ';
        echo "
                <script>
                $(function() { 
                    document.getElementById('labelContatos').style.color = 'white';
                });

                function habilitarSgq(){
                    var inputs = document.getElementsByClassName('sgq');
                    for(var i = 0; i < inputs.length; i++) {
                        inputs[i].disabled = false;
                    }
                    var selects = document.getElementsByClassName('sgq');
                    for(var i = 0; i < selects.length; i++) {
                        selects[i].disabled = false;
                    }
                    var buttons = document.getElementsByClassName('sgq');
                    for(var i = 0; i < buttons.length; i++) {
                        buttons[i].disabled = false;
                    }
                }
                function habilitarDocumentos(){
                    //alert('entrou');
                    var inputs = document.getElementsByClassName('documentos');
                    for(var i = 0; i < inputs.length; i++) {
                        inputs[i].disabled = false;
                    }
                    var selects = document.getElementsByClassName('documentos');
                    for(var i = 0; i < selects.length; i++) {
                        selects[i].disabled = false;
                    }
                    var buttons = document.getElementsByClassName('documentos');
                    for(var i = 0; i < buttons.length; i++) {
                        buttons[i].disabled = false;
                    }
                }
                function habilitarAuditoria(){
                    //alert('entrou');
                    var inputs = document.getElementsByClassName('auditoria');
                    for(var i = 0; i < inputs.length; i++) {
                        inputs[i].disabled = false;
                    }
                    var selects = document.getElementsByClassName('auditoria');
                    for(var i = 0; i < selects.length; i++) {
                        selects[i].disabled = false;
                    }
                    var buttons = document.getElementsByClassName('auditoria');
                    for(var i = 0; i < buttons.length; i++) {
                        buttons[i].disabled = false;
                    }
                }
                function habilitar(){
                    //alert('entrou');
                    var inputs = document.getElementsByClassName('cadastro');
                    for(var i = 0; i < inputs.length; i++) {
                        inputs[i].disabled = false;
                    }
                    var selects = document.getElementsByClassName('cadastro');
                    for(var i = 0; i < selects.length; i++) {
                        selects[i].disabled = false;
                    }
                    var buttons = document.getElementsByClassName('cadastro');
                    for(var i = 0; i < buttons.length; i++) {
                        buttons[i].disabled = false;
                    }
                }
                function CalculaPontuacaoDocumentos(){
                    var DateHoje = moment().format();
                    if(document.getElementById('OpIatfNao').checked && document.getElementById('Opv14001Nao').checked && document.getElementById('Opv9001Nao').checked){
                        document.getElementById('pontuacao').style.backgroundColor = 'red';
                        document.getElementById('pontuacao').style.borderColor = 'red';
                        document.getElementById('pontuacao').value = '0';
                        
                    }else if(document.getElementById('iatf').value > DateHoje && document.getElementById('v14001').value > DateHoje){
                        document.getElementById('pontuacao').style.backgroundColor = 'green';
                        document.getElementById('pontuacao').style.borderColor = 'green';
                        document.getElementById('pontuacao').value = '100'; 
                        
                    }else if(document.getElementById('iatf').value > DateHoje){
                        document.getElementById('pontuacao').style.backgroundColor = 'green';
                        document.getElementById('pontuacao').style.borderColor = 'green';
                        document.getElementById('pontuacao').value = '95'; 
                        
                    }else if(document.getElementById('v9001').value > DateHoje){
                        document.getElementById('pontuacao').style.backgroundColor = '#ff6600';
                        document.getElementById('pontuacao').style.borderColor = '#ff6600';
                        document.getElementById('pontuacao').value = '85'; 
                        
                    }else if(document.getElementById('iatf').value < DateHoje  || document.getElementById('v9001').value < DateHoje || document.getElementById('v14001').value < DateHoje){
                        document.getElementById('pontuacao').style.backgroundColor = 'red';
                        document.getElementById('pontuacao').style.borderColor = 'red';
                        document.getElementById('pontuacao').value = '0';
                          
                    }
                }
                function CalculaDataAuditoria(){
                    
                    if(document.getElementById('OprealizadoNao').checked){
                        document.getElementById('previsao').style.backgroundColor = 'red';
                        document.getElementById('previsao').style.borderColor = 'red';
                        document.getElementById('previsao').value = '-';
                        
                    }else if(document.getElementById('classificacao').value == 'A'){
                        var convertDatetime = moment(document.getElementById('realizado').value).add(1095, 'days');
                        document.getElementById('previsao').style.backgroundColor = 'green';
                        document.getElementById('previsao').style.borderColor = 'green';
                        document.getElementById('previsao').style.color = 'white';
                        document.getElementById('previsao').value = moment(convertDatetime).format('YYYY-MM-DD');
                    
                        
                    }else if(document.getElementById('classificacao').value == 'B'){
                        var convertDatetime = moment(document.getElementById('realizado').value).add(730, 'days');
                        document.getElementById('previsao').style.backgroundColor = 'green';
                        document.getElementById('previsao').style.borderColor = 'green';
                        document.getElementById('previsao').style.color = 'white';
                        document.getElementById('previsao').value = moment(convertDatetime).format('YYYY-MM-DD'); 
                        
                    }else{
                        var convertDatetime = moment(document.getElementById('realizado').value).add(182, 'days');
                        document.getElementById('previsao').style.backgroundColor = '#ff6600';
                        document.getElementById('previsao').style.borderColor = '#ff6600';
                        document.getElementById('previsao').style.color = 'white';
                        document.getElementById('previsao').value = moment(convertDatetime).format('YYYY-MM-DD');  
                        
                    }
                }
                function CalculaDataSGQ(){
                   
                    if(document.getElementById('iatfSGQ').value == 'Não'){
                        document.getElementById('novaSgq').style.backgroundColor = 'red';
                        document.getElementById('novaSgq').style.borderColor = 'red';
                        document.getElementById('novaSgq').value = '';
                       
                    }
                    else if(document.getElementById('frequencia').value == '3'){
                        var convertDatetime = moment(document.getElementById('programadaSGQ').value).add(1095, 'days');
                        document.getElementById('novaSgq').style.backgroundColor = 'green';
                        document.getElementById('novaSgq').style.borderColor = 'green';
                        document.getElementById('novaSgq').style.color = 'white';
                        document.getElementById('novaSgq').value = moment(convertDatetime).format('YYYY-MM-DD');
                    
                        
                    }
                    else if(document.getElementById('classificacao').value == 'B'){
                        var convertDatetime = moment(document.getElementById('programadaSGQ').value).add(730, 'days');
                        document.getElementById('novaSgq').style.backgroundColor = 'green';
                        document.getElementById('novaSgq').style.borderColor = 'green';
                        document.getElementById('novaSgq').style.color = 'white';
                        document.getElementById('novaSgq').value = moment(convertDatetime).format('YYYY-MM-DD'); 
                        
                    }
                    else{
                        var convertDatetime = moment(document.getElementById('programadaSGQ').value).add(366, 'days');
                        document.getElementById('novaSgq').style.backgroundColor = '#ff6600';
                        document.getElementById('novaSgq').style.borderColor = '#ff6600';
                        document.getElementById('novaSgq').style.color = 'white';
                        document.getElementById('novaSgq').value = moment(convertDatetime).format('YYYY-MM-DD');  
                        
                    }
                }

            function contato(){
                window.location.href='contato.php'
            }
                

            $('#excluir').on('show.bs.modal', function (event) {
                var button = $(event.relatedTarget) 
                var recipient = button.data('excluirfornecedor')
                var recipientid = button.data('excluirid')
                var recipientcod = button.data('excluircodigo') 
                
                var modal = $(this)
                modal.find('.modal-title').text('Fornecedor: ' + recipient)
                modal.find('#regDelete').val(recipientid)
                modal.find('#regDeletefor').val(recipient)
                modal.find('#regDeletecod').val(recipientcod)

            })       
            </script>
</body>
</html>";
    }
} else {
    echo "<script language='javascript' type='text/javascript'>
                    alert('Fornecedor não encontrado!'); 
                    window.location.href='index.php'
                </script>";
}
