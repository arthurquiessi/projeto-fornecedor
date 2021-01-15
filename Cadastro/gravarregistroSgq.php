<?php 
session_start();
include("conexao.php");




$id = $_POST['id']; 
$iatf = $_POST['iatfSGQ'];
$programada = $_POST['programadaSGQ'];
$pontuacao = $_POST['pontuacaoSGQ'];
$frequencia = $_POST['frequencia'];
$nova = $_POST['novaSgq'];
$sgq = $_POST['sgq'];
$usuario = $_SESSION['usuarioNomeCompleto'];
$DataAtual = date("Y/m/d");



$alteraSgq = "UPDATE sgq SET iatfSGQ='$iatf', programadaSGQ='$programada', pontuacaoSGQ='$pontuacao', frequencia='$frequencia', nova='$nova', sgq='$sgq', usuario='$usuario', dataAtual='$DataAtual'  WHERE codFor='$id' ";
$alterarSgq = mysqli_query($conn,$alteraSgq);

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
					alert(\"Registro alterado com Sucesso.\");
				</script>
			";
		}else{
			echo "

				<script type=\"text/javascript\">
				window.location.href='index.php'
					alert(\"Registro não foi alterado.\");
				</script>
			";	
		}?>
	</body>
</html>
<?php $conn->close(); ?>