<?php

namespace Core;

if(!defined('2022T2')){
    header("Location: /");
    die();
}

class ConfigController
{

    private $url;
    private $urlConjunto;
    private $urlController;
    private $urlMetodo;

    public function __construct() {
        if (!empty(filter_input(INPUT_GET, "url", FILTER_DEFAULT))) {
            $this->url = filter_input(INPUT_GET, "url", FILTER_DEFAULT);
            $this->urlConjunto = explode("/", $this->url);
            
            if ((isset($this->urlConjunto[0]))) {
                $this->urlController = $this->urlConjunto[0];
                $this->urlMetodo = "index";
            } else {
                $this->urlController = "erro";
                $this->urlMetodo = "index";
            }
        } else {
            $this->urlController = "index";
            $this->urlMetodo = "index";
        }
    }
    
    public function carregar() {
        $this->config();
        $configPermissao = new \Core\ConfigPermissao();
        $configPermissao->validarPermissao($this->urlController);
        $urlController = ucwords($this->urlController);
        $classe = "\\App\\Controllers\\" . $urlController;
        
        $classeCarregar = new $classe;
        $classeCarregar->index();
    }
    
    private function config() {
        define('URL', 'http://localhost/');
    }

}
