<?php 

if(!$_SESSION['id']) {
    header('Location: ../view/login.php');
    exit();
}

?>