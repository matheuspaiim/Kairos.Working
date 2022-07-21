<?php

session_start();
global $pdo;
    class Database{

        private $userName = "b8e2a0c44a7621";
        private $senha = "0e7d7755";
        public $conn;

        public function dbConnection(){
            $this->conn = null;
            try{
                $this->conn = new PDO('mysql:host=us-cdbr-east-06.cleardb.net;dbname=heroku_55671c4c032bd3f', 
                $this->userName, $this->senha);
                $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);           
            }catch(PDOException $e){
                echo $e->getMessage();
            }
            return $this->conn;
        }
    }
?>