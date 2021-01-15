<?php
include("conexao.php");

$nome = $_POST['user']; 
$nova = md5($_POST['nova']); 
$anterior = md5($_POST['anterior']);
//md5($_POST['anterior']); 

$alteraSenha = "UPDATE usuarios SET senha='$nova' WHERE nome='$nome' AND senha='$anterior' ";
$alterarSenha = mysqli_query($conn,$alteraSenha);

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
				window.location.href='index.php'
					alert(\"Atualizado com sucesso.\");
				</script>
			";
		}else{
			echo "
			
				<script type=\"text/javascript\">
				window.location.href='index.php'
					alert(\"Dados incorretos.\");
				</script>
			";	
		}?>
	</body>
</html>
<?php $conn->close(); ?>