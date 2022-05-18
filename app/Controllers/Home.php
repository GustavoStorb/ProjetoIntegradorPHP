<?php

namespace App\Controllers;

if(!defined('2022T2')){
    header("Location: /");
    die("Erro ao acessar");
}

class Home
{
    
    private $dados;
    
    public function index() {
       $carregarView = new \Core\ConfigView("Views/dashboard/home", $this->dados);
       $carregarView->renderizar();
    }
}
