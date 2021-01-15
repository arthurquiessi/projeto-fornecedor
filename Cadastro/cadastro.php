<?php 
session_start();

error_reporting(E_NOTICE);
ini_set("display_errors",0);

include("conexao.php");
 
$id = $_POST['id']; 
$fornecedor = $_POST['fornecedor'];
$codfor = $_POST['codfor'];
$tipo = $_POST['tipo'];
$fabricante = $_POST['fabricante']; 
$detalhe = $_POST['detalhe'];
$fiat = $_POST['fiat'];
$volvo = $_POST['volvo'];
$mbb = $_POST['mbb'];
$scania = $_POST['scania'];
$daf = $_POST['daf'];
$hpe = $_POST['hpe'];
$branca = $_POST['branca'];
$maquina = $_POST['maquina'];
$outras = $_POST['outras'];
$fonte = $_POST['fonte'];
$critico = $_POST['critico'];
$situacao = $_POST['situacao'];
$consulta = $_POST['consulta'];
$termo = $_POST['termo'];
$responsabilidade = $_POST['responsabilidade'];
$confidencialidade = $_POST['confidencialidade'];
$tResponsabilidade = $_POST['tresponsabilidade'];
$usuario = $_SESSION['usuarioNomeCompleto'];
$DataAtual = date("Y/m/d");

 

        $query = mysqli_query($conn,"INSERT INTO cadastro(id,fornecedor,codFor,tipo,fabricante,detalhe,fiat,volo,mbb,scania,daf,hpe,branca,maquina,outras,fonte,critico,situacao,consulta,termo,responsabilidade,confidencialidade,tresponsabilidade,usuario,dataAtual)VALUES('$id','$fornecedor','$codfor','$tipo','$fabricante','$detalhe','$fiat','$volvo','$mbb','$scania','$daf','$hpe','$branca','$maquina','$outras','$fonte','$critico','$situacao','$consulta','$termo','$responsabilidade','$confidencialidade','$tResponsabilidade','$usuario','$DataAtual')"); // Insere no Banco
        $queryDocumentos = mysqli_query($conn,"INSERT INTO documentos(codFor)VALUES('$codfor')"); // Insere no Banco Documentos
        $queryAuditoria = mysqli_query($conn,"INSERT INTO auditoria(codFor)VALUES('$codfor')"); // Insere no Banco Auditoria
        $querySgq = mysqli_query($conn,"INSERT INTO sgq(codFor)VALUES('$codfor')"); // Insere no Banco Auditoria

        if($query){ //Se verdadeiro, cadastra
         echo"<script language='javascript' type='text/javascript'>
          alert('Cadastrado com sucesso!'); window.location.href='index.php'
          </script>";
        }else{ //Falso, retorna para formulário
          echo"<script language='javascript' type='text/javascript'>
          alert('Não foi possível cadastrar!');window.location.href='index.php'
          </script>";
        }

?>
