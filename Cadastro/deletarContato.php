
<?php

include("conexao.php");


$id = $_GET['Idmodal'];



$DeletecodContato = "DELETE from contato WHERE id='$id' ";
$DeletarcodContato = mysqli_query($conn,$DeletecodContato);


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
				window.location.href='contato.php'
					alert(\"Contato deletado com Sucesso!\");
				</script>
			";	
		}else{
			echo "
							
				<script type=\"text/javascript\">
				window.location.href='contato.php'
					alert(\"NÃO foi deletado.\");
				</script>
			";	
		}?>
	</body>
</html>
<?php $conn->close(); ?>