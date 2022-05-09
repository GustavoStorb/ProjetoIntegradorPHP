<?php

namespace Core;

if(!defined('2022T2')){
    header("Location: /");
    die("");
}

class ConfigView
{

    private $nome;
    private $dados;

    public function __construct($nome, array $dados = null) {
        $this->nome = $nome;
        $this->dados = $dados;
    }

    public function renderizar() {
        if (file_exists('app/' . $this->nome . '.php')) {
            include 'app/' . $this->nome . '.php';
        } else {
            echo "Erro ao carregar a página<br>";
            echo "Erro ao carregar a view: {$this->nome}<br>";
        }
    }

}
