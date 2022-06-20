<?php include('./app/Layouts/header.php'); ?>

<!DOCTYPE html>
<html lang="en">
   <title>Projeto Integrador - Cadastro de Veiculo</title>
   <body>
      <div class="mt-30">
         <form class="cadastro-form" method="POST">
            <fieldset>
               <legend>
                  <img src="../public/user.png" width="150">
               </legend>
               <h2 class="cadastro">Cadastro de Veiculo</h2>
               <label style="font-size: 1.3rem;" class="blue">Tipo</label>
               <div class="input-field">
                  <select name="vehicleType" required>
                     <option value="" disabled selected>Escolher</option>
                     <option value="strada">Strada</option>
                     <option value="fiorino">Fiorino</option>
                     <option value="uno">Uno</option>
                     <option value="palio">Palio</option>
                     <option value="logan">Logan</option>
                  </select>
               </div>
               <div class="form__group field">
                  <input
                     id="ano"
                     type="input" 
                     class="form__field"
                     name="ano" 
                     autocomplete="off" 
                     value="" 
                     required />
                  <label for="ano" class="form__label blue">Ano</label>
               </div>
               <div class="form__group field">
                  <input
                     id="consumo"
                     type="input" 
                     class="form__field"
                     name="consumo" 
                     autocomplete="off" 
                     value="" 
                     required
                     readonly />
                  <label for="consumo" class="form__label blue">Consumo</label>
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

   <script>
      const vehicleTypeSelect = document.querySelector('select[name=vehicleType]');
      const consumoInput = document.querySelector('input[name=consumo]')
      
      vehicleTypeSelect.addEventListener('change', function(event) {
         const consumosData = {
            'strada': '9.1',
            'fiorino': '8.3',
            'uno': '9.1',
            'palio': '10.1',
            'logan': '9.8'
         };

         consumoInput.value = consumosData[event.target.value];
      })
   </script>
</html>