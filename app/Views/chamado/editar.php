<?php include('./app/Layouts/header.php');

if (isset($_GET['id'])){
   
    $chamadoModel = new \App\Models\Chamado();
    $retorno = $chamadoModel->selectByID($_GET['id']);
    $id = $retorno[0];
    $endereco = $retorno[1];
    $tempo = $retorno[2];
    $km = $retorno[3];
    $funcionarioId = $retorno[4];
    $veiculoId = $retorno[5];
    $data = $retorno[6];
 
}

$vehicleModel = new \App\Models\Vehicle();
$userModel = new \App\Models\Usuario();

$funcionarios = $userModel->findAllHabilitados();
$veiculos = $vehicleModel->findAll();
?>

<!DOCTYPE html>
<html lang="en">
   <title>Projeto Integrador - Cadastro de Chamado</title>
   <body>
      <div class="mt-30">
         <form class="cadastro-form" method="POST">
            <fieldset>
               <legend>
                  <img src="../public/user.png" width="150">
               </legend>
               <h2 class="cadastro">Cadastro de Chamado</h2>
               <input type="hidden" name="id" value="<?php echo $id; ?>">
               <div class="form__group field">
                  <input
                     id="endereco"
                     type="input" 
                     class="form__field" 
                     placeholder="endereco"
                     name="endereco" 
                     autocomplete="off" 
                     value="<?php echo $endereco; ?>"
                     required />
                  <label for="endereco" class="form__label blue">Endereço</label>
               </div>
               <div class="form__group field">
                  <input
                     id="tempo"
                     type="time" 
                     class="form__field" 
                     placeholder="tempo"
                     name="tempo" 
                     autocomplete="off" 
                     value="<?php echo $tempo; ?>" 
                     required />
                  <label for="tempo" class="form__label blue">Tempo</label>
               </div>
               <div class="form__group field">
                  <input
                     id="distancia"
                     type="number" 
                     class="form__field" 
                     placeholder="email"
                     name="distancia" 
                     autocomplete="off" 
                     value="<?php echo $km; ?>" 
                     required />
                  <label for="distancia" class="form__label blue">Distancia</label>
               </div>
               <div class="form__group field">
                  <input
                     id="data"
                     type="date" 
                     class="form__field" 
                     placeholder="email"
                     name="data" 
                     autocomplete="off" 
                     value="<?php echo $data; ?>" 
                     required />
                  <label for="data" class="form__label blue">Data</label>
               </div>
               <label style="font-size: 1.3rem;" class="blue">Funcionarios</label>
               <div class="input-field">
                  <select name="funcionarioId" required>
                    <?php
                        foreach($funcionarios as &$user){
                            echo '<option value="'.$user['id'].'" '.($user['id'] === $funcionarioId ? 'selected' : null).' >'.$user['nome'].'</option>';
                        }
                    ?>
                  </select>
               </div>
               <hr>
               <label style="font-size: 1.3rem;" class="blue">Veiculos</label>
               <div class="input-field col s12">
                  <select name="veiculoId">
                        <?php
                            foreach($veiculos as &$vehicle){
                                echo '<option value="'.$vehicle['id'].'" '.($vehicle['id'] === $veiculoId ? 'selected' : '').'>'.$vehicle['tipo'].'</option>';
                            }
                        ?>
                  </select>
               </div>
            </fieldset>
            <div class="btnCadastro">   
               <button name="SendCadastro" class="btn-cadastro active bg-blue br-6" type="submit">
                  SALVAR
               </button>  
               <button type="button" onclick="location.href='/chamado/find'" class="btn-cadastro active bg-red br-6">
                  VOLTAR
               </button>  
            </div>
         </form>
        
      </div>
   </body>
</html>