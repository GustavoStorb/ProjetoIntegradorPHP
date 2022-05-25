<?php

namespace App\Controllers;

if(!defined('2022T2')){
    header("Location: /");
    die("");
}

if (isset($_GET['id']) && isset($_GET['nome'])){
    $deleteUser = new \App\Models\Usuario();
    $retorno = $deleteUser->delete($_GET['id'], $_GET['nome']);
    echo("<script>alert('".$retorno."');
    window.location.href='/usuario/find';
    </script>");
    
}

class Usuario
{
    private $dados;
    
    public function index() {
       $carregarView = new \Core\ConfigView("Views/usuario/cadastrar", $this->dados);
       $carregarView->renderizar();
    }

    public function add() {
        $this->dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
        if(!empty($this->dados['nome'])){
            $addUser = new \App\Models\Usuario();
            $retorno = $addUser->add($this->dados);
            if ($retorno){
                $urlDestino = URL . "home/index";
                header("Location: $urlDestino");
            } else {
                echo("<script>alert('Erro ao cadastrar usuário!')</script>");
            }
        } else {
            $carregarView = new \Core\ConfigView("Views/usuario/cadastrar", $this->dados);
            $carregarView->renderizar();
        }
     }

     public function find() {
        $this->dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
         if(!empty($this->dados['nome'])){
            $userModel = new \App\Models\Usuario();
            $result = $userModel->find($this->dados);

            if($result){
                $carregarView = new \Core\ConfigView("Views/usuario/consultar", $this->dados);
                $carregarView->renderizar();
                ?>
            <html>
            <script>
                function deleteXD(id, nome){
                    if (confirm("Você realmente gostaria de excluir este usuario?")){
                        document.location = '/usuario/find?id=' + id + '&nome=' + nome;
                    }
                }
            </script>
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
                        <button class="table-action-button bg-blue"><i style="font-size:18px" class="fa fa-pencil"></i>
                        <button onclick="deleteXD(<?php echo $valor[0];?>, '<?php echo $valor[1];?>');" class="table-action-button bg-red"><i style="font-size:18px" class="fa fa-trash"></i>
                    </td>
                    <?php endforeach; ?>
                        </tr>
            </html>
            <?php
            }else{
                $carregarView = new \Core\ConfigView("Views/usuario/consultar", $this->dados);
                $carregarView->renderizar();
                echo("<script>alert('Erro ao buscar esse usuário!')</script>");
            }
        } else {
            $carregarView = new \Core\ConfigView("Views/usuario/consultar", $this->dados);
            $carregarView->renderizar();
        }
     }
     
}