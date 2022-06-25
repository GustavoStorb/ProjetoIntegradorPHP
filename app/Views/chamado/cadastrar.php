<?php include('./app/Layouts/header.php');

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
                  <img src="../public/chamado.png" width="150">
               </legend>
               <h2 class="cadastro">Cadastro de Chamado</h2>
               <div class="form__group field">
                  <input
                     id="endereco"
                     type="input" 
                     class="form__field" 
                     placeholder="endereco"
                     name="endereco" 
                     autocomplete="off" 
                     value=""
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
                     value="" 
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
                     value="" 
                     min="0"
                     maxlength="4"
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
                     value="" 
                     required />
                  <label for="data" class="form__label blue">Data</label>
               </div>
               <label style="font-size: 1.3rem;" class="blue">Funcionarios</label>
               <div class="input-field">
                  <select name="funcionarioId" required>
                    <option value="" disabled selected>Escolher</option>
                    <?php
                        foreach($funcionarios as &$user){
                            echo '<option value="'.$user['id'].'">'.$user['nome'].'</option>';
                        }
                    ?>
                  </select>
               </div>
               <hr>
               <label style="font-size: 1.3rem;" class="blue">Veiculos</label>
               <div class="input-field col s12">
                  <select name="veiculoId">
                     <option value="" disabled selected>Escolher</option>
                        <?php
                            foreach($veiculos as &$vehicle){
                                echo '<option value="'.$vehicle['id'].'">'.$vehicle['tipo'].'</option>';
                            }
                        ?>
                  </select>
               </div>
            </fieldset>
            <div class="btnCadastro">   
               <button name="SendCadastro" class="btn-cadastro active bg-blue br-6" type="submit">
                  CADASTRAR
               </button>  
               <button onclick="location.href='/home/index'" class="btn-cadastro active bg-red br-6">
                  VOLTAR
               </button>  
            </div>
         </form>
        
      </div>
   </body>
</html>