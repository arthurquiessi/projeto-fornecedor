<?php
   
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
    //session_start();
    $codfor = "SELECT * FROM cadastro order by id desc limit 1";
    $resultado_codfor = mysqli_query($conn,  $codfor);

    if($_SESSION['usuarioNiveisAcessoId'] != "1" and $_SESSION['usuarioNiveisAcessoId'] != "2"){
        echo "
       
            <script type=\"text/javascript\">
                window.location.href='../inicial.php'
                alert(\"Cadastro somente para usuarios de Compras!\");
            </script>
        ";
    } 

    
    ?>

    <html lang="pt-br">
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
            <h3>Cadastro de Fornecedores</h2>
            <p class="lead">Cadastros com todas as caracteristicas e informações de Compras, Gestão Ambiental e Documental de Auditorias.</p>
        </div>
        <div class="container-fluid">
            <form action="busca.php" method="POST">
                <div class="form-row">
                        <br>
                        <br>
                    <div class="col-5"></div>
                    <div class="col-md-2">
                        <input type="text" class="form-control" id="BuscarCodFor" name="BuscarCodFor" placeholder="Código do Fornecedor" required>
                    </div>
                    <div class="col">
                        <button type="submit" class="btn btn-primary">Procurar</button>
                    </div>
                </div>
            </form>
            <div class="card">
                <div class="card-header">
                    <ul class="nav nav-tabs card-header-tabs">
                        <li class="nav-item"><a class="nav-link active"  role="tab" data-toggle="tab" href="#menu1">Cadastro</a></li>
                    </ul>
                </div>
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane active" id="menu1">
                        <div class="card-body">                      
                            <form method="POST" action="cadastro.php">
                                <div class="row">
                                    <div class="col-md-2">
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend"><span class="input-group-text" id="inputGroup-sizing-default">ID:</span></div>
                                            <?php while($rows_codfor = mysqli_fetch_assoc($resultado_codfor)){ ?>
                                            <input type="text" class="form-control" id="id" name="id" value="<?php echo $rows_codfor['id'] + 1; ?>" aria-describedby="inputGroup-sizing-sm" readonly>
                                            <?php } ?>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend"><span class="input-group-text" id="inputGroup-sizing-default">Fornecedor:</span></div>
                                            <input type="text" class="form-control" id="fornecedor" name="fornecedor" aria-describedby="inputGroup-sizing-sm" required>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend"><span class="input-group-text" id="inputGroup-sizing-default">Código:</span></div>
                                            <input type="text" class="form-control" id="codfor" name="codfor" aria-describedby="inputGroup-sizing-sm" required>
                                        </div>
                                    </div>                                
                                    <div class="col-md-4">
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <label class="input-group-text" for="tipo">Tipo:</label>
                                            </div>
                                            <select class="custom-select" name="tipo" id="tipo">
                                                <option selected disabled>Escolher...</option>
                                                <option value="Qualidade">Qualidade</option>
                                                <option value="Ambiental">Ambiental</option>
                                                <option value="Servicos">Serviços que não impactam na conformidade do serviço</option>
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
                                            <select class="custom-select" name="fabricante" id="fabricante">
                                                <option selected disabled>Escolher...</option>
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
                                            <input type="text" class="form-control" id="detalhe" name="detalhe" aria-describedby="inputGroup-sizing-sm" required>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="fiat" name="fiat" id="fiat">
                                                    <label class="form-check-label" for="fiat">Fiat/Iveco</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="volvo" name="volvo" id="volvo">
                                                    <label class="form-check-label" for="volvo">Volvo</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="mbb" name="mbb" id="mbb">
                                                    <label class="form-check-label" for="mbb">MBB</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="scania" name="scania" id="scania">
                                                    <label class="form-check-label" for="scania">Scania/MAN</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="daf" name="daf" id="daf">
                                                    <label class="form-check-label" for="daf">DAF</label>
                                                </div>
                                    </div>
                                    <div class="col-md-2">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="hpe" name="hpe" id="hpe">
                                                    <label class="form-check-label" for="hpe">HPE Mitsubishi</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="branca" name="branca" id="branca">
                                                    <label class="form-check-label" for="branca">Linha Branca</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="maquina"  name="maquina" id="maquina">
                                                    <label class="form-check-label" for="maquina">L. Máq./Equip.</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="outras" name="outras" id="outras">
                                                    <label class="form-check-label" for="outras">Outras</label>
                                                </div>
                                     </div>
                                     <div class="col-md-2">
                                        <label class="input-group-text" for="critico">Critico:</label>
                                        <select class="custom-select" name="critico" id="critico">
                                            <option selected disabled>-</option>
                                            <option value="Sim">Sim</option>
                                            <option value="Não">Não</option>
                                        </select>
                                    </div>
                                </div>                                        
                                 <div class="row">
                                 <div class="col-md-2">
                                        <label class="input-group-text" for="fonte">Fonte:</label>
                                        <select class="custom-select" name="fonte" id="fonte">
                                            <option selected disabled>Escolher...</option>
                                            <option value="Fonte Única">Fonte Única</option>
                                            <option value="Indicada pelo Cliente">Indicada pelo Cliente</option>
                                            <option value="Importada">Importada</option>
                                            <option value="Peças de Segurança">Peças de Segurança</option>
                                        </select>
                                    </div>
                                    <div class="col-md-2">
                                        <label class="input-group-text" for="situacao">Situação Financeira:</label>
                                            <select class="custom-select"  name="situacao" id="situacao">
                                                <option selected disabled>Escolher...</option>
                                                <option value="Ok">Ok</option>
                                                <option value="Não Ok">Não Ok</option>
                                            </select>
                                    </div>
                                    <div class="col-md-2">
                                        <label class="input-group-text" for="consulta">Consulta Situação:</label>
                                        <input type="date" class="form-control" id="consulta" name="consulta" aria-describedby="inputGroup-sizing-sm" required>
                                    </div>
                                    <div class="col-md-3">
                                        <label class="input-group-text" for="termo">Termo de Confidencialidade:</label>
                                        <select class="custom-select" name="termo" id="termo">
                                            <option selected disabled>-</option>
                                            <option value="Ok">Ok</option>
                                            <option value="Não Ok">Não Ok</option>
                                        </select>
                                    </div>
                                    <div class="col-md-3">
                                            <label class="input-group-text" for="confidencialidade">Consulta Confidencialidade:</label>
                                            <input type="date" class="form-control" id="confidencialidade" name="confidencialidade" aria-describedby="inputGroup-sizing-sm" required>
                                    </div>
                                </div>                                            
                                <div class="row">
                                    <div class="col-md-2">
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <label class="input-group-text" for="tResponsabilidade">Termo:</label>
                                            </div>
                                            <select class="custom-select" name="tresponsabilidade" id="tResponsabilidade">
                                                <option selected disabled>Escolher...</option>
                                                <option value="Ok">Ok</option>
                                                <option value="Não Ok">Não Ok</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend"><span class="input-group-text" id="inputGroup-sizing-default">Responsabilidade:</span></div>
                                            <input type="date" class="form-control" id="responsabilidade" name="responsabilidade" aria-describedby="inputGroup-sizing-sm" required>
                                        </div>
                                    </div>
                                </div> 
                                <div class="row">
                                    <div class="col-sm-9"></div>
                                    <div class="col-sm-3">

                                        <button type="submit" class="btn btn-success">Salvar</button>                                     
                                    </div>
                                </div>  
                            </form>                      
                                                   
                        </div>                      
                    </div>
                </div>
            </div>
            <br>          
        <div>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    
    
  </body>
</html>
