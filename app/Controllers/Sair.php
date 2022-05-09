<?php

namespace App\Controllers;

if(!defined('2022T2')){
    header("Location: /");
    die("");
}

class Sair
{
    public function index() {
        unset($_SESSION['usuario_id'], $_SESSION['usuario_nome'], $_SESSION['usuario_email'], $_SESSION['perfil'], $_SESSION['licensed']);
        $urlDestino = URL . 'index';
        header("Location: $urlDestino");
    }
}
