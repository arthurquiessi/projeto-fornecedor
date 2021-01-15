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
$contato = "SELECT * FROM contato order by id desc limit 1";
$resultado_contato = mysqli_query($conn,  $contato);

$query = mysqli_query($conn, "SELECT * FROM contato order by id asc"); //Pré-recarrega busca no banco de dados
$num = mysqli_num_rows($query); //Count informações carregadas pesquisadas do bd

?>
<html lang="pt-br">

<head>
    <!-- Meta tags Obrigatórias -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">



    <!-- Ícone da aba do navegador -->
    <link rel="icon" href="img\arquivos.png">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css" rel="stylesheet"> <!-- jQUERY Datable -->
    <link href=https://code.jquery.com/jquery-3.4.1.min.js rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css" rel="stylesheet" />
    <link href="https://cdn.datatables.net/buttons/1.6.2/css/buttons.bootstrap4.min.css" rel="stylesheet" />

    <title>Cadastro de Contatos</title>
</head>

<body class="bg-light">
    <div class="container-fluid">
        <br>
        <div class="py-2 text-center">
            <h3>Cadastro de Contatos</h2>
                <p class="lead">Cadastro das informações de contato dos Fornecedores.</p>
        </div>
        <div class="shadow-lg p-3 mb-5 bg-white rounded">
            <div class="mx-auto" style="width: 200px;">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalCadastro">Novo
                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-file-earmark-person" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path d="M4 0h5.5v1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V4.5h1V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2z" />
                        <path d="M9.5 3V0L14 4.5h-3A1.5 1.5 0 0 1 9.5 3z" />
                        <path fill-rule="evenodd" d="M8 11a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
                        <path d="M8 12c4 0 5 1.755 5 1.755V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1v-.245S4 12 8 12z" />
                    </svg>
                </button>
            </div>
        </div>
        <table id="result" class="table table-striped table-bordered display" style="width:100%">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Fornecedor</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Email</th>
                    <th scope="col">Telefone</th>
                    <th scope="col">Observação</th>
                    <th scope="col">Edição</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($rows = mysqli_fetch_assoc($query)) { ?>
                    <tr>
                        <td><?php echo $rows['id']; ?></td>
                        <td><?php echo $rows['codFor']; ?></td>
                        <td><?php echo $rows['nome']; ?></td>
                        <td><?php echo $rows['email']; ?></td>
                        <td><?php echo $rows['telefone']; ?></td>
                        <td><?php echo $rows['observacao']; ?></td>
                        <td align="center">
                            <div class="form-group">
                                <button type="button" class="btn btn-outline-primary btn-sm" data-toggle="modal" data-target="#exampleModal" data-whateverresultado="<?php echo $rows['id']; ?>" data-whatever="<?php echo $rows['codFor']; ?>" data-whatevercodigo="<?php echo $rows['nome']; ?>" data-whateverfor="<?php echo $rows['email']; ?>" data-whateverskip="<?php echo $rows['telefone']; ?>" data-whatevercont="<?php echo $rows['observacao']; ?>">
                                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-pencil-square" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"></path>
                                        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"></path>
                                    </svg>
                                </button>
                            </div>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
        <!-- Modal -->
        <div class="modal fade bd-example-modal-lg" id="modalCadastro" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <form method="POST" action="cadastrarContato.php">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Novo Contato</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">

                            <div class="form-row">
                                <div class="form-group col-md-2">
                                    <?php while ($rows_contato = mysqli_fetch_assoc($resultado_contato)) { ?>
                                        <label for="id">ID:</label>
                                        <input type="text" class="form-control" id="id" name="id" value="<?php echo $rows_contato['id'] + 1; ?>" readonly>
                                    <?php } ?>
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="Codfor">Fornecedor:</label>
                                    <input type="text" class="form-control" id="Codfor" name="Codfor">
                                </div>
                                <div class="form-group col-md-7">
                                    <label for="NomeContato">Nome:</label>
                                    <input type="text" class="form-control" id="NomeContato" name="NomeContato">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-8">
                                    <label for="Email">Email:</label>
                                    <input type="email" class="form-control" id="Email" name="Email">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="Phone">Telefone:</label>
                                    <input type="text" class="form-control" id="Phone" name="Phone">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="Obs">Observações:</label>
                                    <input type="text" class="form-control" id="Obs" name="Obs">
                                </div>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Cadastrar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- Fim Modal -->
        <!-- Modal Edição -->
        <div class="modal fade bd-example-modal-xl" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <form method="POST" action="gravarContato.php">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title"></h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">

                            <div class="form-row">
                                <div class="form-group col-md-2">
                                    <label for="id">ID:</label>
                                    <input type="text" class="form-control" id="Idmodal" name="Idmodal" readonly>
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="Codfor">Fornecedor:</label>
                                    <input type="text" class="form-control" id="CodForModal" name="CodForModal" required>
                                </div>
                                <div class="form-group col-md-7">
                                    <label for="NomeContato">Nome:</label>
                                    <input type="text" class="form-control" id="Nomemodal" name="Nomemodal" required>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-8">
                                    <label for="Email">Email:</label>
                                    <input type="email" class="form-control" id="Emailmodal" name="Emailmodal">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="Phone">Telefone:</label>
                                    <input type="text" class="form-control" id="Phonemodal" name="Phonemodal">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="Obs">Observações:</label>
                                    <input type="text" class="form-control" id="Obsmodal" name="Obsmodal">
                                </div>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" onclick="Deletar();">Excluir</button>
                            <button type="submit" class="btn btn-primary">Alterar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- Fim Modal -->

    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
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
            $("#Phone").mask("(00) 0000-0000");
        });

        function Deletar() {
            var idModal = document.getElementById('Idmodal').value;
            alert(idModal);
            window.location = "deletarContato.php?Idmodal=" + idModal;
        }



        $('#exampleModal').on('show.bs.modal', function(event) {

            var button = $(event.relatedTarget) // Button that triggered the modal
            var CodForModal = button.data('whatever')
            var Nomemodal = button.data('whatevercodigo')
            var Emailmodal = button.data('whateverfor')
            var Idmodal = button.data('whateverresultado')
            var Phonemodal = button.data('whateverskip')
            var Obsmodal = button.data('whatevercont')

            var modal = $(this)
            modal.find('.modal-title').text('Fornecedor: ' + CodForModal + ' - Contato: ' + Nomemodal)
            modal.find('#CodForModal').val(CodForModal)
            modal.find('#Nomemodal').val(Nomemodal)
            modal.find('#Emailmodal').val(Emailmodal)
            modal.find('#Idmodal').val(Idmodal)
            modal.find('#Phonemodal').val(Phonemodal)
            modal.find('#Obsmodal').val(Obsmodal)
        })
    </script>
</body>

</html>