<?php 

//error_reporting(E_NOTICE);
//ini_set("display_errors",0);

include("conexao.php");

$arrayPostAll = $_POST['Codfor'];
$arrayPost = explode(" - ",$arrayPostAll);


$codFor = $arrayPost[0]; 
$fornecedor = $arrayPost[1];
$mes = $_POST['mes'];
$ano = $_POST['ano']; 
$fornecimento = "Não"; 
$pontuacao = "0";
$recebimento = "0";
$nivel1 = "0"; 
$nivel2 = "0";
$cliente = "0";
$pontos = "0";
$qtdePrazo = "0";
$pontos2 = 0;
$qtdeEntrega = 0;
$pontos3 = 0;
$fora = 0;
$pontos4 = 0;
$qualidade = 0;
$entrega = 0; 
$entregaAtraso = 0;
$pontos5 = 0; 
$quebra = 0; 
$quebraCliente = 0;
$pontos6 = 0;
$parada = 0;
$paradaCliente = 0;
$pontos7 = 0;
$logistica = 0;
$auditoria = 0;
$idf = 0;


$Verifica = mysqli_query($conn,"SELECT * FROM desempenho WHERE ano='$ano' and mes='$mes' and codFor='$codFor'");
$num_rows = mysqli_num_rows($Verifica);


if ($num_rows >= 1) {
  echo "<script language='javascript' type='text/javascript'>
    alert('Já existe cadastro para o fornecedor com esse período!'); window.location.href='desempenho.php'
  </script>";
}else{
  $query = "INSERT INTO desempenho (id, mes, ano, codFor, fornecedor, fornecimento, pontuacao, recebimento, nivel1, nivel2, cliente, pontos, qtdePrazo, pontos2, qtdeEntrega, pontos3, fora, pontos4, qualidade, entrega, entregaAtraso, pontos5, quebra, quebraCliente, pontos6, parada, paradaCliente, pontos7, logistica, auditoria, idf) VALUES (null, '$mes', '$ano', '$codFor', '$fornecedor', '$fornecimento', '$pontuacao', '$recebimento', '$nivel1', '$nivel2', '$cliente', '$pontos', '$qtdePrazo', '$pontos2', '$qtdeEntrega', '$pontos3', '$fora', '$pontos4', '$qualidade', '$entrega', '$entregaAtraso', '$pontos5', '$quebra', '$quebraCliente', '$pontos6', '$parada', '$paradaCliente', '$pontos7', '$logistica', '$auditoria', '$idf')";

  if ($conn->query($query) === TRUE) {
      echo "<script language='javascript' type='text/javascript'>
      alert('Cadastrado com sucesso!'); window.location.href='desempenho.php'
     </script>";
    } else {
      echo "Error: " . $query . "<br>" . $conn->error;
    }
}

?>