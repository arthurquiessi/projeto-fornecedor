<?php 
session_start();
include("conexao.php");

$id = $_POST['id']; 
$nota = $_POST['nota'];

if ($_POST['Oprealizado'] == 'OprealizadoNao'){
	$realizado = '01/01/0001';
}else{
	$realizado = $_POST['realizado'];
}

if ($_POST['Opprogramada'] == 'OpprogramadaNao'){
	$programada = '01/01/0001';
}else{
	$programada = $_POST['programada'];
}

if ($_POST['Oprelatorio'] == 'OprelatorioNao'){
	$relatorio = '01/01/0001';
}else{
	$relatorio = $_POST['relatorio'];
}
if ($_POST['Opprazo'] == 'OpprazoNao'){
	$prazo = '01/01/0001';
}else{
	$prazo = $_POST['prazo'];
}

$plano = $_POST['plano'];

if ($_POST['OpPrevisao'] == 'OpPrevisaoNao'){
	$previsao = '01/01/0001';
}else{
	$previsao = $_POST['previsao'];
}

$classificacao = $_POST['classificacao'];
$auditoria = $_POST['auditoria'];
$usuario = $_SESSION['usuarioNomeCompleto'];
$DataAtual = date("Y/m/d");


$alteraAuditoria = "UPDATE auditoria SET nota='$nota', realizado='$realizado', programada='$programada', relatorio='$relatorio', prazo='$prazo', plano='$plano' , previsao='$previsao' , classificacao='$classificacao' , auditoria='$auditoria', usuario='$usuario', dataAtual='$DataAtual'  WHERE codFor='$id' ";
$alterarAuditoria = mysqli_query($conn,$alteraAuditoria);

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