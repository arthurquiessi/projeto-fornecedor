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
    ?>
<html lang="pt-br">

    <head>
        <!-- Meta tags Obrigatórias -->
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <!-- <script>$(function(){$("#nav-placeholder").load("nav.html");});</script> -->
        <!-- Ícone da aba do navegador 
        <link rel="icon" href="img\iconeTI.ico">-->
        <!-- Bootstrap CSS -->
        <link href=https://code.jquery.com/jquery-3.5.1.min.js rel="stylesheet">
        <link href=https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js rel="stylesheet">
        <link href=https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css rel="stylesheet">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
          <!-- jQUERY Datable -->
        <title>Pesquisa Fornecedor</title>
    </head>
    <body class="bg-light">
        <div class="container-fluid">
            <br>
            <div class="py-2 text-center">
                <h3>Filtro de Fornecedores</h2>
                <p class="lead">Filtro das informações de Compras, Gestão Ambiental e Documental de Auditorias.</p>
            </div>
                <div class="card text-white bg-info mb-3">
                    <div class="card-header">Filtro para Pesquisa - Selecione os campos</div>
                        <div class="card-body">
                        <a id="checkCadastro" href="#" onclick="checkCadastro();return false;" style="color: #FFF"><p class="card-title">Cadastro:</p></a>
                            <form method="POST" action=lista.php>
                              <div class="container">
                                    <div class="form-row">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" id="checkcodFor" value="checkcodFor" name="checkcodFor">
                                            <label class="form-check-label" for="checkcodFor">Código</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" id="checkFornecedor" name="checkFornecedor" value="checkFornecedor">
                                            <label class="form-check-label" for="checkFornecedor">Fornecedor</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" id="checkTipo" name="checkTipo" value="checkTipo">
                                            <label class="form-check-label" for="checkTipo">Tipo</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" id="checkMDCSO" name="checkMDCSO" value="checkMDCSO">
                                            <label class="form-check-label" for="checkMDCSO">MDCSO</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" id="checkDetalhe" name="checkDetalhe" value="checkDetalhe">
                                            <label class="form-check-label" for="checkDetalhe">Detalhe</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" id="checkCritico" name="checkCritico" value="checkCritico">
                                            <label class="form-check-label" for="checkCritico">Critico</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" id="checkFiat" name="checkFiat" value="checkFiat">
                                            <label class="form-check-label" for="checkFiat">Fiat</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" id="checkVolvo" name="checkVolvo" value="checkVolvo">
                                            <label class="form-check-label" for="checkVolvo">Volvo</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" id="checkMBB" name="checkMBB" value="checkMBB">
                                            <label class="form-check-label" for="checkMBB">MBB</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" id="checkScania" name="checkScania" value="checkScania">
                                            <label class="form-check-label" for="checkScania">Scania</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" id="checkDAF" name="checkDAF" value="checkDAF">
                                            <label class="form-check-label" for="checkDAF">DAF</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" id="checkHPE" name="checkHPE" value="checkHPE">
                                            <label class="form-check-label" for="checkHPE">HPE</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" id="checkBranca" name="checkBranca" value="checkBranca">
                                            <label class="form-check-label" for="checkBranca">L.Branca</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" id="checkMaquina" name="checkMaquina" value="checkMaquina">
                                            <label class="form-check-label" for="checkMaquina">Maquina</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" id="checkOutras" name="checkOutras" value="checkOutras">
                                            <label class="form-check-label" for="checkOutras">Outras</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" id="checkFonte" name="checkFonte" value="checkFonte">
                                            <label class="form-check-label" for="checkFonte">Outras</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" id="checkFinanceiro" name="checkFinanceiro" value="checkFinanceiro">
                                            <label class="form-check-label" for="checkFinanceiro">Financeiro</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" id="checkConsulta" name="checkConsulta" value="checkConsulta">
                                            <label class="form-check-label" for="checkConsulta">Consulta</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" id="checkConfidencialidade" name="checkConfidencialidade" value="checkConfidencialidade">
                                            <label class="form-check-label" for="checkConfidencialidade">Confidencialidade</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" id="checkDConfidencialidade" name="checkDConfidencialidade" value="checkDConfidencialidade">
                                            <label class="form-check-label" for="checkDConfidencialidade">Data Confidencialidade</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" id="checkResponsabilidade" name="checkResponsabilidade" value="checkResponsabilidade">
                                            <label class="form-check-label" for="checkResponsabilidade">Responsabilidade</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" id="checkDResponsabilidade" name="checkDResponsabilidade" value="checkDResponsabilidade">
                                            <label class="form-check-label" for="checkDResponsabilidade">Data Responsabilidade</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-sm-12">
                                        <p class="card-title">Documentos:</p>
                                    </div>
                                    <div class="container">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" id="checkIatf" name="checkIatf" value="checkIatf">
                                            <label class="form-check-label" for="checkIatf">IATF</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" id="checkv9001" name="checkv9001" value="checkv9001">
                                            <label class="form-check-label" for="checkv9001">9001</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" id="checkv14001" name="checkv14001" value="checkv14001">
                                            <label class="form-check-label" for="checkv14001">14001</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" id="checkPontuacao" name="checkPontuacao" value="checkPontuacao">
                                            <label class="form-check-label" for="checkPontuacao">Pontuação</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" id="checkMunicipal" name="checkMunicipal" value="checkMunicipal">
                                            <label class="form-check-label" for="checkMunicipal">Municipal</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" id="checkOperacao" name="checkOperacao" value="checkOperacao">
                                            <label class="form-check-label" for="checkOperacao">Operação</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" id="checkIbama" name="checkIbama" value="checkIbama">
                                            <label class="form-check-label" for="checkIbama">Ibama</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" id="checkAvcb" name="checkAvcb" value="checkAvcb">
                                            <label class="form-check-label" for="checkAvcb">AVCB</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" id="checkCrea" name="checkCrea" value="checkCrea">
                                            <label class="form-check-label" for="checkCrea">CREA</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" id="checkCivil" name="checkCivil" value="checkCivil">
                                            <label class="form-check-label" for="checkCivil">Civil</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" id="checkPolicia" name="checkPolicia" value="checkPolicia">
                                            <label class="form-check-label" for="checkPolicia">Policia</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" id="checkCadris" name="checkCadris" value="checkCadris">
                                            <label class="form-check-label" for="checkCadris">Cadris</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" id="checkExercito" name="checkExercito" value="checkExercito">
                                            <label class="form-check-label" for="checkExercito">Exercito</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" id="checkAnp" name="checkAnp" value="checkAnp">
                                            <label class="form-check-label" for="checkAnp">ANP</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" id="checkInmetro" name="checkInmetro" value="checkInmetro">
                                            <label class="form-check-label" for="checkInmetro">INMERTRO</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" id="checkMOPP" name="checkMOPP" value="checkMOPP">
                                            <label class="form-check-label" for="checkMOPP">MOPP</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" id="checkOutros" name="checkOutros" value="checkOutros">
                                            <label class="form-check-label" for="checkOutros">Outros</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" id="checkObservacao" name="checkObservacao" value="checkObservacao">
                                            <label class="form-check-label" for="checkObservacao">Observação</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-sm-12">
                                        <p class="card-title">Auditoria:</p>
                                    </div>
                                    <div class="container">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" id="checkNota" name="checkNota" value="checkNota">
                                            <label class="form-check-label" for="checkNota">Nota</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" id="checkRealizado" name="checkRealizado" value="checkRealizado">
                                            <label class="form-check-label" for="checkRealizado">Realizado</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" id="checkProgramada" name="checkProgramada" value="checkProgramada">
                                            <label class="form-check-label" for="checkProgramada">Programada</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" id="checkRelatorio" name="checkRelatorio" value="checkRelatorio">
                                            <label class="form-check-label" for="checkRelatorio">Relatorio</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" id="checkPrazo" name="checkPrazo" value="checkPrazo">
                                            <label class="form-check-label" for="checkPrazo">Prazo</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" id="checkPlano" name="checkPlano" value="checkPlano">
                                            <label class="form-check-label" for="checkPlano">Plano</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" id="checkPrevisao" name="checkPrevisao" value="checkPrevisao">
                                            <label class="form-check-label" for="checkPrevisao">Previsão</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" id="checkClassificacao" name="checkClassificacao" value="checkClassificacao">
                                            <label class="form-check-label" for="checkClassificacao">Classificação</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" id="checkAuditoria" name="checkAuditoria" value="checkAuditoria">
                                            <label class="form-check-label" for="checkAuditoria">Auditoria</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-sm-12">
                                        <p class="card-title">SGQ:</p>
                                    </div>
                                    <div class="container">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" id="checkIatfSGQ" name="checkIatfSGQ" value="checkIatfSGQ">
                                            <label class="form-check-label" for="checkIatfSGQ">IATF</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" id="checkProgramadaSGQ" name="checkProgramadaSGQ" value="checkProgramadaSGQ">
                                            <label class="form-check-label" for="checkProgramadaSGQ">Programada</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" id="checkPontuacaoSGQ" name="checkPontuacaoSGQ" value="checkPontuacaoSGQ">
                                            <label class="form-check-label" for="checkPontuacaoSGQ">Pontuação</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" id="checkFrequencia" name="checkFrequencia" value="checkFrequencia">
                                            <label class="form-check-label" for="checkFrequencia">Frequencia</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" id="checkNova" name="checkNova" value="checkNova">
                                            <label class="form-check-label" for="checkNova">Nova</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" id="checkSGQ" name="checkSGQ" value="checkSGQ">
                                            <label class="form-check-label" for="checkSGQ">SGQ</label>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <br>
                                <input type="submit" class="btn btn-dark btn-sm btn-block" id="filtrar" value="Filtrar"/>
                            </form>
                        </div>
                    </div>
                </div>
        </div>

        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
        <script src="//code.jquery.com/jquery-3.5.1.min.js"></script> 
        <script src="//cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
        <script>
            function checkCadastro() {
                document.getElementById("checkcodFor").checked = true;
                document.getElementById("checkFornecedor").checked = true;
                document.getElementById("checkTipo").checked = true;
                document.getElementById("checkMDCSO").checked = true;
                document.getElementById("checkDetalhe").checked = true;
                document.getElementById("checkCritico").checked = true;
                document.getElementById("checkFiat").checked = true;
                document.getElementById("checkVolvo").checked = true;
                document.getElementById("checkMBB").checked = true;
                document.getElementById("checkScania").checked = true;
                document.getElementById("checkDAF").checked = true;
                document.getElementById("checkHPE").checked = true;
                document.getElementById("checkBranca").checked = true;
                document.getElementById("checkMaquina").checked = true;
                document.getElementById("checkOutras").checked = true;
                document.getElementById("checkFonte").checked = true;
                document.getElementById("checkFinanceiro").checked = true;
                document.getElementById("checkConsulta").checked = true;
                document.getElementById("checkConfidencialidade").checked = true;
                document.getElementById("checkDConfidencialidade").checked = true;
                document.getElementById("checkResponsabilidade").checked = true;
                document.getElementById("checkDResponsabilidade").checked = true;
               }
        </script>
</html>

