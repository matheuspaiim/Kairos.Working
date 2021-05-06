<?php
    require_once 'db.php';
    include 'verificacaologin.php';
    
    class Produto{
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

        public function insert($nome, $descricao, $valor, $quantidade){
            try{
                $sql = "INSERT INTO produto(nome, descricao, valor, quantidade)
                        VALUES(:nome, :descricao, :valor, :quantidade)";

                $stmt = $this->conn->prepare($sql);
                $stmt->bindparam(":nome", $nome);
                $stmt->bindparam(":descricao", $descricao);
                $stmt->bindparam(":valor", $valor);
                $stmt->bindparam(":quantidade", $quantidade);
                $stmt->execute();
                return $stmt;
            }catch(PDOException $e){
                echo("Error: ".$e->getMessage());
            }finally{
                $this->conn = null;
            }
        }

        public function update($nome, $descricao, $valor, $quantidade, $id){
            try{
                $sql = "UPDATE produto
                    SET nome = :nome,
                    descricao = :descricao,
                    valor = :valor,
                    quantidade = :quantidade
                    WHERE id = :id";
                $stmt = $this->conn->prepare($sql);
                $stmt->bindparam(":nome", $nome);
                $stmt->bindparam(":descricao", $descricao);
                $stmt->bindparam(":valor", $valor);
                $stmt->bindparam(":quantidade", $quantidade);
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
                $sql = "DELETE FROM produto where id = :id";
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