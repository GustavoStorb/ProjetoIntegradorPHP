<?php

namespace App\Controllers;

if(!defined('2022T2')){
    header("Location: /");
    die("");
}

class Login
{
    
    private $dados;
    
    public function index() {          
        
        $this->dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
        
        if(!empty($this->dados['SendLogin'])){
            $visualizarLogin = new \App\Models\LoginModel();
            $visualizarLogin->login($this->dados);
            if($visualizarLogin->getResultado()){
                $urlDestino = URL . "home";
                header("Location: $urlDestino");
            }else{
                $this->dados['form'] = $this->dados;
            }            
        }
        
        $carregarView = new \Core\ConfigView("Views/login/login", $this->dados);
        $carregarView->renderizar();        
    }
}
