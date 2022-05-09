<?php

namespace App\Controllers;

if(!defined('2022T2')){
    header("Location: /");
    die("");
}

class About
{
    
    public function index() {
       $carregarView = new \Core\ConfigView("Views/about");
       $carregarView->renderizar();
    }
}
