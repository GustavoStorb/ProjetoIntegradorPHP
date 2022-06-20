<?php

namespace App\Models;

if(!defined('2022T2')){
    header("Location: /");
    die("");
}

use \PDO;

class Chamado extends Conexao
{

    private $dados;
    private $conn;

    public function add(array $dados = null) {
        try {
        $this->dados = $dados;
        $this->conn = $this->connect();

        $sql = 'INSERT INTO chamado (endereco, tempo, km, funcionario_id, veiculo_id, data) VALUES(:endereco, :tempo, :km, :funcionarioId, :veiculoId, :data)';
        $stmt = $this->conn->prepare($sql);
        
        $stmt->bindParam(":endereco", $this->dados['endereco'], \PDO::PARAM_STR);
        $stmt->bindParam(":tempo", $this->dados['tempo'], \PDO::PARAM_STR);
        $stmt->bindParam(":km", $this->dados['distancia'], \PDO::PARAM_INT);
        $stmt->bindParam(":funcionarioId", $this->dados['funcionarioId'], \PDO::PARAM_INT);
        $stmt->bindParam(":veiculoId", $this->dados['veiculoId'], \PDO::PARAM_INT);
        $stmt->bindParam(":data", $this->dados['data'], \PDO::PARAM_STR);
        $stmt->execute();
        return 'Chamado criado com sucesso!';
        } catch (\Exception $e){
        return $e->getMessage();
        }
     }

     public function delete($id){
        try {
           $this->conn = $this->connect();
           $sql = "DELETE FROM chamado WHERE id = $id";
           $stmt = $this->conn->prepare($sql);
           $stmt->execute();
           return 'Você excluiu o chamado com sucesso!';
        } catch (\Exception $e) {
            return 'Erro ao excluir o chamado!';
        }
    }

    public function find(array $dados = null){
        try {
            $this->dados = $dados;
            $this->conn = $this->connect();

            $endereco = $this->dados['endereco'].'%';
            $sql = "SELECT * FROM chamado WHERE endereco LIKE :endereco ORDER BY endereco";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(":endereco", $endereco, \PDO::PARAM_STR);
            $stmt->execute();
            $result = $stmt->fetchAll();
            return $result;
        } catch (\Exception $e){
            return $e->getMessage();
        }
    }

    public function selectByID($id){
        try {
            $this->conn = $this->connect();
            $sql = "SELECT * FROM chamado WHERE id = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(":id", $id, \PDO::PARAM_INT);
            $stmt->execute();
            $result = $stmt->fetch();
            return $result;
         } catch (\Exception $e) {
            //echo $e;
         }
     }

    public function edit(array $dados = null){
        try {
            $this->dados = $dados;
            $this->conn = $this->connect();

            $sql = 'UPDATE chamado SET endereco = :endereco, tempo = :tempo, km = :km, funcionario_id = :funcionarioId, veiculo_id = :veiculoId, data = :data WHERE id = :id';
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(":endereco", $this->dados['endereco'], \PDO::PARAM_STR);
            $stmt->bindParam(":tempo", $this->dados['tempo'], \PDO::PARAM_STR);
            $stmt->bindParam(":km", $this->dados['distancia'], \PDO::PARAM_INT);
            $stmt->bindParam(":funcionarioId", $this->dados['funcionarioId'], \PDO::PARAM_INT);
            $stmt->bindParam(":veiculoId", $this->dados['veiculoId'], \PDO::PARAM_INT);
            $stmt->bindParam(":data", $this->dados['data'], \PDO::PARAM_STR);
            $stmt->bindParam(":id", $this->dados['id'], \PDO::PARAM_INT);
            $stmt->execute();
            return 'Chamado atualizado com sucesso!';
        } catch (\Exception $e){
            return 'Erro ao editar o chamado!';
        }
    }
}