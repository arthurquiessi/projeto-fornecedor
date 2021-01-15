<?php
include("conexao.php");

$mesDe = $_POST['mesDe']; 
$anoDe = $_POST['anoDe']; 
$mesPara = $_POST['mesPara']; 
$anoPara = $_POST['anoPara']; 

$Verifica = mysqli_query($conn,"SELECT * FROM desempenho WHERE ano='$anoPara' and mes='$mesPara'");
$num_rows = mysqli_num_rows($Verifica);

if ($num_rows >= 1) {
  echo "<script language='javascript' type='text/javascript'>
    alert('Já existe esse período cadastrado!'); window.location.href='desempenho.php'
  </script>";
}else{
  $query = "CREATE TEMPORARY TABLE ttable AS SELECT * FROM desempenho WHERE mes= '$mesDe' AND `ano`='$anoDe'";
  $queryUpdate = "UPDATE ttable SET id=NULL, mes='$mesPara', ano='$anoPara'"; 
  $queryInsert = "INSERT INTO desempenho SELECT * FROM ttable"; 

  $conn->query($query);
  $conn->query($queryUpdate);
  //$conn->query($queryInsert);

  if ($conn->query($queryInsert) === TRUE) {
      echo "<script language='javascript' type='text/javascript'>
      alert('Copiado com sucesso!'); window.location.href='desempenho.php'
    </script>";
    } else {
      echo "Error: " . $query . "<br>" . $conn->error;
    }
}



  ?>