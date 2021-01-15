
<?php

include("conexao.php");
$id = $_GET['idModal'];



$DeleteUsuario = "DELETE from usuarios WHERE id='$id' ";
$DeletarUsuario = mysqli_query($conn,$DeleteUsuario);


?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
	</head>
	<body>
	<?php
		if(mysqli_affected_rows($conn) != 0){
			echo "
				<script type=\"text/javascript\">
					alert(\"Contato deletado com Sucesso!\"); window.location.href='usuarios.php';
				</script>
			";	
		}else{
			echo "			
				<script type=\"text/javascript\">
					alert(\"NÃO foi deletado.\"); window.location.href='usuarios.php';
				</script>
			";	
		}?>
	</body>
</html>
<?php $conn->close(); ?>