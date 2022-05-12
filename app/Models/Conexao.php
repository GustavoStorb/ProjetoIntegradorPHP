<?php

namespace App\Models;

if(!defined('2022T2')){
    header("Location: /");
    die("");
}

class Conexao
{
    private $sgbd = "mysql";
    private $host = "localhost";
    private $user = "root";
    private $pass = "";
    private $database = "crud";
    public $port = 3306;
    public $connect;
    
    public function connect() {
        try {
            $this->connect = new \PDO($this->sgbd . ':host=' 
            . $this->host . ';port=' . $this->port . ';dbname=' . $this->database, $this->user, $this->pass);
            return $this->connect;
        } catch (Exception $ex) {
            die('Erro ao conectar com banco de dados: Entre em contato o administrador adm@senai.br');
        }
    }
}
