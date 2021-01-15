<?php
include_once('../conexao.php');
                $variavelvCodFor = $_POST['name']; 
                $queryCertificado = mysqli_query($conn,"SELECT * FROM documentos WHERE codFor LIKE '%$variavelvCodFor%' LIMIT 1");
                
                if(($queryCertificado) AND ($queryCertificado->num_rows != 0)){
                    while($row_Certificado = mysqli_fetch_assoc($queryCertificado)){
                        echo $row_Certificado['pontuacao'];
                    }
                }else{
                    echo "Não encontrado";
                }
                
        
?>