<?php
require_once '../model/venda.php';
require_once 'head.php';
$objVenda = new Venda();
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="whidth=device-width , initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <title>Venda</title>
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
            color: #ff0025;
        }

        .fa-pencil-alt {
            color: #26a69a;
        }

        .fa-pencil-alt:hover {
            color: #008080;
        }

        .btn-floating:hover {
            background-color: #1a8e88;
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
        <h1 class="title">Venda</h1>
        <table class="table table-striped">
            <a data-toggle="modal" data-target="#myModalCadastrar"><i class="fas fa-plus-circle fa-3x plus"></i></a>
            <thead>
                <tr>
                    <th>Cliente</th>
                    <th>Produto</th>
                    <th>Descrição</th>
                    <th>Data Saída</th>
                    <th>Quantidade</th>
                    <th>Valor</th>
                    <th>Editar</th>
                    <th>Excluir</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $query = "select * from venda";
                $stmt = $objVenda->runQuery($query);
                $stmt->execute();
                if ($stmt->rowCount() > 0) {
                    while ($rowVenda = $stmt->fetch(PDO::FETCH_ASSOC)) {
                ?>
                        <tr>
                            <td><?php echo ($rowVenda['cliente']); ?></td>
                            <td><?php echo ($rowVenda['produto']); ?></td>
                            <td><?php echo ($rowVenda['descricao']); ?></td>
                            <td><?php echo ($rowVenda['data_saida']); ?></td>
                            <td><?php echo ($rowVenda['quantidade']); ?></td>
                            <td><?php echo ($rowVenda['valor']); ?></td>
                            <td>
                                <p>
                                    <a href="#">
                                        <i class="fas fa-pencil-alt fa-2x" data-toggle="modal" data-target="#myModalEditar" data-vendaid="<?php echo ($rowVenda['id']) ?>" data-vendacliente="<?php echo ($rowVenda['cliente']) ?>" data-vendaproduto="<?php echo ($rowVenda['produto']) ?>" data-vendadescricao="<?php echo ($rowVenda['descricao']) ?>" data-vendadata_saida="<?php echo ($rowVenda['data_saida']) ?>" data-vendaquantidade="<?php echo ($rowVenda['quantidade']) ?>" data-vendavalor="<?php echo ($rowVenda['valor']) ?>">
                                        </i>
                                    </a>
                                </p>
                            </td>
                            <td>
                                <p>
                                    <a href="#">
                                        <i class="fas fa-eraser fa-2x" data-toggle="modal" data-target="#myModalDeletar" data-vendaid="<?php echo ($rowVenda['id']) ?>" data-vendaproduto="<?php echo ($rowVenda['produto']) ?>">
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

    <!-- Modal Cadastrar Venda-->
    <div class="modal fade" id="myModalCadastrar" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Cadastrar Venda</h4>
                </div>
                <div class="modal-body">
                    <form action="../controle/ctr_venda.php" method="POST">
                        <input type="hidden" name="insert" value="1">
                        <div class="form-group">
                            <label for="cliente">Cliente</label>
                            <input type="text" class="form-control" id="cliente" name="txtCliente">
                        </div>
                        <div class="form-group">
                            <label for="produto">Produto</label>
                            <input type="text" class="form-control" id="produto" name="txtProduto">
                        </div>
                        <div class="form-group">
                            <label for="descricao">Descrição</label>
                            <input type="text" class="form-control" id="descricao" name="txtDescricao">
                        </div>
                        <div class="form-group">
                            <label for="data_saida">Data Saída</label>
                            <input type="date" class="form-control" id="data_saida" name="txtData_saida">
                        </div>
                        <div class="form-group">
                            <label for="quantidade">Quantidade</label>
                            <input type="number" class="form-control" id="quantidade" name="txtQuantidade">
                        </div>
                        <div class="form-group">
                            <label for="valor">Valor</label>
                            <input type="text" class="form-control" id="valor" name="txtValor">
                        </div>
                        <button type="submit" class="btn btn-primary">Enviar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Deletar Venda-->
    <div class="modal fade" id="myModalDeletar" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title"></h4>
                </div>
                <div class="modal-body">
                    <form action="../controle/ctr_venda.php" method="POST">
                        <input type="hidden" name="delete_id" value="" id="recipient-id">
                        <div class="form-group">
                            <label for="produto">Produto</label>
                            <input type="text" class="form-control" id="recipient-produto" name="txtProduto" readonly>
                        </div>
                        <button type="submit" class="btn btn-danger">Deletar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Editar Venda-->
    <div class="modal fade" id="myModalEditar" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Editar Venda</h4>
                </div>
                <div class="modal-body">
                    <form action="../controle/ctr_venda.php" method="POST">
                        <input type="hidden" name="editar_id" value="" id="recipient-id">
                        <div class="form-group">
                            <label for="cliente">Cliente</label>
                            <input type="text" class="form-control" id="recipient-cliente" name="txtCliente">
                        </div>
                        <div class="form-group">
                            <label for="produto">Produto</label>
                            <input type="text" class="form-control" id="recipient-produto" name="txtProduto">
                        </div>
                        <div class="form-group">
                            <label for="descricao">Descrição</label>
                            <input type="text" class="form-control" id="recipient-descricao" name="txtDescricao">
                        </div>
                        <div class="form-group">
                            <label for="data_saida">Data Saída</label>
                            <input type="date" class="form-control" id="recipient-data_saida" name="txtData_saida">
                        </div>
                        <div class="form-group">
                            <label for="quantidade">Quantidade</label>
                            <input type="number" class="form-control" id="recipient-quantidade" name="txtQuantidade">
                        </div>
                        <div class="form-group">
                            <label for="valor">Valor</label>
                            <input type="text" class="form-control" id="recipient-valor" name="txtValor">
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
            var recipientid = button.data('vendaid');
            var recipientproduto = button.data('vendaproduto');

            var modal = $(this)
            modal.find('.modal-title').text('Tem certeza que deseja deletar a venda ' + recipientproduto);
            modal.find('#recipient-id').val(recipientid);
            modal.find('#recipient-produto').val(recipientproduto);
        })
    </script>

    <script>
        $('#myModalEditar').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var recipientid = button.data('vendaid');
            var recipientcliente = button.data('vendacliente');
            var recipientproduto = button.data('vendaproduto');
            var recipientdescricao = button.data('vendadescricao');
            var recipientdata_saida = button.data('vendadata_saida');
            var recipientquantidade = button.data('vendaquantidade');
            var recipientvalor = button.data('vendavalor');

            var modal = $(this)
            modal.find('.modal-title').text('Editar venda');
            modal.find('#recipient-id').val(recipientid);
            modal.find('#recipient-cliente').val(recipientcliente);
            modal.find('#recipient-produto').val(recipientproduto);
            modal.find('#recipient-descricao').val(recipientdescricao);
            modal.find('#recipient-data_saida').val(recipientdata_saida);
            modal.find('#recipient-quantidade').val(recipientquantidade);
            modal.find('#recipient-valor').val(recipientvalor);
        })
    </script>
</body>

</html>