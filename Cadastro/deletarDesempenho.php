
<?php

include("conexao.php");


$id = $_POST['name'];



$DeleteDesempenho = "DELETE from desempenho WHERE id='$id' ";
$DeletarDesempenho = mysqli_query($conn,$DeleteDesempenho);

if($DeletarDesempenho){
   echo "Excluido com Sucesso!";
}else{
    echo "Não Excluido";
}

?>
