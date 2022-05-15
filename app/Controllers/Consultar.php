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

            $sql = "SELECT * FROM usuario WHERE nome LIKE '%$nome%'";

            $stmt = $connect->prepare($sql);
            $stmt->execute(); 
            $user = $stmt->fetch();
            
            $carregarView = new \Core\ConfigView("Views/usuario/consultar", $this->dados);
            $carregarView->renderizar();
            echo $user[1];
        } catch (\PDOException $e){
            $carregarView = new \Core\ConfigView("Views/usuario/consultar", $this->dados);
            $carregarView->renderizar();
            echo $e;
        }

     }
}