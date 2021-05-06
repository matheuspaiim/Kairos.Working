<?php
    require_once '../model/produto.php';
    $objProduto = new Produto();

    if(isset($_POST['delete_id'])){
        $id = $_POST['delete_id'];
        if($objProduto->delete($id)){
            $objProduto->redirect('../view/produto.php');  
        }
    }

    if(isset($_POST['insert'])){
        $nome = $_POST['txtNome'];
        $descricao = $_POST['txtDescricao'];
        $valor = $_POST['txtValor'];
        $quantidade = $_POST['txtQuantidade'];
        if($objProduto->insert($nome, $descricao, $valor, $quantidade)){
            $objProduto->redirect('../view/produto.php');  
        } 
    }

    if(isset($_POST['editar_id'])){
        $id = $_POST['editar_id'];
        $nome = $_POST['txtNome'];
        $descricao = $_POST['txtDescricao'];
        $valor = $_POST['txtValor'];
        $quantidade = $_POST['txtQuantidade'];
        if($objProduto->update($nome, $descricao, $valor, $quantidade, $id)){
            $objProduto->redirect('../view/produto.php');
        }
    }

?>