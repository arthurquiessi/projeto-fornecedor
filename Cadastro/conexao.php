<?php 
    $hostname = "localhost";//Nome do servidor
    $bd = "fornecedores";//Qual banco está apontado
    $usuario = "root";//Nome usuário
    $senha = "";//senha

        $conn = new mysqli($hostname, $usuario, $senha, $bd); //Conexão direta com o banco

            if ($conn->connect_errno) {
        echo "Falha ao conectar: (" . $conn->connect_errno . ") " . $conn->connect_error;//teste de conexão
            }

?>