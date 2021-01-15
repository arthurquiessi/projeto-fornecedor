<?php 

include("conexao.php");

$id = $_POST['idModal']; 
$nome = $_POST['nome']; 
$tipo = $_POST['tipo']; 
$email = $_POST['email']; 
$senha = md5($_POST['senha']); 



$alteraUsuario = "UPDATE usuarios SET nome='$nome', niveis_acesso_id='$tipo', email='$email', senha='$senha' WHERE id='$id' ";
$alterarUsuario = mysqli_query($conn,$alteraUsuario);

?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
	</head>
	<body> 
	<?php
		if(mysqli_affected_rows($conn) != 0){
			echo "<script type=\"text/javascript\">
				window.location.href='usuarios.php'
					alert(\"Contato alterado com Sucesso.\");
				</script>
			";
		}else{
			echo "<script type=\"text/javascript\">
				window.location.href='usuarios.php'
					alert(\"Contato não foi alterado.\");
				</script>
			";	
		}?>
	</body>
</html>
<?php $conn->close(); ?>

