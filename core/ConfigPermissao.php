<?php

namespace Core;

if(!defined('2022T2')){
    header("Location: /");
    die("");
}

class ConfigPermissao
{
    private $urlController;
    private $pgPublica;
    private $pgRestrita;
    private $resultado;
    
    function getResultado(): string {
        return $this->resultado;
    }

    public function validarPermissao($urlController): void {
        $this->urlController = $urlController;
        $this->pgPublica = ["login", "sair", "index", "about", "contact"];
        
        if(in_array($this->urlController, $this->pgPublica)){
            $this->resultado = $this->urlController;
        }else{
            $this->pgRestrita();
        }
    }
    
    private function pgRestrita(): void {
        $this->pgRestrita = ["home", "cadastrar"];
        
        if(in_array($this->urlController, $this->pgRestrita)){
            $this->verificarLogin();
        }else{
            $_SESSION['msg'] = "<p style='color: #ff0000;'></p>";
            $urlDestino = URL . 'login/index';
            header("Location: $urlDestino");
        }
    }
    
    private function verificarLogin(): void {
        if(isset($_SESSION['usuario_id']) AND isset($_SESSION['usuario_nome']) AND isset($_SESSION['usuario_email']) ){
            $this->resultado = $this->urlController;
            $_SESSION['hasPermission'] = true;
        }else{
            $_SESSION['hasPermission'] = false;
            $_SESSION['msg'] = "<p style='color: #ff0000;'>Erro: Para acessar a página realize o login!</p>";
            $urlDestino = URL . 'login/index';
            header("Location: $urlDestino");
        }
    }
    
}
