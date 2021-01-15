<?php
    error_reporting(E_NOTICE);
    ini_set("display_errors",0);

    session_start();

    include_once('../conexao.php');
    if (!isset($_SESSION['usuarioNomeCompleto'])){
        echo "
                
                <script type=\"text/javascript\">
                window.location.href='../index.php'
                    alert(\"FAZER LOGIN\");
                </script>
            ";
    }

    include('../nav.php');
 

    $MesDesempenho = $_POST['mes']; 
    $AnoDesempenho = $_POST['ano']; 

    if (isset($MesDesempenho) && isset($AnoDesempenho)){
    $query = mysqli_query($conn, "SELECT * FROM desempenho where mes = '$MesDesempenho' AND ano = '$AnoDesempenho' ORDER BY id");
    }else{
        $query = mysqli_query($conn, "SELECT * FROM desempenho ORDER BY id");
    }
    $num = mysqli_num_rows($query);

?>
<html lang="pt-br">
    <head>
        <!-- Meta tags Obrigatórias -->
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">

        <link href=https://code.jquery.com/jquery-3.5.1.min.js rel="stylesheet">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <link href="css/table.css" rel="stylesheet">
        <title>Cadastro de Fornecedores</title>
    </head>
    <body class="bg-light">
        <div class="container-fluid">
            <div class="py-2 text-center">
                <h3>Desempenho dos Fornecedores</h2>
            </div>
            <div class="row">
                <div class="col-md-1">
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#ModalLegendas"><span data-toggle="tooltip" data-placement="right" title="Tabela com lengeda das cores.">Legendas</span></button>
                </div>
                <div class="col-md-1">
                    <button type="button" class="btn btn-info" onclick="window.location.href='desempenho.php'"><span data-toggle="tooltip" data-placement="right" title="Página de Menu de Desempenho.">Voltar</span></button>
                </div>
                <div class="col-md-10">
                    <div class="alert alert-primary alert-sm" role="alert">Você está visualizando o mês: <?php echo $MesDesempenho; ?> ano: <?php echo $AnoDesempenho; ?>.</div>
                </div>
            </div>
            <table style="width:100%">
                <thead>
                    <tr>
                        <th scope="col" style="background-color: #98FB98"><span>ID</span></th>
                        <th scope="col" style="background-color: #98FB98"><span>Fornecedor</span></th>
                        <th scope="col" style="background-color: #98FB98"><span>Código</span></th>
                        <th scope="col" style="background-color: #98FB98"><span>Fornecimento</span></th>
                        <th scope="col" style="background-color: #98FB98"><span>Pontuação Certificações</span></th>
                        <th scope="col" style="background-color: blue"><span data-toggle="tooltip" data-placement="top" title="Perde 10 pontos para cada ocorrência.">Recebimento</span></th>
                        <th scope="col" style="background-color: blue"><span  data-toggle="tooltip" data-placement="top" title="Perde 25 pontos para cada ocorrência.">Interna Nivel 1</span></th>
                        <th scope="col" style="background-color: blue"><span  data-toggle="tooltip" data-placement="top" title="Perde 35 pontos para cada ocorrência.">Interna Nivel 2</span></th>
                        <th scope="col" style="background-color: blue"><span  data-toggle="tooltip" data-placement="top" title="Perde 50 pontos para cada ocorrência.">Cliente Alpino</span></th>
                        <th scope="col" style="background-color: blue"><span  data-toggle="tooltip" data-placement="top" title="Máximo 100 pontos.">Pontos</span></th>
                        <th scope="col" style="background-color: #4169E1"><span  data-toggle="tooltip" data-placement="top" title="Perde 50 pontos para cada ocorrência.">Quant. Fora do Prazo</span></th> 
                        <th scope="col" style="background-color: #4169E1"><span  data-toggle="tooltip" data-placement="top" title="Máximo 100 pontos.">Pontos</span></th>
                        <th scope="col" style="background-color: #6495ED"><span  data-toggle="tooltip" data-placement="top" title="Perde 100 pontos, caso não seja entregue.">Quant. Não Entregue</span></th> 	
                        <th scope="col" style="background-color: #6495ED"><span  data-toggle="tooltip" data-placement="top" title="Máximo 100 pontos.">Pontos</span></th>
                        <th scope="col" style="background-color: #87CEFA"><span  data-toggle="tooltip" data-placement="top" title="Perde 30 pontos para cada ocorrência.">Fora do Prazo</span></th> 
                        <th scope="col" style="background-color: #87CEFA"><span  data-toggle="tooltip" data-placement="top" title="Máximo 100 pontos.">Pontos</span></th>
                        <th scope="col" style="background-color: #4682B4"><span  data-toggle="tooltip" data-placement="top" title="PONTUAÇÃO QUALIDADE/DESENVOLVIMENTO">Pontuação IQP</span></th>
                        <th scope="col" style="background-color: gold"><span  data-toggle="tooltip" data-placement="top" title="">Entregas Realizadas</span></th>
                        <th scope="col" style="background-color: gold"><span  data-toggle="tooltip" data-placement="top" title="">Entregas com Atraso</span></th>
                        <th scope="col" style="background-color: gold"><span  data-toggle="tooltip" data-placement="top" title="">Pontos</span></th>
                        <th scope="col" style="background-color: gold"><span  data-toggle="tooltip" data-placement="top" title="Perde 5 pontos para cada ocorrência.">Parada de Linha Alpino</span></th>
                        <th scope="col" style="background-color: gold"><span  data-toggle="tooltip" data-placement="top" title="Perde 50 pontos para cada ocorrência.">Parada de linha Cliente</span></th>
                        <th scope="col" style="background-color: gold"><span  data-toggle="tooltip" data-placement="top" title="Máximo 100 pontos.">Pontos</span></th>
                        <th scope="col" style="background-color: yellow"><span  data-toggle="tooltip" data-placement="top" title="Perde 5 pontos para cada ocorrência.">Parada de Linha Alpino</span></th>
                        <th scope="col" style="background-color: yellow"><span  data-toggle="tooltip" data-placement="top" title="Perde 50 pontos para cada ocorrência.">Parada de linha Cliente</span></th>
                        <th scope="col" style="background-color: yellow"><span  data-toggle="tooltip" data-placement="top" title="Máximo 100 pontos.">Pontos</span></th>
                        <th scope="col" style="background-color: gold"><span  data-toggle="tooltip" data-placement="top" title="PONTUAÇÃO LOGÍSTICA">Pontuação IPE</span></th>	
                        <th scope="col" style="background-color: #D8BFD8"><span  data-toggle="tooltip" data-placement="top" title="Pontuação da Auditoria">Auditoria</span></th>
                        <th scope="col" style="background-color: #800000"><span  data-toggle="tooltip" data-placement="top" title=""><font color="#FFFFF0">IDF</font></span></th>
                        <th scope="col"><span>Editar</span></th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($rows = mysqli_fetch_assoc($query)) { ?>
                        <tr>
                            <td>
                                <a href="busca.php?BuscarCodFor=<?php echo $rows['codFor']; ?>"><?php echo $rows['id']; ?></a>
                            </td>
                            <?php echo '<td>'; echo $rows['fornecedor']; echo '</td>';?>
                            <?php echo '<td>'; echo $rows['codFor']; echo '</td>';?>
                            <?php echo '<td>'; echo $rows['fornecimento']; echo '</td>';?>
                            <?php echo '<td>'; echo $rows['pontuacao']; echo '</td>';?>
                            <?php echo '<td>'; echo $rows['recebimento']; echo '</td>';?>
                            <?php echo '<td>'; echo $rows['nivel1']; echo '</td>';?>
                            <?php echo '<td>'; echo $rows['nivel2']; echo '</td>';?>
                            <?php echo '<td>'; echo $rows['cliente']; echo '</td>';?>
                            <?php echo '<td>'; echo $rows['pontos']; echo '</td>';?>
                            <?php echo '<td>'; echo $rows['qtdePrazo']; echo '</td>';?>
                            <?php echo '<td>'; echo $rows['pontos2']; echo '</td>';?>
                            <?php echo '<td>'; echo $rows['qtdeEntrega']; echo '</td>';?>
                            <?php echo '<td>'; echo $rows['pontos3']; echo '</td>';?>
                            <?php echo '<td>'; echo $rows['fora']; echo '</td>';?>
                            <?php echo '<td>'; echo $rows['pontos4']; echo '</td>';?>
                            <?php echo '<td>'; echo $rows['qualidade']; echo '</td>';?>
                            <?php echo '<td>'; echo $rows['entrega']; echo '</td>';?>
                            <?php echo '<td>'; echo $rows['entregaAtraso']; echo '</td>';?>
                            <?php echo '<td>'; echo $rows['pontos5']; echo '</td>';?>
                            <?php echo '<td>'; echo $rows['quebra']; echo '</td>';?>
                            <?php echo '<td>'; echo $rows['quebraCliente']; echo '</td>';?>
                            <?php echo '<td>'; echo $rows['pontos6']; echo '</td>';?>
                            <?php echo '<td>'; echo $rows['parada']; echo '</td>';?>
                            <?php echo '<td>'; echo $rows['paradaCliente']; echo '</td>';?>
                            <?php echo '<td>'; echo $rows['pontos7']; echo '</td>';?>
                            <?php echo '<td>'; echo $rows['logistica']; echo '</td>';?>
                            <?php echo '<td>'; echo $rows['auditoria']; echo '</td>';?>
                            <?php echo '<td>'; echo $rows['idf']; echo '</td>';?>
                           <td>
                           <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#ModalEdit" data-whatever="<?php echo $rows['fornecedor']; ?>" 
                           data-whatevermes="<?php echo $rows['mes']; ?>"
                           data-whateverano="<?php echo $rows['ano']; ?>"  
                           data-whateverid="<?php echo $rows['id']; ?>" 
                           data-whatevercodfor="<?php echo $rows['codFor']; ?>"
                           data-whatevermes="<?php echo $rows['mes']; ?>"
                           data-whateverano="<?php echo $rows['ano']; ?>"
                           data-whateverfornecimento="<?php echo $rows['fornecimento']; ?>"
                           data-whateverpontuacao="<?php echo $rows['pontuacao']; ?>"
                           data-whateverrecebimento="<?php echo $rows['recebimento']; ?>"
                           data-whatevernivel1="<?php echo $rows['nivel1']; ?>"
                           data-whatevernivel2="<?php echo $rows['nivel2']; ?>"
                           data-whatevercliente="<?php echo $rows['cliente']; ?>"
                           data-whateverpontos="<?php echo $rows['pontos']; ?>"
                           data-whateverqtdeprazo="<?php echo $rows['qtdePrazo']; ?>"
                           data-whateverpontos2="<?php echo $rows['pontos2']; ?>"
                           data-whateverqtdeentrega="<?php echo $rows['qtdeEntrega']; ?>"
                           data-whatevernivel2="<?php echo $rows['nivel2']; ?>"
                           data-whateverpontos3="<?php echo $rows['pontos3']; ?>"
                           data-whateverfora="<?php echo $rows['fora']; ?>"
                           data-whateverpontos4="<?php echo $rows['pontos4']; ?>"
                           data-whateverqualidade="<?php echo $rows['qualidade']; ?>"
                           data-whateverentrega="<?php echo $rows['entrega']; ?>"
                           data-whateverentregaatraso="<?php echo $rows['entregaAtraso']; ?>"
                           data-whateverpontos5="<?php echo $rows['pontos5']; ?>"
                           data-whateverquebra="<?php echo $rows['quebra']; ?>"
                           data-whateverquebracliente="<?php echo $rows['quebraCliente']; ?>"
                           data-whateverpontos6="<?php echo $rows['pontos6']; ?>"
                           data-whateverparada="<?php echo $rows['parada']; ?>"
                           data-whateverparadacliente="<?php echo $rows['paradaCliente']; ?>"
                           data-whateverpontos7="<?php echo $rows['pontos7']; ?>"
                           data-whateverlogistica="<?php echo $rows['logistica']; ?>"
                           data-whateverauditoria="<?php echo $rows['auditoria']; ?>"
                           data-whateveridf="<?php echo $rows['idf']; ?>">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                            <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                            <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                            </svg>
                           </button>  
                          </td>                        
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
        <div class="modal fade" id="ModalLegendas" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Legendas:</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <table style="width:100%">
                                <thead>
                                    <tr>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td style="background-color: #98FB98"></td>
                                        <td>FORNECEDORES</td>
                                    </tr>
                                    <tr>
                                        <td style="background-color: blue"></td>
                                        <td>QUALIDADE > RAC'S EMITIDAS</td>
                                    </tr>
                                    <tr>
                                        <td style="background-color: #4169E1"></td>
                                        <td>QUALIDADE > RESPOSTAS</td>
                                    </tr>
                                    <tr>
                                        <td style="background-color: #6495ED"></td>
                                        <td>QUALIDADE > CERTIFICADO DE QUALIDADE</td>
                                    </tr>
                                    <tr>
                                        <td style="background-color: #87CEFA"></td>
                                        <td>QUALIDADE > AMOSTRAS</td>
                                    </tr>
                                    <tr>
                                        <td style="background-color: gold"></td>
                                        <td>LOGISTICA > ÍNDICE DE ENTREGAS</td>
                                    </tr>
                                    <tr>
                                        <td style="background-color: YELLOW"></td>
                                        <td>LOGISTICA > FRETES</td>
                                    </tr>
                                    <tr>
                                        <td style="background-color: #D8BFD8"></td>
                                        <td>AUDITORIA</td>
                                    </tr>
                                    <tr>
                                        <td style="background-color: #800000"></td>
                                        <td>IDF</td>
                                    </tr>
                                </tbody>
                            </table>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="ModalEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Fornecedor:</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form method="POST" action="gravarDesempenho.php" class="form-signin">
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="recipientId">ID:</label>
                                        <input type="text" class="form-control form-control-sm" id="recipientId" name="recipientId" readonly>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="mes">Mês:</label>
                                        <input type="text" class="form-control form-control-sm" id="mes" name="mes" readonly>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="ano">Ano:</label>
                                        <input type="text" class="form-control form-control-sm" id="ano" name="ano" readonly>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="codFor">Código:</label>
                                        <input type="text" class="form-control form-control-sm" id="codFor" name="codFor" readonly>
                                    </div>
                                </div>                             
                                <div class="col-md-2">
                                    <label for="fornecimento">Fornecimento:</label>
                                    <select class="form-control form-control-sm" id="fornecimento" name="fornecimento">
                                        <option>Sim</option>
                                        <option>Não</option>
                                    </select>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="pontuacao">Certificado:</label>
                                        <input type="text" class="form-control form-control-sm" id="pontuacao" name="pontuacao" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="recebimento">Recebimento:</label>
                                        <input type="number" class="form-control form-control-sm" id="recebimento" name="recebimento">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="nivel1">Nivel 1:</label>
                                        <input type="number" class="form-control form-control-sm" id="nivel1" name="nivel1">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="nivel2">Nivel 2:</label>
                                        <input type="number" class="form-control form-control-sm" id="nivel2" name="nivel2">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="cliente">Cliente:</label>
                                        <input type="number" class="form-control form-control-sm" id="cliente" name="cliente">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="ponto">Pontos:</label>
                                        <input type="number" class="form-control form-control-sm" id="pontos" name="pontos" readonly>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="qtdePrazo">Qt.Fora Prazo:</label>
                                        <input type="number" class="form-control form-control-sm" id="qtdePrazo" name="qtdePrazo">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="pontos2">Pontos:</label>
                                        <input type="text" class="form-control form-control-sm" id="pontos2" name="pontos2" readonly>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="qtdeEntrega">Qt. não entregue:</label>
                                        <input type="number" class="form-control form-control-sm" id="qtdeEntrega" name="qtdeEntrega">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="pontos3">Pontos:</label>
                                        <input type="text" class="form-control form-control-sm" id="pontos3" name="pontos3" readonly>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="fora">Fora Prazo:</label>
                                        <input type="number" class="form-control form-control-sm" id="fora" name="fora">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="pontos4">Pontos:</label>
                                        <input type="number" class="form-control form-control-sm" id="pontos4" name="pontos4" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="qualidade">IQP:</label>
                                        <input type="text" class="form-control form-control-sm" id="qualidade" name="qualidade" readonly>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="entrega">Entregas Realizadas:</label>
                                        <input type="number" class="form-control form-control-sm" id="entrega" name="entrega">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="entregaAtraso">Entregas Atrasos:</label>
                                        <input type="number" class="form-control form-control-sm" id="entregaAtraso" name="entregaAtraso">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="pontos5">Pontos:</label>
                                        <input type="text" class="form-control form-control-sm" id="pontos5" name="pontos5" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="quebra">Parada Linha Alpino:</label>
                                        <input type="number" class="form-control form-control-sm" id="quebra" name="quebra">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="quebraCliente">Parada Linha Cliente:</label>
                                        <input type="number" class="form-control form-control-sm" id="quebraCliente" name="quebraCliente">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="pontos6">Pontos:</label>
                                        <input type="text" class="form-control form-control-sm" id="pontos6" name="pontos6" readonly>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="parada">Parada Linha Alpino:</label>
                                        <input type="number" class="form-control form-control-sm" id="parada" name="parada">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="paradaCliente">Parada Linha Cliente:</label>
                                        <input type="number" class="form-control form-control-sm" id="paradaCliente" name="paradaCliente">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="pontos7">Pontos:</label>
                                        <input type="text" class="form-control form-control-sm" id="pontos7" name="pontos7" readonly>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="logistica">Pontuação Logistica:</label>
                                        <input type="text" class="form-control form-control-sm" id="logistica" name="logistica" readonly>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="auditoria">Auditoria:</label>
                                        <input type="text" class="form-control form-control-sm" id="auditoria" name="auditoria" readonly>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="idf">IDF:</label>
                                        <input type="text" class="form-control form-control-sm" id="idf" name="idf" readonly>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-success btn-sm" id="buttonCalcular" onclick="calcular()">Calcular</button>
                            <button type="submit" class="btn btn-primary btn-sm">Alterar</button>
                            <button type="button" class="btn btn-danger  btn-sm" onclick="Deletar()">Deletar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </body>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script type="text/javascript" src="js/table.js"></script> 
    
   
    <script type="text/javascript">
        function Deletar(){
        var vcodFor = document.getElementById('recipientId').value;
            $.post("deletarDesempenho.php", {name: vcodFor}, function(retorna){
                alert(retorna);
                window.location.href='tabelaMes.php';
                   
			});
        }
        function calcular(){

            var vcodFor = document.getElementById('codFor').value;

            $.post("pegarValorAuditoria.php", {name: vcodFor}, function(retornaAuditoria){
					//Subtitui o valor no seletor id="conteudo"
                    document.getElementById('auditoria').value = retornaAuditoria;
                    RetornaAuditoriaPost = retornaAuditoria;
			});

            var result1 = document.getElementById('recebimento').value * 10 + document.getElementById('nivel1').value * 25 + document.getElementById('nivel2').value * 25 +  document.getElementById('cliente').value * 50 ;
            if(result1 >= 100){document.getElementById('pontos').value = 0}else{document.getElementById('pontos').value = 100 - result1;}
            document.getElementById('pontos').style.backgroundColor = 'blue';
            document.getElementById('pontos').style.borderColor = 'blue';
            document.getElementById('pontos').style.color = 'white';

            var result2 = document.getElementById('qtdePrazo').value * 50;
            if(result2 >= 100){document.getElementById('pontos2').value = 0}else{document.getElementById('pontos2').value = 100 - result2;}
            document.getElementById('pontos2').style.backgroundColor = 'blue';
            document.getElementById('pontos2').style.borderColor = 'blue';
            document.getElementById('pontos2').style.color = 'white';

            var result3 = document.getElementById('qtdeEntrega').value * 100;
            if(result3 >= 100){document.getElementById('pontos3').value = 0}else{document.getElementById('pontos3').value = 100 - result3;}
            document.getElementById('pontos3').style.backgroundColor = 'blue';
            document.getElementById('pontos3').style.borderColor = 'blue';
            document.getElementById('pontos3').style.color = 'white';

            var result4 = document.getElementById('fora').value * 30;
            if(result4 >= 100){document.getElementById('pontos4').value = 0}else{document.getElementById('pontos4').value = 100 - result4;}
            document.getElementById('pontos4').style.backgroundColor = 'blue';
            document.getElementById('pontos4').style.borderColor = 'blue';
            document.getElementById('pontos4').style.color = 'white';


            var resultPontos123 = document.getElementById('pontos').value * 0.5 + document.getElementById('pontos2').value * 0.4 + document.getElementById('pontos3').value * 0.1;
            var resultIqp = resultPontos123 * 0.8 + document.getElementById('pontos4').value * 0.2;
            document.getElementById('qualidade').value = resultIqp;
            document.getElementById('qualidade').style.backgroundColor = 'blue';
            document.getElementById('qualidade').style.borderColor = 'blue';
            document.getElementById('qualidade').style.color = 'white';

            var result5 = document.getElementById('entrega').value - document.getElementById('entregaAtraso').value;
            var result51 =  result5 / document.getElementById('entrega').value;
            result51 = result51 * 100; 
            if(result51 >= 100){document.getElementById('pontos5').value = result51}else{document.getElementById('pontos5').value = Math.round(result51);}
            document.getElementById('pontos5').style.backgroundColor = 'blue';
            document.getElementById('pontos5').style.borderColor = 'blue';
            document.getElementById('pontos5').style.color = 'white';

            var result6 = document.getElementById('quebra').value * 5 + document.getElementById('quebraCliente').value * 50;
            if(result6 >= 100){document.getElementById('pontos6').value = 100}else{document.getElementById('pontos6').value = document.getElementById('pontos5').value - result6;}
            document.getElementById('pontos6').style.backgroundColor = 'blue';
            document.getElementById('pontos6').style.borderColor = 'blue';
            document.getElementById('pontos6').style.color = 'white';

            var result7 = document.getElementById('parada').value * 5 +  document.getElementById('paradaCliente').value * 50 ;
            if(result7 >= 100){document.getElementById('pontos7').value = 100}else{document.getElementById('pontos7').value = 100 - result7;}
            document.getElementById('pontos7').style.backgroundColor = 'blue';
            document.getElementById('pontos7').style.borderColor = 'blue';
            document.getElementById('pontos7').style.color = 'white';

            var result8 = document.getElementById('pontos5').value * 0.85 +  document.getElementById('pontos7').value * 0.15 ;
            if(result8 >= 100){document.getElementById('logistica').value = 100}else{document.getElementById('logistica').value = Math.round(result8) ;}
            document.getElementById('logistica').style.backgroundColor = 'blue';
            document.getElementById('logistica').style.borderColor = 'blue';
            document.getElementById('logistica').style.color = 'white';
            
            
            document.getElementById('auditoria').style.backgroundColor = 'blue';
            document.getElementById('auditoria').style.borderColor = 'blue';
            document.getElementById('auditoria').style.color = 'white';

            $.post("pegarValorDesempenho.php", {name: vcodFor}, function(retorna){
					//Subtitui o valor no seletor id="conteudo"
                    document.getElementById('pontuacao').value = retorna;
			});
            document.getElementById('pontuacao').style.backgroundColor = 'blue';
            document.getElementById('pontuacao').style.borderColor = 'blue';
            document.getElementById('pontuacao').style.color = 'white';

            var vFornecimento = document.getElementById('fornecimento').value
            var vAuditoria = RetornaAuditoriaPost;
            var vTAuditoria = RetornaAuditoriaPost * 0.1;
            var vPontuacao =  document.getElementById('pontuacao').value * 0.1;
            var vQualidade =  document.getElementById('qualidade').value * 0.45;
            var vLogistica =  document.getElementById('logistica').value * 0.45;
          
            if(vFornecimento == "Sim"){
                if (vAuditoria != ""){
                    vTotal = vPontuacao + vQualidade + vLogistica;
                    vTotal = vTotal * 0.9;
                    vTotal = vTotal + RetornaAuditoriaPost;
                    document.getElementById('idf').value = Math.round(vTotal);
                } else {
                    vTotal = vPontuacao + vQualidade + vLogistica;
                    document.getElementById('idf').value = Math.round(vTotal);
                }
                document.getElementById('idf').style.backgroundColor = 'red';
                document.getElementById('idf').style.borderColor = 'red';
                document.getElementById('idf').style.color = 'white';
            }
        }

        $(function () {$('[data-toggle="tooltip"]').tooltip()})
        $('#ModalEdit').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget) // Button that triggered the modal
            var recipient = button.data('whatever')
            var recipientId = button.data('whateverid')
            var recipientCodFor = button.data('whatevercodfor')
            var recipientMes = button.data('whatevermes')
            var recipientAno = button.data('whateverano')
            var rFornecimento = button.data('whateverfornecimento')
            var rPontuacao = button.data('whateverpontuacao')
            var rRecebimento = button.data('whateverrecebimento')
            var rNivel1 = button.data('whatevernivel1')
            var rNivel2 = button.data('whatevernivel2')
            var rCliente = button.data('whatevercliente')
            var rPontos = button.data('whateverpontos')
            var rQtdeprazo = button.data('whateverqtdeprazo')
            var rPontos2 = button.data('whateverpontos2')
            var rQtdeEntrega = button.data('whateverqtdeentrega')
            var rPontos3 = button.data('whateverpontos3')
            var rFora = button.data('whateverfora')
            var rPontos4 = button.data('whateverpontos4')
            var rQualidade = button.data('whateverqualidade')
            var rEntrega = button.data('whateverentrega')
            var rEntregaAntraso = button.data('whateverentregaatraso')
            var rPontos5 = button.data('whateverpontos5')
            var rQuebra = button.data('whateverquebra')
            var rQuebraCliente = button.data('whateverquebracliente')
            var rPontos6 = button.data('whateverpontos6')
            var rParada = button.data('whateverparada')
            var rParadaCliente = button.data('whateverparadacliente')
            var rPontos7 = button.data('whateverpontos7')
            var rLogistica = button.data('whateverlogistica')
            var rAuditoria = button.data('whateverauditoria')
            var rIdf = button.data('whateveridf')

            var modal = $(this)
            modal.find('.modal-title').text('Fornecedor: ' + recipient) 
            modal.find('#recipientId').val(recipientId)
            modal.find('#codFor').val(recipientCodFor)
            modal.find('#mes').val(recipientMes)
            modal.find('#ano').val(recipientAno)
            modal.find('#fornecimento').val(rFornecimento)
            modal.find('#pontuacao').val(rPontuacao)
            modal.find('#recebimento').val(rRecebimento)
            modal.find('#nivel1').val(rNivel1)
            modal.find('#nivel2').val(rNivel2) 
            modal.find('#cliente').val(rCliente)    
            modal.find('#pontos').val(rPontos)    
            modal.find('#qtdePrazo').val(rQtdeprazo) 
            modal.find('#pontos2').val(rPontos2)  
            modal.find('#qtdeEntrega').val(rQtdeEntrega)   
            modal.find('#pontos3').val(rPontos3)
            modal.find('#fora').val(rFora)
            modal.find('#pontos4').val(rPontos4)
            modal.find('#qualidade').val(rQualidade)
            modal.find('#entrega').val(rEntrega)
            modal.find('#entregaAtraso').val(rEntregaAntraso)
            modal.find('#pontos5').val(rPontos5)
            modal.find('#quebra').val(rQuebra)
            modal.find('#quebraCliente').val(rQuebraCliente)
            modal.find('#pontos6').val(rPontos6)
            modal.find('#parada').val(rParada)
            modal.find('#paradaCliente').val(rParadaCliente)
            modal.find('#pontos7').val(rPontos7)
            modal.find('#logistica').val(rLogistica)
            modal.find('#auditoria').val(rAuditoria)
            modal.find('#idf').val(rIdf)
            
     
            document.getElementById("buttonCalcular").click();
        
        })
    </script>
</html>