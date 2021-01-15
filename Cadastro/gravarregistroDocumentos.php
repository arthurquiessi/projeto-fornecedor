<?php 
session_start();
include("conexao.php");

$id = $_POST['id']; 

if ($_POST['OpIatf'] == 'OpIatfNao'){
	$iatf = '01/01/0001';
}else{
	$iatf = $_POST['iatf'];
}

if ($_POST['Opv9001'] == 'Opv9001Nao'){
	$v9001 = '01/01/0001';
}else{
	$v9001 = $_POST['v9001'];
}

if ($_POST['Opv14001'] == 'Opv14001Nao'){
	$v14001 = '01/01/0001';
}else{
	$v14001 = $_POST['v14001'];
}

$pontuacao = $_POST['pontuacao'];

if ($_POST['Opmunicipal'] == 'OpmunicipalNao'){
	$municipal = '01/01/0001';
}else{
	$municipal = $_POST['municipal'];
}

if ($_POST['Opoperacao'] == 'OpoperacaoNao'){
	$operacao = '01/01/0001';
}else{
	$operacao = $_POST['operacao'];
}
if ($_POST['Opibama'] == 'OpibamaNao'){
	$ibama = '01/01/0001';
}else{
	$ibama = $_POST['ibama'];
}
if ($_POST['Opavcb'] == 'OpavcbNao'){
	$avcb = '01/01/0001';
}else{
	$avcb = $_POST['avcb'];
}
if ($_POST['Opcrea'] == 'OpcreaNao'){
	$crea = '01/01/0001';
}else{
	$crea = $_POST['crea'];
}
if ($_POST['Opcivil'] == 'OpcivilNao'){
	$civil = '01/01/0001';
}else{
	$civil = $_POST['civil'];
}
if ($_POST['Oppolicia'] == 'OppoliciaNao'){
	$policia = '01/01/0001';
}else{
	$policia = $_POST['policia'];
}
if ($_POST['Opcadris'] == 'OpcadrisNao'){
	$cadris = '01/01/0001';
}else{
	$cadris = $_POST['cadris'];
}
if ($_POST['Opexercito'] == 'OpexercitoNao'){
	$exercito = '01/01/0001';
}else{
	$exercito = $_POST['exercito'];
}
if ($_POST['Opanp'] == 'OpanpNao'){
	$anp = '01/01/0001';
}else{
	$anp = $_POST['anp'];
}
if ($_POST['Opinmetro'] == 'OpinmetroNao'){
	$inmetro = '01/01/0001';
}else{
	$inmetro = $_POST['inmetro'];
}
if ($_POST['Opmopp'] == 'OpmoppNao'){
	$mopp = '01/01/0001';
}else{
	$mopp = $_POST['mopp'];
}
if ($_POST['Opoutros'] == 'OpoutrosNao'){
	$outros = '01/01/0001';
}else{
	$outros = $_POST['outros'];
}

$observacoes = $_POST['observacoes'];
$usuario = $_SESSION['usuarioNomeCompleto'];
$DataAtual = date("Y/m/d");

$alteraDocumentos = "UPDATE documentos SET iatf='$iatf', v9001='$v9001', v14001='$v14001', pontuacao='$pontuacao', municipal='$municipal', operacao='$operacao' , ibama='$ibama' , avcb='$avcb' , crea='$crea' , civil='$civil' , policia='$policia' , cadris='$cadris'  , exercito='$exercito', anp='$anp'  , inmetro='$inmetro' , mopp='$mopp', outros='$outros' , observacoes='$observacoes', usuario='$usuario', dataAtual='$DataAtual' WHERE codFor='$id' ";
$alterarDocumentos = mysqli_query($conn,$alteraDocumentos);

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
				window.location.href='index.php'
				<script type=\"text/javascript\">
					alert(\"Registro não foi alterado.\");
				</script>
			";	
		}?>
	</body>
</html>
<?php $conn->close(); ?>