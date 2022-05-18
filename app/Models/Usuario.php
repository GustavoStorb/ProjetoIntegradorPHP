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
    private $resultadoBd;
    private $conn;

    public function add(array $dados = null) {
        try {
        $this->dados = $dados;
        $this->conn = $this->connect();

        $sql = 'INSERT INTO usuario (nome, email, senha, perfil, licensed) VALUES(:nome, :email, :senha, :perfil, :licensed)';
        $stmt = $this->conn->prepare($sql);

        $stmt->bindParam(":nome", $this->dados['nome'], \PDO::PARAM_STR);
        $stmt->bindParam(":email", $this->dados['email'], \PDO::PARAM_STR);
        $stmt->bindParam(":senha", $this->dados['senha'], \PDO::PARAM_STR);
        $stmt->bindParam(":perfil", $this->dados['perfil'], \PDO::PARAM_STR);
        $stmt->bindParam(":licensed", $this->dados['licensed'], \PDO::PARAM_STR);
        $stmt->execute();
        return true;
        } catch (\Exception $e){
        return false;
        }
     }
}