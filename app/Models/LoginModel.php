<?php

namespace App\Models;

if(!defined('2022T2')){
    header("Location: /");
    die("");
}

use \PDO;

class LoginModel extends Conexao
{

    private $dados;
    private $resultado = false;
    private $resultadoBd;
    private $conn;

    function getResultado(): bool {
        return $this->resultado;
    }

    public function login(array $dados = null) {
        $this->dados = $dados;
        $this->conn = $this->connect();
        $query_val_login = "SELECT id, nome, email, senha, perfil, licensed
                FROM usuario
                WHERE email =:email LIMIT 1";
        $result_val_login = $this->conn->prepare($query_val_login);
        $result_val_login->bindParam(":email", $this->dados['usuario'], \PDO::PARAM_STR);
        $result_val_login->execute();
        $this->resultadoBd = $result_val_login->fetch();
        if ($this->resultadoBd) {
            $this->validarSenha();
        } else {
            $_SESSION['msg'] = "<p style='color: #ff0000;'>Erro: Usuário não encontrado!</p>";
            $this->resultado = false;
        }
    }

    private function validarSenha() {
        if (password_verify($this->dados['senha'], $this->resultadoBd['senha'])) {
            $_SESSION['usuario_id'] = $this->resultadoBd['id'];
            $_SESSION['usuario_nome'] = $this->resultadoBd['nome'];
            $_SESSION['usuario_email'] = $this->resultadoBd['email'];
            $_SESSION['perfil'] = $this->resultadoBd['perfil'];
            $_SESSION['licensed'] = $this->resultadoBd['licensed'];

            $this->resultado = true;
        } else {
            $_SESSION['msg'] = "<p style='color: #ff0000;'>Erro: Usuário ou a senha incorreta</p>";
            $this->resultado = false;
        }
    }   

}
    