<?php 


//error_reporting(E_NOTICE);
//ini_set("display_errors",0);

include("conexao.php");

$id = $_POST['idCad']; 
$nome = $_POST['nome'];
$tipo = $_POST['tipo'];
$email = $_POST['email'];
$senha = md5($_POST['senha']);  

        $query = mysqli_query($conn,"INSERT INTO usuarios(id,nome,niveis_acesso_id,email,senha)VALUES('$id','$nome','$tipo','$email','$senha')"); 

        if($query){ //Se verdadeiro, cadastra
                echo"<script language='javascript' type='text/javascript'>
                 alert('Cadastrado com sucesso!'); window.location.href='usuarios.php'
                </script>";
               }else{ //Falso, retorna para formulário
                 echo"<script language='javascript' type='text/javascript'>
                 alert('Não foi possível cadastrar!');window.location.href='usuarios.php'
                 </script>";
               }
        
       

?>