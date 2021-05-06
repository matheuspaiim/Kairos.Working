<?php
    require_once 'db.php';
    include 'verificacaologin.php';
    
    class Venda{
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

        public function insert($cliente, $funcionario, $produto, $data_saida, $descricao, $valor, $quantidade){
            try{
                $sql = "INSERT INTO venda(cliente, funcionario, produto, data_saida, descricao, valor, quantidade)
                        VALUES(:cliente, :funcionario, :produto, :data_saida, :descricao, :valor, :quantidade)";

                $stmt = $this->conn->prepare($sql);
                $stmt->bindparam(":cliente", $cliente);
                $stmt->bindparam(":funcionario", $funcionario);
                $stmt->bindparam(":produto", $produto);
                $stmt->bindparam(":data_saida", $data_saida);
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

        public function update($cliente, $funcionario, $produto, $data_saida, $descricao, $valor, $quantidade, $id){
            try{
                $sql = "UPDATE venda
                    SET cliente = :cliente,
                    funcionario = :funcionario,
                    produto = :produto,
                    data_saida = :data_saida,
                    descricao = :descricao,
                    valor = :valor,
                    quantidade = :quantidade
                    WHERE id = :id";
                $stmt = $this->conn->prepare($sql);
                $stmt->bindparam(":cliente", $cliente);
                $stmt->bindparam(":funcionario", $funcionario);
                $stmt->bindparam(":produto", $produto);
                $stmt->bindparam(":data_saida", $data_saida);
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
                $sql = "DELETE FROM venda where id = :id";
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