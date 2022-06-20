<?php

namespace App\Controllers;

if(!defined('2022T2')){
    header("Location: /");
    die("");
}

class Chamado
{
    private $dados;
    
    public function index() {
       $carregarView = new \Core\ConfigView("Views/chamado/cadastrar", $this->dados);
       $carregarView->renderizar();
    }

    public function add() {
        $this->dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
        if(!empty($this->dados['funcionarioId'])){
            $chamadoModel = new \App\Models\Chamado();
            $retorno = $chamadoModel->add($this->dados);
            if ($retorno){
                echo("<script>alert('".$retorno."');
                window.location.href='/chamado/add';
                </script>");
            } else {
                echo("<script>alert('Erro ao cadastrar chamado!')</script>");
            }
        } else {
            $carregarView = new \Core\ConfigView("Views/chamado/cadastrar", $this->dados);
            $carregarView->renderizar();
        }
     }

     public function delete(){
        if (isset($_GET['id'])){
            $deleteUser = new \App\Models\Chamado();
            $retorno = $deleteUser->delete($_GET['id']);
            echo("<script>alert('".$retorno."');
            window.location.href='/chamado/find';
            </script>");
        }
    }

    public function edit(){
        $this->dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
        if (isset($_GET['id']) && "" == trim($_POST['funcionarioId'])){
            $carregarView = new \Core\ConfigView("Views/chamado/editar", null);
            return $carregarView->renderizar();
        }
        
        
        if (!empty($this->dados['funcionarioId'])){
            $chamadoModel = new \App\Models\Chamado();
            $editReturn = $chamadoModel->edit($this->dados);
            $carregarView = new \Core\ConfigView("Views/chamado/editar", null);
            $carregarView->renderizar();
            if($editReturn){
                echo "<script>alert('Informações alteradas com sucesso!')</script>";
            }
        }
    }

    public function relatorio(){
        $chamadoModel = new \App\Models\Chamado();
        $carregarView = new \Core\ConfigView("Views/chamado/relatorio", null);
        $carregarView->renderizar();
    }

    public function find() {
        $this->dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
         if(!empty($this->dados['endereco'])){
            $chamadoModel = new \App\Models\Chamado();
            $result = $chamadoModel->find($this->dados);

            if($result){
                $carregarView = new \Core\ConfigView("Views/chamado/consultar", $this->dados);
                $carregarView->renderizar();
                ?>
            <html>
            <script>
                function deleteUser(id){
                    if (confirm("Você realmente gostaria de excluir este chamado?")){
                        document.location = '/chamado/delete?id=' + id;
                    }
                }
            </script>
            <div style="overflow-x:auto;" >
            <table class="tabela">
                    <tr>
                        <th>#</th>   
                        <th>Endereço</th>
                        <th>Tempo</th>
                        <th>Distancia</th>
                        <th>Data</th>
                        <th>Ações</th>
                    <?php foreach($result as &$valor): ?>
                    </tr>
                    <tr>
                    <td>
                        <input type="checkbox" name="checkbox" id="<?php echo $valor[0]; ?>">
                        <?php echo $valor[0];?>
                    </td>
                    <td>
                        <?php echo $valor[1];?>
                    </td>
                    <td>
                        <?php echo $valor[2]; ?>
                    </td>
                    <td>
                        <?php echo $valor[3]; echo "Km";?>
                    </td>
                    <td>
                        <?php echo $valor[6];?>
                    </td>
                    <td>
                        <div class="btnFind" >
                        <button onclick="document.location = '/chamado/edit?id=' + <?php echo $valor[0];?>;" class="table-action-button bg-blue "><i style="color: white; font-size: 18px;" class="fa fa-pencil"></i>
                        <button onclick="document.location = '/chamado/relatorio?id=' + <?php echo $valor[0];?>;" class="table-action-button bg-green "><i style="color: white; font-size: 18px;" class="fa fa-leaf"></i>
                        <button onclick="deleteUser(<?php echo $valor[0];?>, '<?php echo $valor[1];?>');" class="table-action-button bg-red"><i style="color: white; font-size:18px;" class="fa fa-trash"></i>
                        </div>
                    </td>
                    <?php endforeach; ?>
                        </tr>
                    </div>
                    <script>
                        const checkboxes = document.querySelectorAll('input[type="checkbox"]');
                        const gerarRelatorioButton = document.querySelector('.gerar-relatorio');
                        const idsForGeneratorRelatorio = [];
                        
                        gerarRelatorioButton.addEventListener('click', function(){
                            if(!idsForGeneratorRelatorio.length) return alert('Nenhum chamado selecionado!');

                            document.location = '/chamado/relatorio?ids=' + idsForGeneratorRelatorio.join(',');
                        });
                        checkboxes.forEach(checkbox => {
                            checkbox.addEventListener('change', event => {
                                if(!gerarRelatorioButton.style.display ||gerarRelatorioButton.style.display === 'none' ){
                                    gerarRelatorioButton.style.display = 'block';
                                }

                                
                                const id = event.target.id;
                                const checked = event.target.checked;
                                if(checked){
                                    idsForGeneratorRelatorio.push(id);
                                }else{
                                    idsForGeneratorRelatorio.splice(idsForGeneratorRelatorio.indexOf(id), 1);
                                }
                                
                                if(!idsForGeneratorRelatorio.length && gerarRelatorioButton.style.display === 'block'){
                                    gerarRelatorioButton.style.display = 'none';
                                }
                            });
                        });
                    </script>
            </html>
            <?php
            }else{
                $carregarView = new \Core\ConfigView("Views/usuario/consultar", $this->dados);
                $carregarView->renderizar();
                echo("<script>alert('Erro ao buscar esse usuário!')</script>");
            }
        } else {
            $carregarView = new \Core\ConfigView("Views/chamado/consultar", $this->dados);
            $carregarView->renderizar();
        }
     }
}