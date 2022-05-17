<?php

namespace App\Controllers;

if(!defined('2022T2')){
    header("Location: /");
    die("");
}

class Consultar
{
    
    private $dados;
    
    public function index() {
       $carregarView = new \Core\ConfigView("Views/usuario/consultar", $this->dados);
       $carregarView->renderizar();
    }

    public function consultarUsuario() {
        try {
            $nome = $_GET["nome"];

            $database = "\\App\\Models\\Conexao";
            $databaseClass = new $database;
            $databaseClass->connect();
            $connect = $databaseClass->connect;

            $sql = "SELECT * FROM usuario WHERE nome LIKE '$nome%' ORDER BY nome";

            $stmt = $connect->prepare($sql);
            $stmt->execute(); 
            $result = $stmt->fetchAll();
            
            $carregarView = new \Core\ConfigView("Views/usuario/consultar", $this->dados);
            $carregarView->renderizar();

            ?> 
            <html>
            <table class="tabela">
                    <tr>
                        <th>#</th>   
                        <th>Nome</th>
                        <th>Email</th>
                        <th>Cargo</th>
                        <th>Habilitado</th>
                        <th>Ações</th>

                        <?php 
                        if($_SESSION['perfil'] == 'adm'){
                        ?>
                        <?php } ?>

                    <?php foreach($result as &$valor): ?>
                    </tr>

                    <tr>
                    <td>
                        <?php echo $valor[0];?>
                    </td>
                    <td>
                        <?php echo $valor[1];?>
                    </td>
                    <td>
                        <?php echo $valor[2]?>
                    </td>
                    <td>
                    <?php
                        $tipo = $valor[4];
                            if($tipo == 'adm'){
                                echo "Administrador";
                            }elseif($tipo == 'user'){
                                echo "Funcionário";
                            }
                        ?>
                    </td>
                    <td>
                    <?php 
                        $licensed = $valor[5];
                            if($licensed == '1'){
                                echo "Sim";
                            }elseif($licensed == '0'){
                                echo "Não";
                            }
                        ?>

                    </td>
                    <td>
                        <button><i style="font-size:18px" class="fa fa-pencil"></i>
                        <button><i style="font-size:18px" class="fa fa-trash"></i>
                    </td>
                    <?php endforeach; ?>
                        </tr>

            </html>
            <?php
        } catch (\PDOException $e){
            $carregarView = new \Core\ConfigView("Views/usuario/consultar", $this->dados);
            $carregarView->renderizar();
            echo "<script>alert(`Erro ao consultar usuário!`)</script>";
        }

     }
}