<?php
include_once('../conexao.php');
                $variavelvCodFor = $_POST['name']; 
                $queryAuditoria = mysqli_query($conn,"SELECT * FROM auditoria WHERE codFor LIKE '%$variavelvCodFor%' LIMIT 1");
                
                if(($queryAuditoria) AND ($queryAuditoria->num_rows != 0)){
                    while($row_Auditoria = mysqli_fetch_assoc($queryAuditoria)){
                        echo $row_Auditoria['auditoria'];
                    }
                }else{
                    echo "Não encontrado";
                }
                
        
?>