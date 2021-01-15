<?php 


//error_reporting(E_NOTICE);
//ini_set("display_errors",0);

include("conexao.php");
 
$id = $_POST['id']; 
$codFor = $_POST['Codfor'];
$Nome = $_POST['NomeContato'];
$Email = $_POST['Email'];
$Phone = $_POST['Phone']; 
$Obs = $_POST['Obs'];


 

        $query = mysqli_query($conn,"INSERT INTO contato(id,codFor,nome, email,telefone,observacao)VALUES('$id','$codFor','$Nome','$Email','$Phone','$Obs')"); 

        if($query){ //Se verdadeiro, cadastra
         echo"<script language='javascript' type='text/javascript'>
          alert('Cadastrado com sucesso!'); window.location.href='contato.php'
         </script>";
        }else{ //Falso, retorna para formulário
          echo"<script language='javascript' type='text/javascript'>
          alert('Não foi possível cadastrar!');window.location.href='contato.php'
          </script>";
        }

?>