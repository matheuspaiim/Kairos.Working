<?php
require_once '../model/produto.php';
require_once 'head.php';
$objProduto = new Produto();
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="whidth=device-width , initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <title>Produto</title>
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
        <h1 class="title">Produto</h1>
        <table class="table table-striped">
            <a data-toggle="modal" data-target="#myModalCadastrar"><i class="fas fa-plus-circle fa-3x plus"></i></a>
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Descrição</th>
                    <th>Valor</th>
                    <th>Quantidade</th>
                    <th>Editar</th>
                    <th>Excluir</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $query = "select * from produto";
                $stmt = $objProduto->runQuery($query);
                $stmt->execute();
                if ($stmt->rowCount() > 0) {
                    while ($rowProduto = $stmt->fetch(PDO::FETCH_ASSOC)) {
                ?>
                        <tr>
                            <td><?php echo ($rowProduto['nome']); ?></td>
                            <td><?php echo ($rowProduto['descricao']); ?></td>
                            <td><?php echo ($rowProduto['valor']); ?></td>
                            <td><?php echo ($rowProduto['quantidade']); ?></td>
                            <td>
                                <p>
                                    <a href="#">
                                        <i class="fas fa-pencil-alt fa-2x" data-toggle="modal" data-target="#myModalEditar" data-produtoid="<?php echo ($rowProduto['id']) ?>" data-produtonome="<?php echo ($rowProduto['nome']) ?>" data-produtodescricao="<?php echo ($rowProduto['descricao']) ?>" data-produtovalor="<?php echo ($rowProduto['valor']) ?>" data-produtoquantidade="<?php echo ($rowProduto['quantidade']) ?>">
                                        </i>
                                    </a>
                                </p>
                            </td>
                            <td>
                                <p>
                                    <a href="#">
                                        <i class="fas fa-eraser fa-2x" data-toggle="modal" data-target="#myModalDeletar" data-produtoid="<?php echo ($rowProduto['id']) ?>" data-produtonome="<?php echo ($rowProduto['nome']) ?>">
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

    <!-- Modal Cadastrar Produto-->
    <div class="modal fade" id="myModalCadastrar" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Cadastrar Produto</h4>
                </div>
                <div class="modal-body">
                    <form action="../controle/ctr_produto.php" method="POST">
                        <input type="hidden" name="insert" value="1">
                        <div class="form-group">
                            <label for="nome">Nome</label>
                            <input type="text" class="form-control" id="nome" name="txtNome">
                        </div>
                        <div class="form-group">
                            <label for="descricao">Descrição</label>
                            <input type="text" class="form-control" id="descricao" name="txtDescricao">
                        </div>
                        <div class="form-group">
                            <label for="valor">Valor</label>
                            <input type="text" class="form-control" id="valor" name="txtValor">
                        </div>
                        <div class="form-group">
                            <label for="quantidade">Quantidade</label>
                            <input type="number" class="form-control" id="quantidade" name="txtQuantidade">
                        </div>
                        <button type="submit" class="btn btn-primary">Enviar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Deletar Produto-->
    <div class="modal fade" id="myModalDeletar" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title"></h4>
                </div>
                <div class="modal-body">
                    <form action="../controle/ctr_produto.php" method="POST">
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

    <!-- Modal Editar Produto-->
    <div class="modal fade" id="myModalEditar" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Editar Produto</h4>
                </div>
                <div class="modal-body">
                    <form action="../controle/ctr_produto.php" method="POST">
                        <input type="hidden" name="editar_id" value="" id="recipient-id">
                        <div class="form-group">
                            <label for="nome">Nome</label>
                            <input type="text" class="form-control" id="recipient-nome" name="txtNome">
                        </div>
                        <div class="form-group">
                            <label for="descricao">Descrição</label>
                            <input type="text" class="form-control" id="recipient-descricao" name="txtDescricao">
                        </div>
                        <div class="form-group">
                            <label for="valor">Valor</label>
                            <input type="text" class="form-control" id="recipient-valor" name="txtValor">
                        </div>
                        <div class="form-group">
                            <label for="quantidade">Quantidade</label>
                            <input type="number" class="form-control" id="recipient-quantidade" name="txtQuantidade">
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
            var recipientid = button.data('produtoid');
            var recipientnome = button.data('produtonome');

            var modal = $(this)
            modal.find('.modal-title').text('Tem certeza que deseja deletar o produto ' + recipientnome);
            modal.find('#recipient-id').val(recipientid);
            modal.find('#recipient-nome').val(recipientnome);
        })
    </script>

    <script>
        $('#myModalEditar').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var recipientid = button.data('produtoid');
            var recipientnome = button.data('produtonome');
            var recipientdescricao = button.data('produtodescricao');
            var recipientvalor = button.data('produtovalor');
            var recipientquantidade = button.data('produtoquantidade');

            var modal = $(this)
            modal.find('.modal-title').text('Editar produto');
            modal.find('#recipient-id').val(recipientid);
            modal.find('#recipient-nome').val(recipientnome);
            modal.find('#recipient-descricao').val(recipientdescricao);
            modal.find('#recipient-valor').val(recipientvalor);
            modal.find('#recipient-quantidade').val(recipientquantidade);
        })
    </script>
</body>

</html>