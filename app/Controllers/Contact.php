<?php

namespace App\Controllers;

if(!defined('2022T2')){
    header("Location: /");
    die("");
}

class Contact
{
    
    public function index() {
       $carregarView = new \Core\ConfigView("Views/contact");
       $carregarView->renderizar();
    }
}
