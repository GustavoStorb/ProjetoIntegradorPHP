<?php

namespace App\Models;

if(!defined('2022T2')){
    header("Location: /");
    die("");
}

use \PDO;

class Usuario extends Conexao
{

    private $dados;
    private $conn;

    public function add(array $dados = null) {
        try {
        $this->dados = $dados;
        $this->conn = $this->connect();

        $sql = 'INSERT INTO usuario (nome, email, senha, perfil, licensed) VALUES(:nome, :email, :senha, :perfil, :licensed)';
        $stmt = $this->conn->prepare($sql);
        
        $stmt->bindParam(":nome", $this->dados['nome'], \PDO::PARAM_STR);
        $stmt->bindParam(":email", $this->dados['email'], \PDO::PARAM_STR);
        $stmt->bindParam(":senha", password_hash($this->dados['senha'], PASSWORD_DEFAULT), \PDO::PARAM_STR);
        $stmt->bindParam(":perfil", $this->dados['perfil'], \PDO::PARAM_STR);
        $stmt->bindParam(":licensed", $this->dados['licensed'], \PDO::PARAM_STR);
        $stmt->execute();
        return $this->dados['nome'];
        } catch (\Exception $e){
        return false;
        }
     }

     public function delete($id, $nome){
         try {
            $this->conn = $this->connect();
            $sql = "DELETE FROM usuario WHERE id = $id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            $msg = 'Você excluiu o usuario: '.$nome.' com sucesso!';
            return $msg;
        
         } catch (\Exception $e) {
             $msg = 'Erro ao excluir o usuario '.$nome.'!';
             return $msg;
         }
     }

     public function selectByID($id){
        try {
            $this->conn = $this->connect();
            $sql = "SELECT * FROM usuario WHERE id = $id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetch();
            return $result;
         } catch (\Exception $e) {
             echo $e;
         }
     }

     public function findAllHabilitados(){
        try {
            $this->conn = $this->connect();

            $sql = "SELECT * FROM usuario WHERE licensed = '1' AND perfil = 'user' ORDER BY nome";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
         } catch (\Exception $e) {
           //echo $e;
         }
     }

     public function find(array $dados = null){
        try {

            $this->dados = $dados;
            $this->conn = $this->connect();
            
            $nome = $this->dados['nome'].'%';
            $sql = "SELECT * FROM usuario WHERE nome LIKE :nome AND id != :id ORDER BY nome";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(":nome", $nome, \PDO::PARAM_STR);
            $stmt->bindParam(":id", $this->dados['atualUserId'], \PDO::PARAM_STR);
            $stmt->execute();
            $result = $stmt->fetchAll();
            return $result;
        } catch (\Exception $e){
            return $e->getMessage();
        }
     }

     public function edit(array $dados = null){
        try {
            $this->dados = $dados;
            $this->conn = $this->connect();

            $sql = "UPDATE usuario SET nome=:nome, email=:email, senha=:senha, perfil=:perfil, licensed=:licensed WHERE id=:id";
            if($this->dados['senha'] == ''){
                $sql = "UPDATE usuario SET nome=:nome, email=:email, perfil=:perfil, licensed=:licensed WHERE id=:id";
            }

            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':id', $this->dados['userId'], PDO::PARAM_INT);
            $stmt->bindParam(":nome", $this->dados['nome'], \PDO::PARAM_STR);
            $stmt->bindParam(":email", $this->dados['email'], \PDO::PARAM_STR);
            if($this->dados['senha'] != ''){
                $stmt->bindParam(":senha", password_hash($this->dados['senha'], PASSWORD_DEFAULT), \PDO::PARAM_STR);
            }
            $stmt->bindParam(":perfil", $this->dados['perfil'], \PDO::PARAM_STR);
            $stmt->bindParam(":licensed", $this->dados['licensed'], \PDO::PARAM_STR);
            if($stmt->execute()){
                return true;
            }
        } catch (\Exception $e){
            //echo $e;
        }
     }
}