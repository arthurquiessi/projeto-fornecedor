<?php
	session_start();
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
    
    <!-- Estilos customizados para esse projeto -->
    <link href="css\estilo.css" rel="stylesheet">

    <title>Login - Gestão de Fornecedores</title>
</head>

<body class="text-center">    
    <form class="form-signin" method="POST" action="valida.php">
    <img class="mb-4" src="img\logoAlpino.png" alt="" width="180" height="72">
    <h1 class="h3 mb-3 font-weight-normal">Gestão de Fornecedores</h1>

        <label for="inputEmail" class="sr-only">Email</label>
        <input type="email" name="email" id="email" class="form-control" placeholder="Email" required autofocus>
        <label for="inputPassword" class="sr-only">Senha</label>
        <input type="password" name="senha" id="SENHA" class="form-control" placeholder="Senha" required>
        <button class="btn btn-lg btn-primary btn-block" id="login" name="login" type="submit">Acessar</button>
      </form>
	  <p class="text-center text-danger">
			<?php if(isset($_SESSION['loginErro'])){
				echo $_SESSION['loginErro'];
				unset($_SESSION['loginErro']);
			}?>
		</p>
		<p class="text-center text-success">
			<?php 
			if(isset($_SESSION['logindeslogado'])){
                
                echo $_SESSION['logindeslogado'];
                echo"<script language='javascript' type='text/javascript'>
                    alert('Usuário deslogado!');window.location.
                    href='index.php'</script>";
                
				unset($_SESSION['logindeslogado']);
			}
			?>
		</p>
    </div>

    <!-- JavaScript (Opcional) -->
    <!-- jQuery primeiro, depois Popper.js, depois Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>

</html>