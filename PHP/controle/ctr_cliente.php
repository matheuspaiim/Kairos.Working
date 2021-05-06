<?php
    require_once '../model/cliente.php';
    
    $objCliente = new Cliente();

    if(isset($_POST['delete_id'])){
        $id = $_POST['delete_id'];
        if($objCliente->delete($id)){
            $objCliente->redirect('../view/cliente.php');  
        }
    }

    if(isset($_POST['insert'])){
        $nome = $_POST['txtNome'];
        $idade = $_POST['txtIdade'];
        $telefone = $_POST['txtTelefone'];
        $sexo = $_POST['txtSexo'];
        if($objCliente->insert($nome, $idade, $telefone, $sexo)){
            $objCliente->redirect('../view/cliente.php');  
        } 
    }

    if(isset($_POST['editar_id'])){
        $id = $_POST['editar_id'];
        $nome = $_POST['txtNome'];
        $idade = $_POST['txtIdade'];
        $telefone = $_POST['txtTelefone'];
        $sexo = $_POST['txtSexo'];
        if($objCliente->update($nome, $idade, $telefone, $sexo, $id)){
            $objCliente->redirect('../view/cliente.php');
        }
    }

?>