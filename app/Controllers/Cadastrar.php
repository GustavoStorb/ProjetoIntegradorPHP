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
}
