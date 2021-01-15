<?php 
session_start();

include("conexao.php");
 
$id = $_POST['id']; 
$fornecedor = $_POST['fornecedor'];
$codfor = $_POST['codfor'];
$tipo = $_POST['tipo'];
$fabricante = $_POST['fabricante']; 
$detalhe = $_POST['detalhe'];
//echo '$_POST["fiat"]';
if (empty($_POST['fiat'])) {
	$fiat = "";
}else{
	$fiat = $_POST['fiat'];
}

if (empty($_POST['volvo'])) {
	$volvo = "";
}else{
	$volvo = $_POST['volvo'];
}

if (empty($_POST['mbb'])) {
	$mbb = "";
}else{
	$mbb = $_POST['mbb'];
}

if (empty($_POST['scania'])) {
	$scania = "";
}else{
	$scania = $_POST['scania'];
}

if (empty($_POST['daf'])) {
	$daf = "";
}else{
	$daf = $_POST['daf'];
}

if (empty($_POST['hpe'])) {
	$hpe = "";
}else{
	$hpe = $_POST['hpe'];
}

if (empty($_POST['branca'])) {
	$branca = "";
}else{
	$branca = $_POST['branca'];
}

if (empty($_POST['maquina'])) {
	$maquina = "";
}else{
	$maquina = $_POST['maquina'];
}

if (empty($_POST['outras'])) {
	$outras = "";
}else{
	$outras = $_POST['outras'];
}
$fonte = $_POST['fonte'];
$critico = $_POST['critico'];
$situacao = $_POST['situacao'];
$consulta = $_POST['consulta'];
$termo = $_POST['termo'];
$confidencialidade = $_POST['confidencialidade'];
$tresponsabilidade = $_POST['tresponsabilidade'];
$responsabilidade = $_POST['responsabilidade'];
$usuario = $_SESSION['usuarioNomeCompleto'];
$DataAtual = date("Y/m/d");


$alteracodFor = "UPDATE cadastro SET fornecedor='$fornecedor',codFor='$codfor', fornecedor='$fornecedor', tipo='$tipo', fabricante='$fabricante', 
detalhe='$detalhe' , fiat='$fiat', volo='$volvo' , mbb='$mbb' , scania='$scania' , daf='$daf' , hpe='$hpe' , branca='$branca'  , maquina='$maquina', 
outras='$outras'  , fonte='$fonte'  , critico='$critico', confidencialidade='$confidencialidade' , situacao='$situacao', consulta='$consulta', termo='$termo', 
confidencialidade='$confidencialidade' , tResponsabilidade='$tresponsabilidade' , responsabilidade='$responsabilidade', usuario='$usuario', dataAtual='$DataAtual'  WHERE id='$id' ";
$alterarcodFor = mysqli_query($conn,$alteracodFor);


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
