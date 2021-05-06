<?php
require_once '../model/cliente.php';
require_once 'head.php';
$objCliente = new Cliente();
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="whidth=device-width , initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <title>Cliente</title>
    <style>
        body {
            background-color: darkgray;
            color: #10301b;
        }

        a:link {
            text-decoration: none;
        }

        .fa-eraser {
            color: #e71837;
        }

        .fa-eraser:hover {
            color: #8b0000;
        }

        .fa-pencil-alt {
            color: #26a69a;
        }

        .fa-eraser:hover {
            color: #8b0000;
        }

        .fa-pencil-alt:hover {
            color: #008080;
        }

        .fa-plus-circle {
            position: relative;
            top: 15px;
            left: 1050px;
            cursor: pointer;
            color: #2ed27f;
        }

        .fa-plus-circle:hover {
            color: #24a966;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1 class="title">Cliente</h1>
        <table class="table table-striped">
            <a data-toggle="modal" data-target="#myModalCadastrar"><i class="fas fa-plus-circle fa-3x plus"></i></a>
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Idade</th>
                    <th>Telefone</th>
                    <th>Sexo</th>
                    <th>Editar</th>
                    <th>Excluir</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $query = "select * from cliente";
                $stmt = $objCliente->runQuery($query);
                $stmt->execute();
                if ($stmt->rowCount() > 0) {
                    while ($rowCliente = $stmt->fetch(PDO::FETCH_ASSOC)) {
                ?>
                        <tr>
                            <td><?php echo ($rowCliente['nome']); ?></td>
                            <td><?php echo ($rowCliente['idade']); ?></td>
                            <td><?php echo ($rowCliente['telefone']); ?></td>
                            <td><?php echo ($rowCliente['sexo']); ?></td>
                            <td>
                                <p>
                                    <a href="#">
                                        <i class="fas fa-pencil-alt fa-2x" data-toggle="modal" data-target="#myModalEditar" data-clienteid="<?php echo ($rowCliente['id']) ?>" data-clientenome="<?php echo ($rowCliente['nome']) ?>" data-clienteidade="<?php echo ($rowCliente['idade']) ?>" data-clientetelefone="<?php echo ($rowCliente['telefone']) ?>" data-clientesexo="<?php echo ($rowCliente['sexo']) ?>">
                                        </i>
                                    </a>
                                </p>
                            </td>
                            <td>
                                <p>
                                    <a href="#">
                                        <i class="fas fa-eraser fa-2x" data-toggle="modal" data-target="#myModalDeletar" data-clienteid="<?php echo ($rowCliente['id']) ?>" data-clientenome="<?php echo ($rowCliente['nome']) ?>">
                                        </i>
                                    </a>
                                </p>
                            </td>
                        </tr>
                <?php
                    }
                }
                ?>
            </tbody>
        </table>
    </div>

    <!-- Modal Cadastrar Cliente-->
    <div class="modal fade" id="myModalCadastrar" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Cadastrar Cliente</h4>
                </div>
                <div class="modal-body">
                    <form action="../controle/ctr_cliente.php" method="POST">
                        <input type="hidden" name="insert" value="1">
                        <div class="form-group">
                            <label for="nome">Nome</label>
                            <input type="text" class="form-control" id="nome" name="txtNome">
                        </div>
                        <div class="form-group">
                            <label for="idade">Idade</label>
                            <input type="number" class="form-control" id="idade" name="txtIdade">
                        </div>
                        <div class="form-group">
                            <label for="telefone">Telefone</label>
                            <input type="number" class="form-control" id="telefone" name="txtTelefone">
                        </div>
                        <div class="form-group">
                            <label for="sexo">Sexo</label>
                            <input type="text" class="form-control" id="sexo" name="txtSexo">
                        </div>
                        <button type="submit" class="btn btn-primary">Enviar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Deletar Cliente-->
    <div class="modal fade" id="myModalDeletar" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title"></h4>
                </div>
                <div class="modal-body">
                    <form action="../controle/ctr_cliente.php" method="POST">
                        <input type="hidden" name="delete_id" value="" id="recipient-id">
                        <div class="form-group">
                            <label for="nome">Nome</label>
                            <input type="text" class="form-control" id="recipient-nome" name="txtNome" readonly>
                        </div>
                        <button type="submit" class="btn btn-danger">Deletar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Editar Cliente-->
    <div class="modal fade" id="myModalEditar" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Editar Cliente</h4>
                </div>
                <div class="modal-body">
                    <form action="../controle/ctr_cliente.php" method="POST">
                        <input type="hidden" name="editar_id" value="" id="recipient-id">
                        <div class="form-group">
                            <label for="nome">Nome</label>
                            <input type="text" class="form-control" id="recipient-nome" name="txtNome">
                        </div>
                        <div class="form-group">
                            <label for="idade">Idade</label>
                            <input type="number" class="form-control" id="recipient-idade" name="txtIdade">
                        </div>
                        <div class="form-group">
                            <label for="telefone">Telefone</label>
                            <input type="number" class="form-control" id="telefone" name="txtTelefone">
                        </div>
                        <div class="form-group">
                            <label for="sexo">Sexo</label>
                            <input type="text" class="form-control" id="recipient-sexo" name="txtSexo">
                        </div>
                        <button type="submit" class="btn btn-primary">Enviar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <h2 class="logout"><a href="logout.php">Logout</a></h2>

    <script>
        $('#myModalDeletar').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var recipientid = button.data('clienteid');
            var recipientnome = button.data('clientenome');

            var modal = $(this)
            modal.find('.modal-title').text('Tem certeza que deseja deletar o cliente ' + recipientnome);
            modal.find('#recipient-id').val(recipientid);
            modal.find('#recipient-nome').val(recipientnome);
        })
    </script>

    <script>
        $('#myModalEditar').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var recipientid = button.data('clienteid');
            var recipientnome = button.data('clientenome');
            var recipientidade = button.data('clienteidade');
            var recipienttelefone = button.data('clientetelefone');
            var recipientsexo = button.data('clientesexo');

            var modal = $(this)
            modal.find('.modal-title').text('Editar cliente');
            modal.find('#recipient-id').val(recipientid);
            modal.find('#recipient-nome').val(recipientnome);
            modal.find('#recipient-idade').val(recipientidade);
            modal.find('#recipient-telefone').val(recipienttelefone);
            modal.find('#recipient-sexo').val(recipientsexo);
        })
    </script>
</body>

</html>