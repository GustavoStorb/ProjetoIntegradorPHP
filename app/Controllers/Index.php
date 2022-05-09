<?php

namespace App\Controllers;

if(!defined('2022T2')){
    header("Location: /");
    die("");
}

class Index
{
    
    public function index() {
       $carregarView = new \Core\ConfigView("Views/index");
       $carregarView->renderizar();
    }
}
