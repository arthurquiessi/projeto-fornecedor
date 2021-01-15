
<?php

include("conexao.php");

$reg = $_POST['regDelete'];
$codFor = $_POST['regDeletecod'];

$DeletecodFor = "DELETE from cadastro WHERE id='$reg' ";
$DeletarcodFor = mysqli_query($conn,$DeletecodFor);


$DeletecodContato = "DELETE from documentos WHERE codFor='$codFor' ";
$DeletarcodContato = mysqli_query($conn,$DeletecodContato);

$DeleteAuditoria = "DELETE from auditoria WHERE codFor='$codFor' ";
$DeletarAuditoriia = mysqli_query($conn,$DeleteAuditoria);

$DeleteSqq = "DELETE from sgq WHERE  codFor='$codFor'";
$DeletarSgq = mysqli_query($conn,$DeleteSqq);

$DeleteContato = "DELETE from contato WHERE  codFor='$codFor' ";
$DeletarContato = mysqli_query($conn,$DeleteContato);


?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
	</head>

	<body> <?php
		if(mysqli_affected_rows($conn) != 0){
			echo "
				
				<script type=\"text/javascript\">
				window.location.href='index.php'
					alert(\"DELETADO com Sucesso!\");
				</script>
			";	
		}else{
			echo "
							
				<script type=\"text/javascript\">
				window.location.href='index.php'
					alert(\"NÃO foi deletado com Sucesso.\");
				</script>
			";	
		}?>
	</body>
</html>
<?php $conn->close(); ?>