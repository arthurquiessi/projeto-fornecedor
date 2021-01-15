<?php
    //include('nav.php');
    session_start();
    error_reporting(E_NOTICE);
    ini_set("display_errors",0);


    if (!isset($_SESSION['usuarioNomeCompleto'])){
        echo "
        <script type=\"text/javascript\">
         window.location.href='../index.php'
					alert(\"FAZER LOGIN\");
				</script>
			";
    }

   include_once('../conexao.php');
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

    $pontuacao85 = "SELECT * FROM documentos where pontuacao = '85' ";
    $resultadopontuacao85 = mysqli_query($conn,  $pontuacao85);
    $totalpontuacao85 = mysqli_num_rows($resultadopontuacao85);

    $pontuacao95 = "SELECT * FROM documentos where pontuacao = '95' ";
    $resultadopontuacao95 = mysqli_query($conn,  $pontuacao95);
    $totalpontuacao95 = mysqli_num_rows($resultadopontuacao95);

    $pontuacao100 = "SELECT * FROM documentos where pontuacao = '100' ";
    $resultadopontuacao100 = mysqli_query($conn,  $pontuacao100);
    $totalpontuacao100 = mysqli_num_rows($resultadopontuacao100);

    $pontuacao0 = "SELECT * FROM documentos where pontuacao = '0' ";
    $resultadopontuacao0 = mysqli_query($conn,  $pontuacao0);
    $totalpontuacao0 = mysqli_num_rows($resultadopontuacao0);

    $VerificaIatf = "SELECT * FROM documentos INNER JOIN cadastro on documentos.codFor = cadastro.codFor where iatf <> '2001-01-01' AND iatf <> '0000-00-00' ORDER BY iatf ASC LIMIT 5";
    $resultadoVerificaIatf = mysqli_query($conn,  $VerificaIatf);
    $r_VerificaIatf = mysqli_num_rows($resultadoVerificaIatf);

    $Verificav9001 = "SELECT * FROM documentos INNER JOIN cadastro on documentos.codFor = cadastro.codFor where v9001 <> '2001-01-01' AND v9001 <> '0000-00-00' ORDER BY v9001 ASC LIMIT 5";
    $resultadoVerificav9001 = mysqli_query($conn,  $Verificav9001);
    $r_Verificav9001 = mysqli_num_rows($resultadoVerificav9001);

    $Verificav14001 = "SELECT * FROM documentos INNER JOIN cadastro on documentos.codFor = cadastro.codFor where v14001 <> '2001-01-01' AND v14001 <> '0000-00-00' ORDER BY v14001 ASC LIMIT 5";
    $resultadoVerificav14001 = mysqli_query($conn,  $Verificav14001);
    $r_Verificav14001 = mysqli_num_rows($resultadoVerificav14001);

    $fiat = "SELECT * FROM cadastro where fiat = 'fiat'";
    $resultadoFiat = mysqli_query($conn,  $fiat);
    $totalFiat = mysqli_num_rows($resultadoFiat);

    $volvo = "SELECT * FROM cadastro where volo = 'volvo'";
    $resultadoVolvo = mysqli_query($conn,  $volvo);
    $totalVolvo = mysqli_num_rows($resultadoVolvo);

    $mbb = "SELECT * FROM cadastro where mbb = 'mbb'";
    $resultadoMbb = mysqli_query($conn,  $mbb);
    $totalMbb = mysqli_num_rows($resultadoMbb);

    $scania = "SELECT * FROM cadastro where scania = 'scania'";
    $resultadoScania = mysqli_query($conn,  $scania);
    $totalScania = mysqli_num_rows($resultadoScania);

    $hpe = "SELECT * FROM cadastro where hpe = 'hpe'";
    $resultadoHpe = mysqli_query($conn,  $hpe);
    $totalHpe = mysqli_num_rows($resultadoHpe);
?>

<!doctype html>
<html lang="en">
  <head>
  	<title>Gestão de Fornecedores</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">	
		    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="css/style.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js"></script>
  </head>
  <body>
		<div class="wrapper d-flex align-items-stretch">
			<nav id="sidebar">
				<div class="custom-menu">
					<button type="button" id="sidebarCollapse" class="btn btn-primary">
	        </button>
        </div>
	  		<div class="img bg-wrap text-center py-1" style="background-image: url(images/bg_1.jpg);">
	  			<div class="user-logo">
	  				<img src="../img/logoalpino.png" width="200" height="80" alt="">
            <h3><?php echo $_SESSION['usuarioNomeCompleto']; ?></h3>
            <h6 data-toggle="modal" data-target="#ModalSair" value="<?php echo $_SESSION['usuarioNomeCompleto']?>"><span class="fa fa-sign-out mr-3"> Sair</span></h6>
            <p><?php if($_SESSION['usuarioNiveisAcessoId'] == "1"){ echo "Administrador";}elseif($_SESSION['usuarioNiveisAcessoId'] == "2"){echo "Compras";}elseif($_SESSION['usuarioNiveisAcessoId'] == "3"){echo "SGI";}elseif($_SESSION['usuarioNiveisAcessoId'] == "4"){echo "Consulta";} ?></p>           
          </div>
	  		</div>
        <ul class="list-unstyled components mb-5">
        <li>
        </li>
          <li> 
            <div class="row mt-2 justify-content-md-center">
              <div class="col-md-auto">
                <div class="container">   
                <form action="../cadastro/busca.php" method="POST">    
                  <div class="input-group">
                    <input type="text" class="form-control form-control-sm" id="BuscarCodFor" name="BuscarCodFor" placeholder="Código do Fornecedor" required style="background: #2f89fc; color: white;">
                    <div class="input-group-append">
                      <button class="btn btn-primary btn-sm" type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
                    </div>
                  </div>
                </form>
                </div>
              </div>
            </div>
          </li>
          <li class="panel panel-default" id="dropdown">
						<a data-toggle="collapse" href="#dropdown-cadastro">
							<span class="fa fa-file-text mr-3"></span> Cadastros
						  <span class="caret"></span>
            </a>
						<!-- Dropdown level 1 -->
						<div id="dropdown-cadastro" class="panel-collapse collapse">
							<div class="panel-body">
								<ul class="nav navbar-nav">
									<li><a href="..\Cadastro\index.php"><span class="fa fa-file-o mr-3"></span>> Novo</a></li>
									<li><a href="..\Cadastro\busca.php"><span class="fa fa-pencil-square-o mr-3"></span>> Alterar</a></li>
                </ul>
              </div>
            </div>
          </li>
          <li class="panel panel-default" id="dropdown">
						<a data-toggle="collapse" href="#dropdown-pesquisa">
							<span class="fa fa-search mr-3"></span> Filtros
						  <span class="caret"></span>
            </a>
						<!-- Dropdown level 1 -->
						<div id="dropdown-pesquisa" class="panel-collapse collapse">
							<div class="panel-body">
								<ul class="nav navbar-nav">
									<li><a href="..\Cadastro\tabela.php"><span class="fa fa-file-o mr-3"></span>> Geral</a></li>
                  <li><a href="..\Cadastro\certificacao.php"><span class="fa fa-file-o mr-3"></span>> Por Certificaçao</a></li>
                </ul>
              </div>
            </div>
          </li>
          <li>
              <a href="..\Cadastro\contato.php"><span class="fa fa-address-book mr-3"></span> Contatos</a>
          </li>
          <li>
              <a href="..\Cadastro\desempenho.php"><span class="fa fa-universal-access mr-3"></span> Desempenho</a>
          </li>
          <?php if($_SESSION['usuarioNiveisAcessoId'] == "1"){ 
            echo '<li><a href="..\cadastro\usuarios.php"><span class="fa fa-user mr-3"></span> Usuários</a></li>';
           }?>
        </ul>
    	</nav>
        <!-- Page Content  -->
        <div id="content" class="p-3 p-md-3 pt-5">
          <br>
          <h5 class="mb-4">Sistema para gestão das informações de Compras, Ambiental e Documental de Fornecedores.</h5>
          <div class="row">
                <div class="col-sm-4">
                  <div class="shadow-lg p-3 mb-3 bg-white rounded">
                    <p>Cadastrados: <?php echo $total; ?></p>
                    <canvas id="myChart" class="chartjs"></canvas>
                    <script>
                        var ctx = document.getElementById('myChart').getContext('2d');
                        var myChart = new Chart(ctx, {
                            type: 'doughnut',
                            data: {
                                datasets: [{                               
                                    data: [<?php echo $totalAmbiental; ?>,<?php echo $totalQualidade; ?>, <?php echo $totalServico; ?>],
                                    backgroundColor:["rgb(255, 99, 132)","rgb(54, 162, 235)","rgb(255, 205, 86)"]
                                    }],
                                labels: ['Ambiental', 'Qualidade', 'Serviço'],
                            },
                            options: {
                                legend:{
                                  position: 'left',
                                  display: 'true'                          
                                }
                            }
                        });
                    </script>
                  </div>
              </div>
              <div class="col-sm-4">
                <div class="shadow-lg p-3 mb-3 bg-white rounded">
                  <p>Pontuação - 9001 / IATF / 14001</p>
                  <canvas id="myChart1" class="chartjs"></canvas>
                  <script>
                      var ctx1 = document.getElementById('myChart1').getContext('2d');
                      var myChart1 = new Chart(ctx1, {
                          type: 'bar',
                          data: {
                              datasets: [{    
                                  label: '<?php echo $total; ?> - Pontuações',                           
                                  data: [<?php echo $totalpontuacao100; ?>,<?php echo $totalpontuacao95; ?>, <?php echo $totalpontuacao85; ?>, <?php echo $totalpontuacao0; ?>],
                                  backgroundColor:["rgb(255, 99, 132)","rgb(54, 162, 235)","rgb(255, 205, 86)","rgb(169, 66, 159)"]
                                  }],
                              labels: ['100', '95', '85', '0'],
                          },
                          options: {
                              legend:{
                                position: 'top',
                                display: 'false'                          
                              }
                          }
                      });
                  </script>
                </div>
              </div>
              <div class="col-sm-4">
                <div class="shadow-lg p-3 mb-3 bg-white rounded">
                <p>Cliente por Quantidade de Fornecedores</p>
                  <h6 class="d-flex justify-content-between align-items-center mb-3"><span class="text-muted">Fiat</span><span class="badge badge-primary badge-pill"><?php echo $totalFiat; ?></span></h6>
                  <h6 class="d-flex justify-content-between align-items-center mb-3"><span class="text-muted">HPE</span><span class="badge badge-primary badge-pill"><?php echo $totalHpe; ?></span></h6>
                  <h6 class="d-flex justify-content-between align-items-center mb-3"><span class="text-muted">Mercedes Benz</span><span class="badge badge-primary badge-pill"><?php echo $totalMbb; ?></span></h6>
                  <h6 class="d-flex justify-content-between align-items-center mb-3"><span class="text-muted">Scania</span><span class="badge badge-primary badge-pill"><?php echo $totalScania; ?></span></h6>
                  <h6 class="d-flex justify-content-between align-items-center mb-3"><span class="text-muted">Volvo</span><span class="badge badge-primary badge-pill"><?php echo $totalVolvo; ?></span></h6>
               </div>
              </div>       
          </div>
          <div class="row">
              <div class="col-sm-4">
                <div class="shadow-lg p-2 mb-2 bg-white rounded">
                    <p>Próximos Vencimentos IATF</p>
                    <table class="table table-sm table-borderless">
                      <thread>
                        <tr>
                          <th>Fornecedor</th>
                          <th>Vencimento</th>
                        </tr>
                      </thread>
                      <tbody>
                            <?php while ($r_Iatf = mysqli_fetch_assoc($resultadoVerificaIatf)) { ?>
                              <tr>
                              <td><a href="../cadastro/busca.php?BuscarCodFor=<?php echo $r_Iatf['codFor']; ?>"><?php echo $r_Iatf['codFor'];?> - <?php echo $r_Iatf['fornecedor']; ?></a></td>
                              <td><?php echo date('d/m/Y',strtotime($r_Iatf['iatf'])); ?></td>
                              </tr>
                            <?php }?>
                      </tbody>
                    </table>
                </div>
              </div>
              <div class="col-sm-4">
                <div class="shadow-lg p-2 mb-2 bg-white rounded">
                    <p>Próximos Vencimentos ISO 9001</p>
                    <table class="table table-sm table-borderless">
                      <thread>
                        <tr>
                          <th>Fornecedor</th>
                          <th>Vencimento</th>
                        </tr>
                      </thread>
                      <tbody>
                            <?php while ($r_v9001 = mysqli_fetch_assoc($resultadoVerificav9001)) { ?>
                              <tr>
                              <td><a href="../cadastro/busca.php?BuscarCodFor=<?php echo $r_v9001['codFor']; ?>"><?php echo $r_v9001['codFor'];?> - <?php echo $r_v9001['fornecedor']; ?></a></td>
                              <td><?php echo date('d/m/Y',strtotime($r_v9001['v9001'])); ?></td>
                              </tr>
                            <?php }?>
                      </tbody>
                    </table>
                </div>
              </div>
              <div class="col-sm-4">
                <div class="shadow-lg p-2 mb-2 bg-white rounded">
                    <p>Próximos Vencimentos ISO 14001</p>
                    <table class="table table-sm table-borderless">
                      <thread>
                        <tr>
                          <th>Fornecedor</th>
                          <th>Vencimento</th>
                        </tr>
                      </thread>
                      <tbody>
                            <?php while ($r_v14001 = mysqli_fetch_assoc($resultadoVerificav14001)) { ?>
                              <tr>
                              <td><a href="../cadastro/busca.php?BuscarCodFor=<?php echo $r_v14001['codFor']; ?>"><?php echo $r_v14001['codFor'];?> - <?php echo $r_v14001['fornecedor']; ?></a></td>
                              <td><?php echo date('d/m/Y',strtotime($r_v14001['v14001'])); ?></td>
                              </tr>
                            <?php }?>
                      </tbody>
                    </table>
                </div>
              </div>
            </div>
          </div>
        </div>
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
                <form method="POST" action="../sair.php" class="form-signin">
                  <div class="modal-body">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="user">Usuário:</label>
                            <input type="text" class="form-control" id="user" name="user" value="<?php echo $_SESSION['usuarioNomeCompleto']?>" readonly>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="tipo">Tipo:</label>
                            <input type="text" class="form-control" id="tipo" name="tipo" value="<?php if($_SESSION['usuarioNiveisAcessoId'] == "1"){ echo "Administrador";}elseif($_SESSION['usuarioNiveisAcessoId'] == "2"){echo "Compras";}elseif($_SESSION['usuarioNiveisAcessoId'] == "3"){echo "SGI";}elseif($_SESSION['usuarioNiveisAcessoId'] == "4"){echo "Consulta";} ?>" readonly>
                        </div>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#ModalSenha">Alterar senha</button>
                    <button type="submit" class="btn btn-primary">Sim</button>
                  </div>
                </form>
                </div>
                
              </div>
            </div>
          </div>
          <div class="modal fade" id="ModalSenha" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Alteração de senha</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                <form method="POST" action="alterarSenha.php" class="form-signin">
                  <div class="modal-body">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="user">Usuário:</label>
                            <input type="text" class="form-control" id="user" name="user" value="<?php echo $_SESSION['usuarioNomeCompleto']?>" readonly>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="tipo">Tipo:</label>
                            <input type="text" class="form-control" id="tipo" name="tipo" value="<?php if($_SESSION['usuarioNiveisAcessoId'] == "1"){ echo "Administrador";}elseif($_SESSION['usuarioNiveisAcessoId'] == "2"){echo "Compras";}elseif($_SESSION['usuarioNiveisAcessoId'] == "3"){echo "SGI";}elseif($_SESSION['usuarioNiveisAcessoId'] == "4"){echo "Consulta";} ?>" readonly>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="anterior">Anterior:</label>
                            <input type="password" class="form-control" id="anterior" name="anterior" style="background: #DAA520; color: white;">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="nova">Nova Senha:</label>
                            <input type="password" class="form-control" id="nova" name="nova" style="background: #2f89fc; color: white;">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="novaConfirmar">Confirmar nova:</label>
                            <input type="password" class="form-control" id="novaConfirmar" name="novaConfirmar" onblur="confirmarSenha()" style="background: #2f89fc; color: white;">
                        </div>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" id="BotaoAlterar" disabled>Alterar</button>
                  </div>
                </form>
                </div>
                
              </div>
            </div>
          </div>

    <script src="js/jquery.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
    <script>
      function confirmarSenha(){

        var nova = document.getElementById('nova').value
        var confirma = document.getElementById('novaConfirmar').value

        if(nova != confirma){
         alert("Campos 'Nova senha' e 'Confirmar nova' diferentes, por favor verifique.");
         document.getElementById("BotaoAlterar").disabled = true;
        }else{
          document.getElementById("BotaoAlterar").disabled = false;
        }

      }
    </script>
  </body>
</html>