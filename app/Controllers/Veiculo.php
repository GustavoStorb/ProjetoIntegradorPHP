<?php

namespace App\Controllers;

if(!defined('2022T2')){
    header("Location: /");
    die("");
}

class Veiculo
{
    private $dados;
    
    public function index() {
       $carregarView = new \Core\ConfigView("Views/veiculo/cadastrar", $this->dados);
       $carregarView->renderizar();
    }

    public function add() {
        $this->dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
        if(!empty($this->dados['vehicleType'])){
            $vehicleModel = new \App\Models\Vehicle();
            $retorno = $vehicleModel->add($this->dados);
            $carregarView = new \Core\ConfigView("Views/veiculo/cadastrar", $this->dados);
            $carregarView->renderizar();
            echo "<script>alert('Veiculo criado com sucesso!');</script>";
        } else {
            $carregarView = new \Core\ConfigView("Views/veiculo/cadastrar", $this->dados);
            $carregarView->renderizar();
        }
     }

     public function delete(){
        if (isset($_GET['id'])){
            $vehicleModel = new \App\Models\Vehicle();
            $retorno = $vehicleModel->delete($_GET['id']);
            echo("<script>alert('".$retorno."');
            window.location.href='/veiculo/find';
            </script>");
            return;
        }

        echo "<script>window.location.href='/veiculo/find';</script>";
    }

    public function find() {
        $this->dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
        if(!empty($this->dados['tipo'])){
            $vehicleModel = new \App\Models\Vehicle();
            $result = $vehicleModel->find($this->dados);

            if($result){
                $carregarView = new \Core\ConfigView("Views/veiculo/consultar", $this->dados);
                $carregarView->renderizar();
                ?>
            <html>
            <script>
                function deleteVehicle(id){
                    if (confirm("Você realmente gostaria de excluir este veiculo?")){
                        document.location = '/veiculo/delete?id=' + id;
                    }
                }
            </script>
            <div style="overflow-x:auto;" >
            <table class="tabela">
                    <tr>
                        <th>#</th>   
                        <th>Tipo</th>
                        <th>Ano</th>
                        <th>Consumo</th>
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
                        <?php echo $valor[3]?>
                    </td>
                    <td>
                        <div class="btnFind" >
                        <button onclick="document.location = '/veiculo/edit?id=' + <?php echo $valor[0];?>;" class="table-action-button bg-blue "><i style="color: white; font-size: 18px;" class="fa fa-pencil"></i>
                        <button onclick="deleteVehicle(<?php echo $valor[0];?>);" class="table-action-button bg-red"><i style="color: white; font-size:18px;" class="fa fa-trash"></i>
                        </div>
                    </td>
                    <?php endforeach; ?>
                        </tr>
                    </div>
            </html>
            <?php
            }else{
                $carregarView = new \Core\ConfigView("Views/veiculo/consultar", $this->dados);
                $carregarView->renderizar();
                echo("<script>alert('Erro ao buscar esse veiculo!')</script>");
            }
        } else {
            $carregarView = new \Core\ConfigView("Views/veiculo/consultar", $this->dados);
            $carregarView->renderizar();
        }
    }

    public function edit() {
        $this->dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
        if(!empty($this->dados['id'])){
            $vehicleModel = new \App\Models\Vehicle();
            $vehicleModel->edit($this->dados);
            $carregarView = new \Core\ConfigView("Views/veiculo/editar", null);
            $carregarView->renderizar();
            echo "<script>alert('Veiculo editado com sucesso!');</script>";
        } else {
            $carregarView = new \Core\ConfigView("Views/veiculo/editar", null);
            return $carregarView->renderizar();
        }
    }
}