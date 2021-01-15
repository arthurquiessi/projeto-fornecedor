<?php
	session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta http-equiv="X-UA-Compatible" content="ie=edge" />

        <!-- Ícone da aba do navegador -->
        <link rel="icon" href="..\img\arquivos.png" />

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous" />
        <meta charset="utf-8" />
    </head>

    <body>
        <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
            <a class="navbar-brand" href="../inicial/index.php">
                <img src="..\img\logoalpino.png" width="100" height="40" alt="" />
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#conteudoNavbarSuportado" aria-controls="conteudoNavbarSuportado" aria-expanded="false" aria-label="Alterna navegação">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="conteudoNavbarSuportado">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item  active dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Cadastros</a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="\Fornecedores\Cadastro\index.php">Novo Fornecedor</a>
                            <a class="dropdown-item" href="\Fornecedores\Cadastro\busca.php">Alterar Fornecedor</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="\Fornecedores\Cadastro\contato.php">Contatos</a>
                        </div>
                    </li>
                    <li class="nav-item active dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownFiltros" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Filtros</a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="\Fornecedores\Cadastro\tabela.php">Geral</a>
                            <a class="dropdown-item" href="\Fornecedores\Cadastro\certificacao.php">Por Certificações</a>
                        </div>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="\Fornecedores\Cadastro\desempenho.php">Desempenho</a>
                    </li>
                </ul>
                  <form action="busca.php" method="POST">
                      <div class="form-row">
                          <div class="col">
                              <input type="text" class="form-control form-control-sm" id="BuscarCodFor" name="BuscarCodFor" placeholder="Cód Fornecedor" required />
                          </div>
                          <div class="col">
                              <button type="submit" class="btn btn-outline-primary btn-sm">
                                  <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-search" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                      <path fill-rule="evenodd" d="M10.442 10.442a1 1 0 0 1 1.415 0l3.85 3.85a1 1 0 0 1-1.414 1.415l-3.85-3.85a1 1 0 0 1 0-1.415z" />
                                      <path fill-rule="evenodd" d="M6.5 12a5.5 5.5 0 1 0 0-11 5.5 5.5 0 0 0 0 11zM13 6.5a6.5 6.5 0 1 1-13 0 6.5 6.5 0 0 1 13 0z" />
                                  </svg>
                              </button>
                          </div>
                      </div>
                  </form>
                  <a href="#"><input type="text" class="form-control-plaintext text-white" readonly data-toggle="modal" data-target="#ModalSair" value="<?php echo $_SESSION['usuarioNomeCompleto']?>" /></a>
            </div>
        </nav>

        <!-- Modal -->
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
                <form method="POST" action="../alterarSenha.php" class="form-signin">
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



    </body>
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
</html>
