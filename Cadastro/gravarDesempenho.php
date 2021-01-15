<?php 

include("conexao.php");

$id = $_POST['recipientId']; 
$mes = $_POST['mes']; 
$ano = $_POST['ano']; 
$codFor = $_POST['codFor']; 
$fornecimento = $_POST['fornecimento']; 
$pontuacao = $_POST['pontuacao']; 
$recebimento = $_POST['recebimento']; 
$nivel1 = $_POST['nivel1']; 
$nivel2 = $_POST['nivel2']; 
$cliente = $_POST['cliente']; 
$pontos = $_POST['pontos']; 
$qtdePrazo = $_POST['qtdePrazo']; 
$pontos2 = $_POST['pontos2']; 
$qtdeEntrega = $_POST['qtdeEntrega']; 
$pontos3 = $_POST['pontos3']; 
$fora = $_POST['fora']; 
$pontos4 = $_POST['pontos4']; 
$qualidade = $_POST['qualidade']; 
$entrega = $_POST['entrega']; 
$entregaAtraso = $_POST['entregaAtraso']; 
$pontos5 = $_POST['pontos5']; 
$quebra = $_POST['quebra']; 
$quebraCliente = $_POST['quebraCliente'];
$pontos6 = $_POST['pontos6'];
$parada = $_POST['parada'];
$paradaCliente = $_POST['paradaCliente'];
$pontos7 = $_POST['pontos7'];
$logistica = $_POST['logistica'];
$idf = $_POST['idf'];


$alterarDesempenho = "UPDATE desempenho SET mes='$mes', ano='$ano', codFor='$codFor', fornecimento='$fornecimento', pontuacao='$pontuacao', recebimento='$recebimento', nivel1='$nivel1', nivel2='$nivel2', cliente='$cliente', pontos='$pontos', qtdePrazo='$qtdePrazo', pontos2='$pontos2', qtdeEntrega='$qtdeEntrega' , pontos3='$pontos3', fora='$fora', pontos4='$pontos4' , qualidade='$qualidade', entrega='$entrega', entregaAtraso='$entregaAtraso', pontos5='$pontos5', quebra='$quebra', quebraCliente='$quebraCliente', pontos6='$pontos6', parada='$parada', paradaCliente='$paradaCliente', pontos7='$pontos7', logistica='$logistica', idf='$idf' WHERE id='$id' ";
$alteraDesempenho = mysqli_query($conn,$alterarDesempenho);

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
				window.location.href='desempenho.php'
					alert(\"Alterado com Sucesso.\");
				</script>
			";
		}else{
			echo "
        
				<script type=\"text/javascript\">
				window.location.href='desempenho.php'
					alert(\"Não foi alterado.\");
				</script>
			";	
		}?>
	</body>
</html>
<?php $conn->close(); ?>