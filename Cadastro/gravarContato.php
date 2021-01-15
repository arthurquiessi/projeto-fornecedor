<?php 

include("conexao.php");

$id = $_POST['Idmodal']; 
$codFor = $_POST['CodForModal']; 
$nome = $_POST['Nomemodal']; 
$email = $_POST['Emailmodal']; 
$telefone = $_POST['Phonemodal']; 
$observacao = $_POST['Obsmodal']; 






$alteraContato = "UPDATE contato SET codFor='$codFor', nome='$nome', email='$email', telefone='$telefone', observacao='$observacao' WHERE id='$id' ";
$alterarContato = mysqli_query($conn,$alteraContato);

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
				window.location.href='contato.php'
					alert(\"Contato alterado com Sucesso.\");
				</script>
			";
		}else{
			echo "
			
				<script type=\"text/javascript\">
				window.location.href='contato.php'
					alert(\"Contato não foi alterado.\");
				</script>
			";	
		}?>
	</body>
</html>
<?php $conn->close(); ?>