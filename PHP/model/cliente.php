<?php
    require_once 'db.php';
    include 'verificacaologin.php';
    
    class Cliente{
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

        public function insert($nome, $idade, $sexo){
            try{
                $sql = "INSERT INTO cliente(nome, idade, telefone, sexo)
                        VALUES(:nome, :idade, :telefone, :sexo)";
                $stmt = $this->conn->prepare($sql);
                $stmt->bindparam(":nome", $nome);
                $stmt->bindparam(":idade", $idade);
                $stmt->bindparam(":telefone", $telefone);
                $stmt->bindparam(":sexo", $sexo);
                $stmt->execute();
                return $stmt;
            }catch(PDOException $e){
                echo("Error: ".$e->getMessage());
            }finally{
                $this->conn = null;
            }
        }

        public function update($nome, $idade, $telefone, $sexo, $id){
            try{
                $sql = "UPDATE cliente
                    SET nome = :nome,
                    idade = :idade,
                    telefone = :telefone,
                    sexo = :sexo
                    WHERE id = :id";
                $stmt = $this->conn->prepare($sql);
                $stmt->bindparam(":nome", $nome);
                $stmt->bindparam(":idade", $idade);
                $stmt->bindparam(":telefone", $telefone);
                $stmt->bindparam(":sexo", $sexo);
                $stmt->bindparam(":id", $id);
                $stmt->execute();
                return $stmt;
            }catch(PDOException $e){
            echo("Error: ".$e->getMessage());
            }finally{
            $this->conn = null;
            }    
        }
        
        public function delete($id){
            try{
                $sql = "DELETE FROM cliente where id = :id";
                $stmt = $this->conn->prepare($sql);
                $stmt->bindparam(":id", $id);
                $stmt->execute();
                return $stmt;
            }catch(PDOException $e){
                echo("Error: ".$e->getMessage());
            }finally{
                $this->conn = null;
            }
        }
        public function redirect($url){
            header("Location: $url");
        }

    }
?>