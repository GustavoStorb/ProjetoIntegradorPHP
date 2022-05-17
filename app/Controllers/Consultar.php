<?php

namespace App\Controllers;

if(!defined('2022T2')){
    header("Location: /");
    die("");
}

class Consultar
{
    
    private $dados;
    
    public function index() {
       $carregarView = new \Core\ConfigView("Views/usuario/consultar", $this->dados);
       $carregarView->renderizar();
    }

    public function consultarUsuario() {
        try {
            $nome = $_GET["nome"];

            $database = "\\App\\Models\\Conexao";
            $databaseClass = new $database;
            $databaseClass->connect();
            $connect = $databaseClass->connect;

            $sql = "SELECT * FROM usuario WHERE nome LIKE '$nome%' ORDER BY nome";

            $stmt = $connect->prepare($sql);
            $stmt->execute(); 
            $user = $stmt->fetch();
            
            $carregarView = new \Core\ConfigView("Views/usuario/consultar", $this->dados);
            $carregarView->renderizar();

            $cod = $user[0];
            $nome = $user[1];
            $email = $user[2];
            $tipo = $user[3];
            $licensed = $user[4];

            echo $nome;
        } catch (\PDOException $e){
            $carregarView = new \Core\ConfigView("Views/usuario/consultar", $this->dados);
            $carregarView->renderizar();
            echo "<script>alert(`Erro ao consultar usuário!`)</script>";
        }

     }
}