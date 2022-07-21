<?php

if(isset($_POST['email']) && !empty($_POST['email']) && isset($_POST['senha']) && !empty($_POST['senha'])){
    
    require '../model/db.php';
    require '../model/Usuario.class.php';

    $u = new Usuario();

    $email = addslashes($_POST['email']);
    $senha = addslashes($_POST['senha']);

    if($u->login($email, $senha) == true){
        if(isset($_SESSION['id'])){
            header("Location: ../view/cliente.php");
        }else{
            header("Location: ../view/login.php");
        }
    }else{ 
        header("Location: ../view/login.php");
    }
}
?>