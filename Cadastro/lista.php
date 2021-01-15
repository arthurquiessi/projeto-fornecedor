<?php
/*error_reporting( E_ALL ^E_NOTICE ); 
    session_start();
    if (!isset($_SESSION['usuarioNome'])){
        echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://192.168.1.29/recebimento/'>
				<script type=\"text/javascript\">
					alert(\"FAZER LOGIN\");
				</script>
			";
    }*/



include_once('conexao.php');
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
//include('tabela.php');


$checkcodFor = $_POST['checkcodFor'];
$checkFornecedor = $_POST['checkFornecedor'];
$checkTipo = $_POST['checkTipo'];
$checkMDCSO = $_POST['checkMDCSO'];
$checkDetalhe = $_POST['checkDetalhe'];
$checkCritico = $_POST['checkCritico'];
$checkFiat = $_POST['checkFiat'];
$checkVolvo = $_POST['checkVolvo'];
$checkMBB = $_POST['checkMBB'];
$checkScania = $_POST['checkScania'];
$checkDAF = $_POST['checkDAF'];
$checkHPE = $_POST['checkHPE'];
$checkBranca = $_POST['checkBranca'];
$checkMaquina = $_POST['checkMaquina'];
$checkOutras = $_POST['checkOutras'];
$checkFonte = $_POST['checkFonte'];
$checkFinanceiro = $_POST['checkFinanceiro'];
$checkConsulta = $_POST['checkConsulta'];
$checkConfidencialidade = $_POST['checkConfidencialidade'];
$checkDConfidencialidade = $_POST['checkDConfidencialidade'];
$checkResponsabilidade = $_POST['checkResponsabilidade'];
$checkDResponsabilidade = $_POST['checkDResponsabilidade'];
$checkIatf = $_POST['checkIatf'];
$checkv9001 = $_POST['checkv9001'];
$checkv14001 = $_POST['checkv14001'];
$checkPontuacao = $_POST['checkPontuacao'];
$checkMunicipal = $_POST['checkMunicipal'];
$checkOperacao = $_POST['checkOperacao'];
$checkIbama = $_POST['checkIbama'];
$checkAvcb = $_POST['checkAvcb'];
$checkCrea = $_POST['checkCrea'];
$checkCivil = $_POST['checkCivil'];
$checkPolicia = $_POST['checkPolicia'];
$checkCadris = $_POST['checkCadris'];
$checkExercito = $_POST['checkExercito'];
$checkAnp = $_POST['checkAnp'];
$checkInmetro = $_POST['checkInmetro'];
$checkMOPP = $_POST['checkMOPP'];
$checkOutros = $_POST['checkOutros'];
$checkObservacao = $_POST['checkObservacao'];
$checkNota = $_POST['checkNota'];
$checkRealizado = $_POST['checkRealizado'];
$checkProgramada = $_POST['checkProgramada'];
$checkRelatorio = $_POST['checkRelatorio'];
$checkPrazo = $_POST['checkPrazo'];
$checkPlano = $_POST['checkPlano'];
$checkPrevisao = $_POST['checkPrevisao'];
$checkClassificacao = $_POST['checkClassificacao'];
$checkAuditoria = $_POST['checkAuditoria'];

$checkIatfSGQ = $_POST['checkIatfSGQ'];
$checkProgramadaSGQ = $_POST['checkProgramadaSGQ'];
$checkPontuacaoSGQ = $_POST['checkPontuacaoSGQ'];
$checkFrequencia = $_POST['checkFrequencia'];
$checkNova = $_POST['checkNova'];
$checkSGQ = $_POST['checkSGQ'];

$hoje = date('Y/m/d');


//echo "<script>alert('".$checkcodFor."');</script>";
//echo "<script>alert('".$checkFornecedor."');</script>";

$query = mysqli_query($conn, "SELECT * FROM cadastro INNER JOIN documentos ON cadastro.codFor = documentos.codFor INNER JOIN auditoria ON cadastro.codFor = auditoria.codFor INNER JOIN sgq ON cadastro.codFor = sgq.codFor  ORDER BY cadastro.codFor;");
$num = mysqli_num_rows($query);
//$query = mysqli_query($conn, "SELECT * FROM cadastro order by id asc"); //Pré-recarrega busca no banco de dados
//$num = mysqli_num_rows($query); //Count informações carregadas pesquisadas do bd
//$queryDocumentos = mysqli_query($conn, "SELECT * FROM documentos order by codFor asc"); //Pré-recarrega busca no banco de dados
//$numDocumentos = mysqli_num_rows($queryDocumentos); //Count informações carregadas pesquisadas do bd

?>
<html lang="pt-br">

<head>
    <!-- Meta tags Obrigatórias -->
    <meta charset="UTF-8">
    <!-- <script>$(function(){$("#nav-placeholder").load("nav.html");});</script> -->

    <!-- Ícone da aba do navegador 
        <link rel="icon" href="img\iconeTI.ico">-->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css" rel="stylesheet" />
    
    
    <link href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css" rel="stylesheet" />
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.bootstrap4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.colVis.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#result').DataTable({
                dom: 'Bfrtip',
                buttons: ['copy', 'excel', 'pdf', 'print', 'colvis']
            });
            table.buttons().container().appendTo('#result_wrapper .col-md-6:eq(0)');
        });
    </script>

    <title>Pesquisa Fornecedor</title>
</head>

<body>

    <div class="container-fluid">
        <br>
        <div class="py-2 text-center">
            <h3>Filtro de Fornecedores</h2>
                <p class="lead">Filtro das informações de Compras, Gestão Ambiental e Documental de Auditorias.</p>
        </div>

        <div class="card">
            <div class="card-body">
                <table id="result" class="table table-striped table-bordered display" style="width:100%">
                    <!-- Início da tabela -->
                    <thead>
                        <!-- Cabeçalho da tabela -->
                        <tr>
                            <th scope="col">ID</th>
                            <?php if ($checkcodFor == "checkcodFor") {
                                echo '<th scope="col">Código</th>';
                            }; ?>
                            <?php if ($checkFornecedor == "checkFornecedor") {
                                echo '<th scope="col">Fornecedor</th>';
                            }; ?>
                            <?php if ($checkTipo == "checkTipo") {
                                echo '<th scope="col">Tipo</th>';
                            }; ?>
                            <?php if ($checkMDCSO == "checkMDCSO") {
                                echo '<th scope="col">MDCSO</th>';
                            }; ?>
                            <?php if ($checkDetalhe == "checkDetalhe") {
                                echo '<th scope="col">Detalhe</th>';
                            }; ?>
                            <?php if ($checkCritico == "checkCritico") {
                                echo '<th scope="col">Critico</th>';
                            }; ?>
                            <?php if ($checkFiat == "checkFiat") {
                                echo '<th scope="col">Fiat</th>';
                            }; ?>
                            <?php if ($checkVolvo == "checkVolvo") {
                                echo '<th scope="col">Volvo</th>';
                            }; ?>
                            <?php if ($checkMBB == "checkMBB") {
                                echo '<th scope="col">MBB</th>';
                            }; ?>
                            <?php if ($checkScania == "checkScania") {
                                echo '<th scope="col">Scania</th>';
                            }; ?>
                            <?php if ($checkDAF == "checkDAF") {
                                echo '<th scope="col">DAF</th>';
                            }; ?>
                            <?php if ($checkHPE == "checkHPE") {
                                echo '<th scope="col">HPE</th>';
                            }; ?>
                            <?php if ($checkBranca == "checkBranca") {
                                echo '<th scope="col">Branca</th>';
                            }; ?>
                            <?php if ($checkMaquina == "checkMaquina") {
                                echo '<th scope="col">Maquina</th>';
                            }; ?>
                            <?php if ($checkOutras == "checkOutras") {
                                echo '<th scope="col">Outras</th>';
                            }; ?>
                            <?php if ($checkFonte == "checkFonte") {
                                echo '<th scope="col">Fonte</th>';
                            }; ?>
                            <?php if ($checkFinanceiro == "checkFinanceiro") {
                                echo '<th scope="col">Financeiro</th>';
                            }; ?>
                            <?php if ($checkConsulta == "checkConsulta") {
                                echo '<th scope="col">Consulta</th>';
                            }; ?>
                            <?php if ($checkConfidencialidade == "checkConfidencialidade") {
                                echo '<th scope="col">Confidencialidade</th>';
                            }; ?>
                            <?php if ($checkDConfidencialidade == "checkDConfidencialidade") {
                                echo '<th scope="col">Data</th>';
                            }; ?>
                            <?php if ($checkResponsabilidade == "checkResponsabilidade") {
                                echo '<th scope="col">Responsabilidade</th>';
                            }; ?>
                            <?php if ($checkDResponsabilidade == "checkDResponsabilidade") {
                                echo '<th scope="col">Data</th>';
                            }; ?>
                            <?php if ($checkIatf == "checkIatf") {
                                echo '<th scope="col">IATF</th>';
                            }; ?>
                            <?php if ($checkv9001 == "checkv9001") {
                                echo '<th scope="col">9001</th>';
                            }; ?>
                            <?php if ($checkv14001 == "checkv14001") {
                                echo '<th scope="col">14001</th>';
                            }; ?>
                            <?php if ($checkPontuacao == "checkPontuacao") {
                                echo '<th scope="col">Pontuação</th>';
                            }; ?>
                            <?php if ($checkMunicipal == "checkMunicipal") {
                                echo '<th scope="col">Municipal</th>';
                            }; ?>
                            <?php if ($checkOperacao == "checkOperacao") {
                                echo '<th scope="col">Operação</th>';
                            }; ?>
                            <?php if ($checkIbama == "checkIbama") {
                                echo '<th scope="col">Ibama</th>';
                            }; ?>
                            <?php if ($checkAvcb == "checkAvcb") {
                                echo '<th scope="col">AVCB</th>';
                            }; ?>
                            <?php if ($checkCrea == "checkCrea") {
                                echo '<th scope="col">CREA</th>';
                            }; ?>
                            <?php if ($checkCivil == "checkCivil") {
                                echo '<th scope="col">CIVIL</th>';
                            }; ?>
                            <?php if ($checkPolicia == "checkPolicia") {
                                echo '<th scope="col">Policia</th>';
                            }; ?>
                            <?php if ($checkCadris == "checkCadris") {
                                echo '<th scope="col">CADRIS</th>';
                            }; ?>
                            <?php if ($checkExercito == "checkExercito") {
                                echo '<th scope="col">Exercito</th>';
                            }; ?>
                            <?php if ($checkAnp == "checkAnp") {
                                echo '<th scope="col">ANP</th>';
                            }; ?>
                            <?php if ($checkInmetro == "checkInmetro") {
                                echo '<th scope="col">Inmetro</th>';
                            }; ?>
                            <?php if ($checkMOPP == "checkMOPP") {
                                echo '<th scope="col">MOPP</th>';
                            }; ?>
                            <?php if ($checkOutros == "checkOutros") {
                                echo '<th scope="col">Outros</th>';
                            }; ?>
                            <?php if ($checkObservacao == "checkObservacao") {
                                echo '<th scope="col">Observação</th>';
                            }; ?>
                            <?php if ($checkNota == "checkNota") {
                                echo '<th scope="col">Nota</th>';
                            }; ?>
                            <?php if ($checkRealizado == "checkRealizado") {
                                echo '<th scope="col">Realizado</th>';
                            }; ?>
                            <?php if ($checkProgramada == "checkProgramada") {
                                echo '<th scope="col">Programada</th>';
                            }; ?>
                            <?php if ($checkRelatorio == "checkRelatorio") {
                                echo '<th scope="col">Relatorio</th>';
                            }; ?>
                            <?php if ($checkPrazo == "checkPrazo") {
                                echo '<th scope="col">Prazo</th>';
                            }; ?>
                            <?php if ($checkPlano == "checkPlano") {
                                echo '<th scope="col">Plano</th>';
                            }; ?>
                            <?php if ($checkPrevisao == "checkPrevisao") {
                                echo '<th scope="col">Previsão</th>';
                            }; ?>
                            <?php if ($checkClassificacao == "checkClassificacao") {
                                echo '<th scope="col">Classificação</th>';
                            }; ?>
                            <?php if ($checkAuditoria == "checkAuditoria") {
                                echo '<th scope="col">Auditoria</th>';
                            }; ?>
                            <?php if ($checkIatfSGQ == "checkIatfSGQ") {
                                echo '<th scope="col">IATF</th>';
                            }; ?>
                            <?php if ($checkProgramadaSGQ == "checkProgramadaSGQ") {
                                echo '<th scope="col">Programada</th>';
                            }; ?>
                            <?php if ($checkPontuacaoSGQ == "checkPontuacaoSGQ") {
                                echo '<th scope="col">Pontuação</th>';
                            }; ?>
                            <?php if ($checkFrequencia == "checkFrequencia") {
                                echo '<th scope="col">Frequencia</th>';
                            }; ?>
                            <?php if ($checkNova == "checkNova") {
                                echo '<th scope="col">Nova</th>';
                            }; ?>
                            <?php if ($checkSGQ == "checkSGQ") {
                                echo '<th scope="col">SGQ</th>';
                            }; ?>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Corpo da tabela com informações vindas do banco de dados -->
                        <?php while ($rows = mysqli_fetch_assoc($query)) { ?>

                            <!-- Abre o array da referente a busca -->
                            <tr>
                                <td>
                                    <a href="busca.php?BuscarCodFor=<?php echo $rows['codFor']; ?>"><?php echo $rows['id']; ?></a>
                                </td>
                                <?php if ($checkcodFor == "checkcodFor") {
                                    echo '<td>';
                                    echo $rows['codFor'];
                                    echo '</td>';
                                } ?>
                                <?php if ($checkFornecedor == "checkFornecedor") {
                                    echo '<td>';
                                    echo $rows['fornecedor'];
                                    echo '</td>';
                                } ?>
                                <?php if ($checkTipo == "checkTipo") {
                                    echo '<td>';
                                    echo $rows['tipo'];
                                    echo '</td>';
                                } ?>
                                <?php if ($checkMDCSO == "checkMDCSO") {
                                    echo '<td>';
                                    echo $rows['fabricante'];
                                    echo '</td>';
                                } ?>
                                <?php if ($checkDetalhe == "checkDetalhe") {
                                    echo '<td>';
                                    echo $rows['detalhe'];
                                    echo '</td>';
                                } ?>
                                <?php if ($checkCritico == "checkCritico") {
                                    echo '<td>';
                                    echo $rows['critico'];
                                    echo '</td>';
                                } ?>
                                <?php if ($checkFiat == "checkFiat") {
                                    echo '<td align="center">';
                                    if ($rows['fiat'] == "fiat") echo 'X';
                                    echo '</td>';
                                } ?>
                                <?php if ($checkVolvo == "checkVolvo") {
                                    echo '<td align="center">';
                                    if ($rows['volo'] == "volvo") echo 'X';
                                    echo '</td>';
                                } ?>
                                <?php if ($checkMBB == "checkMBB") {
                                    echo '<td align="center">';
                                    if ($rows['mbb'] == "mbb") echo 'X';
                                    echo '</td>';
                                } ?>
                                <?php if ($checkScania == "checkScania") {
                                    echo '<td align="center">';
                                    if ($rows['scania'] == "scania") echo 'X';
                                    echo '</td>';
                                } ?>
                                <?php if ($checkDAF == "checkDAF") {
                                    echo '<td align="center">';
                                    if ($rows['daf'] == "daf") echo 'X';
                                    echo '</td>';
                                } ?>
                                <?php if ($checkHPE == "checkHPE") {
                                    echo '<td align="center">';
                                    if ($rows['hpe'] == "hpe") echo 'X';
                                    echo '</td>';
                                } ?>
                                <?php if ($checkBranca == "checkBranca") {
                                    echo '<td align="center">';
                                    if ($rows['branca'] == "branca") echo 'X';
                                    echo '</td>';
                                } ?>
                                <?php if ($checkMaquina == "checkMaquina") {
                                    echo '<td align="center">';
                                    if ($rows['maquina'] == "maquina") echo 'X';
                                    echo '</td>';
                                } ?>
                                <?php if ($checkOutras == "checkOutras") {
                                    echo '<td align="center">';
                                    if ($rows['outras'] == "outras") echo 'X';
                                    echo '</td>';
                                } ?>
                                <?php if ($checkFonte == "checkFonte") {
                                    echo '<td>';
                                    echo $rows['fonte'];
                                    echo '</td>';
                                } ?>
                                <?php if ($checkFinanceiro == "checkFinanceiro") {
                                    echo '<td>';
                                    echo $rows['situacao'];
                                    echo '</td>';
                                } ?>
                                <?php if ($checkConsulta == "checkConsulta") {
                                    echo '<td>';
                                    if($rows['consulta'] == "2001-01-01" ||$rows['consulta'] == "0001-01-01" ||$rows['consulta'] == "0000-00-00" ){echo '-';}else{echo date('d/m/Y',strtotime($rows['consulta']));};
                                    echo '</td>';
                                } ?>
                                <?php if ($checkConfidencialidade == "checkConfidencialidade") {
                                    echo '<td>';
                                    echo $rows['termo'];
                                    echo '</td>';
                                } ?>
                                <?php if ($checkDConfidencialidade == "checkDConfidencialidade") {
                                    echo '<td>';
                                    if($rows['confidencialidade'] == "2001-01-01" ||$rows['confidencialidade'] == "0001-01-01" ||$rows['confidencialidade'] == "0000-00-00"  ){echo '-';}else{echo date('d/m/Y',strtotime($rows['confidencialidade']));};
                                    echo '</td>';
                                } ?>
                                <?php if ($checkResponsabilidade == "checkResponsabilidade") {
                                    echo '<td>';
                                    echo $rows['tresponsabilidade'];
                                    echo '</td>';
                                } ?>
                                <?php if ($checkDResponsabilidade == "checkDResponsabilidade") {
                                    echo '<td>';
                                    if($rows['responsabilidade'] == "2001-01-01" ||$rows['responsabilidade'] == "0001-01-01" ||$rows['responsabilidade'] == "0000-00-00" ){echo '-';}else{echo date('d/m/Y',strtotime($rows['responsabilidade']));};
                                    echo '</td>';
                                } ?>
                                <?php if ($checkIatf == "checkIatf") {
                                   if (strtotime($rows['iatf']) < strtotime($hoje) ){
                                    if($rows['iatf'] == "2001-01-01" || $rows['iatf'] == "0000-00-00"){echo '<td>';}else{echo '<td bgcolor="RED">';}; 
                                    if($rows['iatf'] == "2001-01-01" || $rows['iatf'] == "0000-00-00"){echo '-';}else{echo date('d/m/Y',strtotime($rows['iatf']));};
                                    echo '</td>';
                                }elseif (strtotime($rows['iatf']) > strtotime('31 days', strtotime($hoje))){
                                    echo '<td bgcolor="GREEN">';
                                    echo date('d/m/Y',strtotime($rows['iatf']));
                                    echo '</td>';
                                 }elseif (strtotime($rows['iatf']) > strtotime($hoje) and strtotime($rows['iatf']) < strtotime('30 days', strtotime($hoje))){
                                    echo '<td bgcolor="YELLOW">';
                                    echo date('d/m/Y',strtotime($rows['iatf']));
                                    echo '</td>';
                                 };
                                } ?>
                                <?php if ($checkv9001 == "checkv9001") {
                                   if (strtotime($rows['v9001']) < strtotime($hoje) ){
                                    if($rows['v9001'] == "2001-01-01" || $rows['v9001'] == "0000-00-00"){echo '<td>';}else{echo '<td bgcolor="RED">';}; 
                                    if($rows['v9001'] == "2001-01-01" || $rows['v9001'] == "0000-00-00"){echo '-';}else{echo date('d/m/Y',strtotime($rows['v9001']));};
                                    echo '</td>';
                                }elseif (strtotime($rows['v9001']) > strtotime('31 days', strtotime($hoje))){
                                    echo '<td bgcolor="GREEN">';
                                    echo date('d/m/Y',strtotime($rows['v9001']));
                                    echo '</td>';
                                 }elseif (strtotime($rows['v9001']) > strtotime($hoje) and strtotime($rows['v9001']) < strtotime('30 days', strtotime($hoje))){
                                    echo '<td bgcolor="YELLOW">';
                                    echo date('d/m/Y',strtotime($rows['v9001']));
                                    echo '</td>';
                                 };
                                } ?>
                                <?php if ($checkv14001 == "checkv14001") {
                                    if (strtotime($rows['v14001']) < strtotime($hoje) ){
                                        if($rows['v14001'] == "2001-01-01" || $rows['v14001'] == "0000-00-00"){echo '<td>';}else{echo '<td bgcolor="RED">';}; 
                                        if($rows['v14001'] == "2001-01-01" || $rows['v14001'] == "0000-00-00"){echo '-';}else{echo date('d/m/Y',strtotime($rows['v14001']));};
                                        echo '</td>';
                                    }elseif (strtotime($rows['v14001']) > strtotime('31 days', strtotime($hoje))){
                                        echo '<td bgcolor="GREEN">';
                                        echo date('d/m/Y',strtotime($rows['v14001']));
                                        echo '</td>';
                                     }elseif (strtotime($rows['v14001']) > strtotime($hoje) and strtotime($rows['v14001']) < strtotime('30 days', strtotime($hoje))){
                                        echo '<td bgcolor="YELLOW">';
                                        echo date('d/m/Y',strtotime($rows['v14001']));
                                        echo '</td>';
                                     };
                                } ?>
                                <?php if ($checkPontuacao == "checkPontuacao") {
                                    echo "<td>";
                                    echo $rows['pontuacao'];
                                    echo '</td>';
                                } ?>
                                <?php if ($checkMunicipal == "checkMunicipal") {
                                     if (strtotime($rows['municipal']) < strtotime($hoje) ){
                                        if($rows['municipal'] == "2001-01-01" || $rows['municipal'] == "0000-00-00"){echo '<td>';}else{echo '<td bgcolor="RED">';}; 
                                        if($rows['municipal'] == "2001-01-01" || $rows['municipal'] == "0000-00-00"){echo '-';}else{echo date('d/m/Y',strtotime($rows['municipal']));};
                                        echo '</td>';
                                    }elseif (strtotime($rows['municipal']) > strtotime('31 days', strtotime($hoje))){
                                        echo '<td bgcolor="GREEN">';
                                        echo date('d/m/Y',strtotime($rows['municipal']));
                                        echo '</td>';
                                     }elseif (strtotime($rows['municipal']) > strtotime($hoje) and strtotime($rows['municipal']) < strtotime('30 days', strtotime($hoje))){
                                        echo '<td bgcolor="YELLOW">';
                                        echo date('d/m/Y',strtotime($rows['municipal']));
                                        echo '</td>';
                                     };
                                } ?>
                                <?php if ($checkOperacao == "checkOperacao") {
                                    if (strtotime($rows['operacao']) < strtotime($hoje) ){
                                        if($rows['operacao'] == "2001-01-01" || $rows['operacao'] == "0000-00-00"){echo '<td>';}else{echo '<td bgcolor="RED">';}; 
                                        if($rows['operacao'] == "2001-01-01" || $rows['operacao'] == "0000-00-00"){echo '-';}else{echo date('d/m/Y',strtotime($rows['operacao']));};
                                        echo '</td>';
                                    }elseif (strtotime($rows['operacao']) > strtotime('31 days', strtotime($hoje))){
                                        echo '<td bgcolor="GREEN">';
                                        echo date('d/m/Y',strtotime($rows['operacao']));
                                        echo '</td>';
                                     }elseif (strtotime($rows['operacao']) > strtotime($hoje) and strtotime($rows['operacao']) < strtotime('30 days', strtotime($hoje))){
                                        echo '<td bgcolor="YELLOW">';
                                        echo date('d/m/Y',strtotime($rows['operacao']));
                                        echo '</td>';
                                     };
                                } ?>
                                <?php if ($checkIbama == "checkIbama") {
                                        if (strtotime($rows['ibama']) < strtotime($hoje) ){
                                        if($rows['ibama'] == "2001-01-01" || $rows['ibama'] == "0000-00-00"){echo '<td>';}else{echo '<td bgcolor="RED">';}; 
                                        if($rows['ibama'] == "2001-01-01" || $rows['ibama'] == "0000-00-00"){echo '-';}else{echo date('d/m/Y',strtotime($rows['ibama']));};
                                        echo '</td>';
                                    }elseif (strtotime($rows['ibama']) > strtotime('31 days', strtotime($hoje))){
                                        echo '<td bgcolor="GREEN">';
                                        echo date('d/m/Y',strtotime($rows['ibama']));
                                        echo '</td>';
                                     }elseif (strtotime($rows['ibama']) > strtotime($hoje) and strtotime($rows['ibama']) < strtotime('30 days', strtotime($hoje))){
                                        echo '<td bgcolor="YELLOW">';
                                        echo date('d/m/Y',strtotime($rows['ibama']));
                                        echo '</td>';
                                     };
                                } ?>
                                <?php if ($checkAvcb == "checkAvcb") {
                                    if (strtotime($rows['avcb']) < strtotime($hoje) ){
                                        if($rows['avcb'] == "2001-01-01" || $rows['avcb'] == "0000-00-00"){echo '<td>';}else{echo '<td bgcolor="RED">';}; 
                                        if($rows['avcb'] == "2001-01-01" || $rows['avcb'] == "0000-00-00"){echo '-';}else{echo date('d/m/Y',strtotime($rows['avcb']));};
                                        echo '</td>';
                                    }elseif (strtotime($rows['avcb']) > strtotime('31 days', strtotime($hoje))){
                                        echo '<td bgcolor="GREEN">';
                                        echo date('d/m/Y',strtotime($rows['avcb']));
                                        echo '</td>';
                                     }elseif (strtotime($rows['avcb']) > strtotime($hoje) and strtotime($rows['avcb']) < strtotime('30 days', strtotime($hoje))){
                                        echo '<td bgcolor="YELLOW">';
                                        echo date('d/m/Y',strtotime($rows['avcb']));
                                        echo '</td>';
                                     };
                                } ?>
                                <?php if ($checkCrea == "checkCrea") {
                                   if (strtotime($rows['crea']) < strtotime($hoje) ){
                                    if($rows['crea'] == "2001-01-01" || $rows['crea'] == "0000-00-00"){echo '<td>';}else{echo '<td bgcolor="RED">';}; 
                                    if($rows['crea'] == "2001-01-01" || $rows['crea'] == "0000-00-00"){echo '-';}else{echo date('d/m/Y',strtotime($rows['crea']));};
                                    echo '</td>';
                                }elseif (strtotime($rows['crea']) > strtotime('31 days', strtotime($hoje))){
                                    echo '<td bgcolor="GREEN">';
                                    echo date('d/m/Y',strtotime($rows['crea']));
                                    echo '</td>';
                                 }elseif (strtotime($rows['crea']) > strtotime($hoje) and strtotime($rows['crea']) < strtotime('30 days', strtotime($hoje))){
                                    echo '<td bgcolor="YELLOW">';
                                    echo date('d/m/Y',strtotime($rows['crea']));
                                    echo '</td>';
                                 };
                                } ?>
                                <?php if ($checkCivil == "checkCivil") {
                                    if (strtotime($rows['civil']) < strtotime($hoje) ){
                                        if($rows['civil'] == "2001-01-01" || $rows['civil'] == "0000-00-00"){echo '<td>';}else{echo '<td bgcolor="RED">';}; 
                                        if($rows['civil'] == "2001-01-01" || $rows['civil'] == "0000-00-00"){echo '-';}else{echo date('d/m/Y',strtotime($rows['civil']));};
                                        echo '</td>';
                                    }elseif (strtotime($rows['civil']) > strtotime('31 days', strtotime($hoje))){
                                        echo '<td bgcolor="GREEN">';
                                        echo date('d/m/Y',strtotime($rows['civil']));
                                        echo '</td>';
                                     }elseif (strtotime($rows['civil']) > strtotime($hoje) and strtotime($rows['civil']) < strtotime('30 days', strtotime($hoje))){
                                        echo '<td bgcolor="YELLOW">';
                                        echo date('d/m/Y',strtotime($rows['civil']));
                                        echo '</td>';
                                     };
                                } ?>
                                <?php if ($checkPolicia == "checkPolicia") {
                                     if (strtotime($rows['policia']) < strtotime($hoje) ){
                                        if($rows['policia'] == "2001-01-01" || $rows['policia'] == "0000-00-00"){echo '<td>';}else{echo '<td bgcolor="RED">';}; 
                                        if($rows['policia'] == "2001-01-01" || $rows['policia'] == "0000-00-00"){echo '-';}else{echo date('d/m/Y',strtotime($rows['policia']));};
                                        echo '</td>';
                                    }elseif (strtotime($rows['policia']) > strtotime('31 days', strtotime($hoje))){
                                        echo '<td bgcolor="GREEN">';
                                        echo date('d/m/Y',strtotime($rows['policia']));
                                        echo '</td>';
                                     }elseif (strtotime($rows['policia']) > strtotime($hoje) and strtotime($rows['policia']) < strtotime('30 days', strtotime($hoje))){
                                        echo '<td bgcolor="YELLOW">';
                                        echo date('d/m/Y',strtotime($rows['policia']));
                                        echo '</td>';
                                     };
                                } ?>
                                <?php if ($checkCadris == "checkCadris") {
                                    if (strtotime($rows['cadris']) < strtotime($hoje) ){
                                        if($rows['cadris'] == "2001-01-01" || $rows['cadris'] == "0000-00-00"){echo '<td>';}else{echo '<td bgcolor="RED">';}; 
                                        if($rows['cadris'] == "2001-01-01" || $rows['cadris'] == "0000-00-00"){echo '-';}else{echo date('d/m/Y',strtotime($rows['cadris']));};
                                        echo '</td>';
                                    }elseif (strtotime($rows['cadris']) > strtotime('31 days', strtotime($hoje))){
                                        echo '<td bgcolor="GREEN">';
                                        echo date('d/m/Y',strtotime($rows['cadris']));
                                        echo '</td>';
                                     }elseif (strtotime($rows['cadris']) > strtotime($hoje) and strtotime($rows['cadris']) < strtotime('30 days', strtotime($hoje))){
                                        echo '<td bgcolor="YELLOW">';
                                        echo date('d/m/Y',strtotime($rows['cadris']));
                                        echo '</td>';
                                     };
                                } ?>
                                <?php if ($checkExercito == "checkExercito") {
                                    if (strtotime($rows['exercito']) < strtotime($hoje) ){
                                        if($rows['exercito'] == "2001-01-01" || $rows['exercito'] == "0000-00-00"){echo '<td>';}else{echo '<td bgcolor="RED">';}; 
                                        if($rows['exercito'] == "2001-01-01" || $rows['exercito'] == "0000-00-00"){echo '-';}else{echo date('d/m/Y',strtotime($rows['exercito']));};
                                        echo '</td>';
                                    }elseif (strtotime($rows['exercito']) > strtotime('31 days', strtotime($hoje))){
                                        echo '<td bgcolor="GREEN">';
                                        echo date('d/m/Y',strtotime($rows['exercito']));
                                        echo '</td>';
                                     }elseif (strtotime($rows['exercito']) > strtotime($hoje) and strtotime($rows['exercito']) < strtotime('30 days', strtotime($hoje))){
                                        echo '<td bgcolor="YELLOW">';
                                        echo date('d/m/Y',strtotime($rows['exercito']));
                                        echo '</td>';
                                     };
                                } ?>
                                <?php if ($checkAnp == "checkAnp") {
                                    if (strtotime($rows['anp']) < strtotime($hoje) ){
                                        if($rows['anp'] == "2001-01-01" || $rows['anp'] == "0000-00-00"){echo '<td>';}else{echo '<td bgcolor="RED">';}; 
                                        if($rows['anp'] == "2001-01-01" || $rows['anp'] == "0000-00-00"){echo '-';}else{echo date('d/m/Y',strtotime($rows['anp']));};
                                        echo '</td>';
                                    }elseif (strtotime($rows['anp']) > strtotime('31 days', strtotime($hoje))){
                                        echo '<td bgcolor="GREEN">';
                                        echo date('d/m/Y',strtotime($rows['anp']));
                                        echo '</td>';
                                     }elseif (strtotime($rows['anp']) > strtotime($hoje) and strtotime($rows['anp']) < strtotime('30 days', strtotime($hoje))){
                                        echo '<td bgcolor="YELLOW">';
                                        echo date('d/m/Y',strtotime($rows['anp']));
                                        echo '</td>';
                                     };
                                } ?>
                                <?php if ($checkInmetro == "checkInmetro") {
                                     if (strtotime($rows['inmetro']) < strtotime($hoje) ){
                                        if($rows['inmetro'] == "2001-01-01" || $rows['inmetro'] == "0000-00-00"){echo '<td>';}else{echo '<td bgcolor="RED">';}; 
                                        if($rows['inmetro'] == "2001-01-01" || $rows['inmetro'] == "0000-00-00"){echo '-';}else{echo date('d/m/Y',strtotime($rows['inmetro']));};
                                        echo '</td>';
                                    }elseif (strtotime($rows['inmetro']) > strtotime('31 days', strtotime($hoje))){
                                        echo '<td bgcolor="GREEN">';
                                        echo date('d/m/Y',strtotime($rows['inmetro']));
                                        echo '</td>';
                                     }elseif (strtotime($rows['inmetro']) > strtotime($hoje) and strtotime($rows['inmetro']) < strtotime('30 days', strtotime($hoje))){
                                        echo '<td bgcolor="YELLOW">';
                                        echo date('d/m/Y',strtotime($rows['inmetro']));
                                        echo '</td>';
                                     };
                                } ?>
                                <?php if ($checkMOPP == "checkMOPP") {
                                     if (strtotime($rows['mopp']) < strtotime($hoje) ){
                                        if($rows['mopp'] == "2001-01-01" || $rows['mopp'] == "0000-00-00"){echo '<td>';}else{echo '<td bgcolor="RED">';}; 
                                        if($rows['mopp'] == "2001-01-01" || $rows['mopp'] == "0000-00-00"){echo '-';}else{echo date('d/m/Y',strtotime($rows['mopp']));};
                                        echo '</td>';
                                    }elseif (strtotime($rows['mopp']) > strtotime('31 days', strtotime($hoje))){
                                        echo '<td bgcolor="GREEN">';
                                        echo date('d/m/Y',strtotime($rows['mopp']));
                                        echo '</td>';
                                     }elseif (strtotime($rows['mopp']) > strtotime($hoje) and strtotime($rows['mopp']) < strtotime('30 days', strtotime($hoje))){
                                        echo '<td bgcolor="YELLOW">';
                                        echo date('d/m/Y',strtotime($rows['mopp']));
                                        echo '</td>';
                                     };
                                } ?>
                                <?php if ($checkOutros == "checkOutros") {
                                     if (strtotime($rows['outros']) < strtotime($hoje) ){
                                        if($rows['outros'] == "2001-01-01" || $rows['outros'] == "0000-00-00"){echo '<td>';}else{echo '<td bgcolor="RED">';}; 
                                        if($rows['outros'] == "2001-01-01" || $rows['outros'] == "0000-00-00"){echo '-';}else{echo date('d/m/Y',strtotime($rows['outros']));};
                                        echo '</td>';
                                    }elseif (strtotime($rows['outros']) > strtotime('31 days', strtotime($hoje))){
                                        echo '<td bgcolor="GREEN">';
                                        echo date('d/m/Y',strtotime($rows['outros']));
                                        echo '</td>';
                                     }elseif (strtotime($rows['outros']) > strtotime($hoje) and strtotime($rows['outros']) < strtotime('30 days', strtotime($hoje))){
                                        echo '<td bgcolor="YELLOW">';
                                        echo date('d/m/Y',strtotime($rows['outros']));
                                        echo '</td>';
                                     };
                                } ?>
                                <?php if ($checkObservacao == "checkObservacao") {
                                    echo "<td>";
                                    echo $rows['observacoes'];
                                    echo '</td>';
                                } ?>
                                <?php if ($checkNota == "checkNota") {
                                    echo "<td>";
                                    echo $rows['nota'];
                                    echo '</td>';
                                } ?>
                                <?php if ($checkRealizado == "checkRealizado") {
                                    echo "<td>";
                                    if($rows['realizado'] == "2001-01-01" ||$rows['realizado'] == "0001-01-01" ||$rows['realizado'] == "0000-00-00" ){echo '-';}else{echo date('d/m/Y',strtotime($rows['realizado']));};
                                    echo '</td>';
                                } ?>
                                <?php if ($checkProgramada == "checkProgramada") {
                                    echo "<td>";
                                    if($rows['programada'] == "2001-01-01" ||$rows['programada'] == "0001-01-01" ||$rows['programada'] == "0000-00-00"){echo '-';}else{echo date('d/m/Y',strtotime($rows['programada']));};
                                    echo '</td>';
                                } ?>
                                <?php if ($checkRelatorio == "checkRelatorio") {
                                    echo "<td>";
                                    if($rows['relatorio'] == "2001-01-01" ||$rows['relatorio'] == "0001-01-01" ||$rows['relatorio'] == "0000-00-00" ){echo '-';}else{echo date('d/m/Y',strtotime($rows['relatorio']));};
                                    echo '</td>';
                                } ?>
                                <?php if ($checkPrazo == "checkPrazo") {
                                    echo "<td>";
                                    if($rows['prazo'] == "2001-01-01" ||$rows['prazo'] == "0001-01-01" ||$rows['prazo'] == "0000-00-00" ){echo '-';}else{echo date('d/m/Y',strtotime($rows['prazo']));};
                                    echo '</td>';
                                } ?>
                                <?php if ($checkPlano == "checkPlano") {
                                    echo "<td>";
                                    echo $rows['plano'];
                                    echo '</td>';
                                } ?>
                                <?php if ($checkPrevisao == "checkPrevisao") {
                                    echo "<td>";
                                    if($rows['previsao'] == "2001-01-01" ||$rows['previsao'] == "0001-01-01" ||$rows['previsao'] == "0000-00-00" ){echo '-';}else{echo date('d/m/Y',strtotime($rows['previsao']));};
                                    echo '</td>';
                                } ?>
                                <?php if ($checkClassificacao == "checkClassificacao") {
                                    echo "<td>";
                                    echo $rows['classificacao'];
                                    echo '</td>';
                                } ?>
                                <?php if ($checkAuditoria == "checkAuditoria") {
                                    echo "<td>";
                                    echo $rows['auditoria'];
                                    echo '</td>';
                                } ?>
                                <?php if ($checkIatfSGQ == "checkIatfSGQ") {
                                    echo "<td>";
                                    echo $rows['iatfSGQ'];
                                    echo '</td>';
                                } ?>
                                <?php if ($checkProgramadaSGQ == "checkProgramadaSGQ") {
                                    echo "<td>";
                                    if($rows['programadaSGQ'] == "2001-01-01" ||$rows['programadaSGQ'] == "0001-01-01" ||$rows['programadaSGQ'] == "0000-00-00"){echo '-';}else{echo date('d/m/Y',strtotime($rows['programadaSGQ']));};
                                    echo '</td>';
                                } ?>
                                <?php if ($checkPontuacaoSGQ == "checkPontuacaoSGQ") {
                                    echo "<td>";
                                    echo $rows['pontuacaoSGQ'];
                                    echo '</td>';
                                } ?>
                                <?php if ($checkFrequencia == "checkFrequencia") {
                                    echo "<td>";
                                    echo $rows['frequencia'];
                                    echo '</td>';
                                } ?>
                                <?php if ($checkNova == "checkNova") {
                                    echo "<td>";
                                    if($rows['nova'] == "2001-01-01" ||$rows['nova'] == "0001-01-01" ||$rows['nova'] == "0000-00-00"){echo '-';}else{echo date('d/m/Y',strtotime($rows['nova']));};
                                    echo '</td>';
                                } ?>
                                <?php if ($checkSGQ == "checkSGQ") {
                                    echo "<td>";
                                    echo $rows['sgq'];
                                    echo '</td>';
                                } ?>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

</html>