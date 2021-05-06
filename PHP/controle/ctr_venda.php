<?php
    require_once '../model/venda.php';
    $objVenda = new Venda();

    if(isset($_POST['delete_id'])){
        $id = $_POST['delete_id'];
        if($objVenda->delete($id)){
            $objVenda->redirect('../view/venda.php');  
        }
    }

    if(isset($_POST['insert'])){
        $cliente = $_POST['txtCliente'];
        $funcionario = $_POST['txtFuncionario'];
        $produto = $_POST['txtProduto'];
        $data_saida = $_POST['txtData_saida'];
        $descricao = $_POST['txtDescricao'];
        $valor = $_POST['txtValor'];
        $quantidade = $_POST['txtQuantidade'];
        if($objVenda->insert($cliente, $funcionario, $produto, $data_saida, $descricao, $valor, $quantidade)){
            $objVenda->redirect('../view/venda.php');  
        } 
    }

    if(isset($_POST['editar_id'])){
        $id = $_POST['editar_id'];
        $cliente = $_POST['txtCliente'];
        $funcionario = $_POST['txtFuncionario'];
        $produto = $_POST['txtProduto'];
        $data_saida = $_POST['txtData_saida'];
        $descricao = $_POST['txtDescricao'];
        $valor = $_POST['txtValor'];
        $quantidade = $_POST['txtQuantidade'];
        if($objVenda->update($cliente, $funcionario, $produto, $data_saida, $descricao, $valor, $quantidade, $id)){
            $objVenda->redirect('../view/venda.php');
        }
    }

?>