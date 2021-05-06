<?php

class Usuario{
    private $conn = null;

    public function __construct()
    {
        $database = new Database();
        $db = $database->dbConnection();
        $this->conn = $db;
    }

    public function runQuery($sql){
        $stmt = $this->conn->prepare($sql);
        return $stmt;
    }
    public function login($email, $senha){

        $sql = "SELECT * FROM usuario WHERE email = :email AND senha = :senha";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindValue("email", $email);
        $stmt->bindValue("senha", md5($senha));
        $stmt->execute();
        
        if($stmt->rowCount() > 0){
            $dado = $stmt->fetch();

            $_SESSION['id'] = $dado['id'];

            return true;
        }else{
            return false;
        }


    }
    
}