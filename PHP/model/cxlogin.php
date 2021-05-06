<?php

session_start();

$localhost = "localhost";
$user = "root";
$passw = "";
$db = "kairosworking";

global $pdo;

try{

$pdo = new PDO("mysqli:dbname=".$db."; host=".$localhost, $user, $passw);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

}catch(PDOException $e){
    echo "ERRO: ".$e->getMessage();
    exit;
}


?>