<?php
   
    include("conexao.php");
    error_reporting(E_NOTICE);
    ini_set("display_errors",0);
    session_start();
   

    if (!isset($_SESSION['usuarioNomeCompleto'])){
        echo "
                
                <script type=\"text/javascript\">
                window.location.href='../index.php'
                    alert(\"FAZER LOGIN\");
                </script>
            ";
    }
    include('../nav.php');
    $query = mysqli_query($conn, "SELECT * FROM cadastro INNER JOIN documentos ON cadastro.codFor = documentos.codFor INNER JOIN auditoria ON cadastro.codFor = auditoria.codFor INNER JOIN sgq ON cadastro.codFor = sgq.codFor  ORDER BY cadastro.codFor;");
    $num = mysqli_num_rows($query);
    $hoje = date('Y/m/d');
    ?>
<html lang="pt-br">

    <head>
        <!-- Meta tags Obrigatórias -->
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <!-- <script>$(function(){$("#nav-placeholder").load("nav.html");});</script> -->
        <!-- Ícone da aba do navegador 
        <link rel="icon" href="img\iconeTI.ico">-->
        <!-- Bootstrap CSS -->
        <link href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css" rel="stylesheet" />
        <link href="https://cdn.datatables.net/buttons/1.6.2/css/buttons.bootstrap4.min.css" rel="stylesheet" />
        <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.6.2/js/dataTables.buttons.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.bootstrap4.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.html5.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.print.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.colVis.min.js"></script>
        <script>
        $(document).ready(function() {
            $('#result').DataTable({
                dom: 'Bfrtip',
                buttons: ['copy', 'excel', 'pdf', 'print', 'colvis']
            });
            table.buttons().container().appendTo('#result_wrapper .col-md-6:eq(0)');
        });
    </script>



        <title>Pesquisa Fornecedor</title>
    </head>
    <body class="bg-light">
        <div class="container-fluid">
            <br>
            <div class="py-2 text-center">
                <h3>Filtro de Fornecedores</h2>
                <p class="lead">Certificações e Pontuação</p>
            </div>
            <div class="card">
                <div class="card-body">
                <table id="result" class="table table-striped table-bordered display" style="width:100%">
                    <!-- Início da tabela -->
                    <thead>
                        <!-- Cabeçalho da tabela -->
                        <tr>
                            <th scope="col">ID</th>
                            <?php echo '<th scope="col">Código</th>'; ?>
                            <?php echo '<th scope="col">Fornecedor</th>'; ?>
                            <?php  echo '<th scope="col">Tipo</th>'; ?>
                            <?php echo '<th scope="col">IATF</th>'; ?>
                            <?php echo '<th scope="col">9001</th>'; ?>
                            <?php  echo '<th scope="col">14001</th>'; ?>
                            <?php  echo '<th scope="col">Pontuação</th>'; ?>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Corpo da tabela com informações vindas do banco de dados -->
                        <?php while ($rows = mysqli_fetch_assoc($query)) { ?>

                            <!-- Abre o array da referente a busca -->
                            <tr>
                                <td>
                                    <a href="busca.php?BuscarCodFor=<?php echo $rows['codFor']; ?>" target="_blank"><?php echo $rows['id']; ?></a>
                                </td>
                                <?php
                                    echo '<td>';
                                    echo $rows['codFor'];
                                    echo '</td>';
                                ?>
                                <?php 
                                    echo '<td>';
                                    echo $rows['fornecedor'];
                                    echo '</td>';
                                ?>
                                <?php
                                    echo '<td>';
                                    echo $rows['tipo'];
                                    echo '</td>';
                                 ?>
                                
                                <?php 
                                    if (strtotime($rows['iatf']) < strtotime($hoje) ){
                                        if($rows['iatf'] == "2001-01-01"){echo '<td>';}else{echo '<td bgcolor="RED">';}; 
                                        if($rows['iatf'] == "2001-01-01"){echo '-';}else{echo date('d/m/Y',strtotime($rows['iatf']));};
                                        echo '</td>';
                                    }elseif (strtotime($rows['iatf']) > strtotime('31 days', strtotime($hoje))){
                                        echo '<td bgcolor="GREEN">';
                                        echo date('d/m/Y',strtotime($rows['iatf']));
                                        echo '</td>';
                                     }elseif (strtotime($rows['iatf']) > strtotime($hoje) and strtotime($rows['iatf']) < strtotime('30 days', strtotime($hoje))){
                                        echo '<td bgcolor="YELLOW">';
                                        echo date('d/m/Y',strtotime($rows['iatf']));
                                        echo '</td>';
                                     };
                                    ?>
                                <?php 
                                    if (strtotime($rows['v9001']) < strtotime($hoje) ){
                                        if($rows['v9001'] == "2001-01-01"){echo '<td>';}else{echo '<td bgcolor="RED">';}; 
                                        if($rows['v9001'] == "2001-01-01"){echo '-';}else{echo date('d/m/Y',strtotime($rows['v9001']));};
                                        echo '</td>';
                                    }elseif (strtotime($rows['v9001']) > strtotime('31 days', strtotime($hoje))){
                                        echo '<td bgcolor="GREEN">';
                                        echo date('d/m/Y',strtotime($rows['v9001']));
                                        echo '</td>';
                                     }elseif (strtotime($rows['v9001']) > strtotime($hoje) and strtotime($rows['v9001']) < strtotime('30 days', strtotime($hoje))){
                                        echo '<td bgcolor="YELLOW">';
                                        echo date('d/m/Y',strtotime($rows['v9001']));
                                        echo '</td>';
                                     };
                                 ?>
                                <?php 
                                    if (strtotime($rows['v14001']) < strtotime($hoje) ){
                                        if($rows['v14001'] == "2001-01-01"){echo '<td>';}else{echo '<td bgcolor="RED">';}; 
                                        if($rows['v14001'] == "2001-01-01"){echo '-';}else{echo date('d/m/Y',strtotime($rows['v14001']));};
                                        echo '</td>';
                                    }elseif (strtotime($rows['v14001']) > strtotime('31 days', strtotime($hoje))){
                                        echo '<td bgcolor="GREEN">';
                                        echo date('d/m/Y',strtotime($rows['v14001']));
                                        echo '</td>';
                                     }elseif (strtotime($rows['v14001']) > strtotime($hoje) and strtotime($rows['v14001']) < strtotime('30 days', strtotime($hoje))){
                                        echo '<td bgcolor="YELLOW">';
                                        echo date('d/m/Y',strtotime($rows['v14001']));
                                        echo '</td>';
                                     };
                                ?>
                                <?php 
                                    echo "<td>";
                                    echo $rows['pontuacao'];
                                    echo '</td>';
                                 ?>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
        </div>
    </body>
</html>