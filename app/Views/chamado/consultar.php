<?php include('./app/Layouts/header.php');

$chamadoModel = new \App\Models\Chamado();
$result = $chamadoModel->find($this->dados);

?>

<!DOCTYPE html>
<html lang="en">
   <title>Projeto Integrador - Consulta de Chamado</title>
   <body>
      <div class="mt-30">
         <form class="cadastro-form" method="POST">
            <h2 class="cadastro">Consulta de Chamado</h2>
            <div class="form__group field find-user-form">
               <!-- <div>
                  <input
                     id="endereco"
                     type="input" 
                     class="form__field margin-160" 
                     placeholder="endereco"
                     name="endereco" 
                     autocomplete="off" 
                     value=""
                     style="width: 65%; font-weight: 500;"
                     required
                     />
                  <label for="endereco" class="form__label blue margin-160" style="top: 35px;">Digite um endereco para pesquisar</label>
               </div> -->
               <div class="btnCadastro"> 
               <button type="button" onclick="location.href='/home/index'" style="margin-top: 10px;" class="btn-cadastro active bg-red br-6">
                     VOLTAR
                  </button>  
                  <button class="active gerar-relatorio font-black bg-green br-6 btn-cadastro" style="display: block;" type="button">
                     GERAR RELATORIOS
                  </button> 
               </div>
            </div>
         </form>
      </div>
   </body>
</html>

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
                        <th></th> 
                        <th>#</th>   
                        <th>Endereço</th>
                        <th>Tempo</th>
                        <th>Distancia</th>
                        <th>Funcionario</th>
                        <th>Veiculo</th>
                        <th>Data</th>
                        <th>Ações</th>
                    <?php foreach($result as &$valor): ?>
                    </tr>
                    <tr>
                       <td>
                          <input type="checkbox" name="checkbox" id="<?php echo $valor[0]; ?>">

                     </td>
                       <td>
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
                        <?php 
                        $userModel = new \App\Models\Usuario();
                        $funcionario = $userModel->selectByID($valor[4]);
                        echo $funcionario['nome']; ?>
                    </td>
                    <td>
                        <?php 
                        $vehicleModel = new \App\Models\Vehicle();
                        $vehicle = $vehicleModel->selectByID($valor[5]);
                        echo $vehicle['tipo']."(".$vehicle['ano'].")"; ?>
                    </td>
                    <td>
                        <?php
                        $data = date_create($valor[6]);
                        echo date_format($data, 'd/m/Y') ?>
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
            </html>
                    <script>
                        const checkboxes = document.querySelectorAll('input[type="checkbox"]');
                        const gerarRelatorioButton = document.querySelector('.gerar-relatorio');
                        const idsForGeneratorRelatorio = [];
                        
                        gerarRelatorioButton.addEventListener('click', function(){
                            if(!idsForGeneratorRelatorio.length) return alert('Nenhum chamado selecionado!');

                            window.location.href = '/chamado/relatorio?ids=' + idsForGeneratorRelatorio.join(',');
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
                                
                            });
                        });
                    </script>