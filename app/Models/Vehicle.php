<?php

namespace App\Models;

if(!defined('2022T2')){
    header("Location: /");
    die("");
}

use \PDO;

class Vehicle extends Conexao
{

    private $dados;
    private $conn;

    public function add(array $dados = null) {
        try {
            $this->dados = $dados;
            $this->conn = $this->connect();

            $sql = 'INSERT INTO veiculo (tipo, ano, consumo) VALUES(:tipo, :ano, :consumo)';
            $stmt = $this->conn->prepare($sql);
            
            $stmt->bindParam(":tipo", $this->dados['vehicleType'], \PDO::PARAM_STR);
            $stmt->bindParam(":ano", $this->dados['ano'], \PDO::PARAM_INT);
            $stmt->bindParam(":consumo", $this->dados['consumo'], \PDO::PARAM_STR);
            $stmt->execute();
            return $this->dados['tipo'];
        } catch (\Exception $e){
            return $e;
        }
    }

    public function selectByID($id){
        try {
            $this->conn = $this->connect();
            $sql = "SELECT * FROM veiculo WHERE id = $id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetch();
            return $result;
        } catch (\Exception $e) {
            //echo $e;
        }
    }

    public function find(array $dados = null){
        try {
            $this->dados = $dados;
            $this->conn = $this->connect();

            $tipo = $this->dados['tipo'].'%';
            $sql = "SELECT * FROM veiculo WHERE tipo LIKE :tipo ORDER BY tipo";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(":tipo", $tipo, \PDO::PARAM_STR);
            $stmt->execute();
            $result = $stmt->fetchAll();
            return $result;
        } catch (\Exception $e){
            return $e->getMessage();
        }
    }

    public function findAll(){
        try {
            $this->dados = $dados;
            $this->conn = $this->connect();

            $sql = "SELECT * FROM veiculo";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (\Exception $e){
            return $e->getMessage();
        }
    }

    public function delete($id){
        try {
            $this->conn = $this->connect();

            $sql = "DELETE FROM veiculo WHERE id = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(":id", $id, \PDO::PARAM_INT);
            $stmt->execute();
            return 'Você excluiu o veiculo com sucesso!';
        } catch (\Exception $e) {
            return 'Erro ao excluir o veiculo!';
        }
    }

    public function edit(array $dados = null){
        try {
            $this->dados = $dados;
            $this->conn = $this->connect();

            $sql = "UPDATE veiculo SET tipo = :tipo, ano = :ano, consumo = :consumo WHERE id = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(":tipo", $this->dados['vehicleType'], \PDO::PARAM_STR);
            $stmt->bindParam(":ano", $this->dados['ano'], \PDO::PARAM_INT);
            $stmt->bindParam(":consumo", $this->dados['consumo'], \PDO::PARAM_STR);
            $stmt->bindParam(":id", $this->dados['id'], \PDO::PARAM_INT);
            $stmt->execute();
            return 'Você editou o veiculo com sucesso!';
        } catch (\Exception $e) {
            return 'Erro ao editar o veiculo!';
        }
    }
}