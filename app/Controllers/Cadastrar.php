<?php

namespace App\Controllers;

if(!defined('2022T2')){
    header("Location: /");
    die("");
}

class Cadastrar
{
    
    private $dados;
    
    public function index() {
       $carregarView = new \Core\ConfigView("Views/usuario/cadastrar", $this->dados);
       $carregarView->renderizar();
    }

    public function gravarUsuario() {
        try {
            $nome = $_GET["nome"];
            $email = $_GET["email"];
            $senha = $_GET["senha"];
            $perfil = $_GET["perfil"];
            $licensed = $_GET["licensed"];
            
            $database = "\\App\\Models\\Conexao";
            $databaseClass = new $database;
            $databaseClass->connect();
            $connect = $databaseClass->connect;

            $sql = 'INSERT INTO usuario (nome, email, senha, perfil, licensed) VALUES(?, ?, ?, ?, ?)';
            $stmt = $connect->prepare($sql);
            $stmt->execute([$nome, $email, password_hash($senha, PASSWORD_DEFAULT), $perfil, $licensed]);
            $carregarView = new \Core\ConfigView("Views/usuario/cadastrar", $this->dados);
            $carregarView->renderizar();
            echo "<script>alert(`Usuário $nome cadastrado com sucesso!`)</script>";
        } catch (\PDOException $e){
            $carregarView = new \Core\ConfigView("Views/usuario/cadastrar", $this->dados);
            $carregarView->renderizar();
            echo "<script>alert(`Erro ao cadastrar usuário!`)</script>";
        }

     }
}