<?php include('./app/Layouts/header.php'); ?>
<?php 
if (isset($_GET['id'])){
   
   $selectByID = new \App\Models\Vehicle();
   $retorno = $selectByID->selectByID($_GET['id']);
   $id = $retorno[0];
   $tipo = $retorno[1];
   $ano = $retorno[2];
   $consumo = $retorno[3];

}

?>
<!DOCTYPE html>
<html lang="en">
   <title>Projeto Integrador - Editar Veiculo</title>
   <body>
      <div class="mt-30">
         <form class="cadastro-form" method="POST">
            <fieldset>
               <legend>
                  <img src="/../public/edit.png" width="150">
               </legend>
               <h2 class="cadastro">Editar Veiculo</h2>
               <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
               <label style="font-size: 1.3rem;" class="blue">Tipo</label>
               <div class="input-field">
                  <select name="vehicleType" required>
                     <option value="strada" <?php if($tipo === 'strada'){
                        echo 'selected';
                     } ?>>Strada</option>
                     <option value="fiorino" <?php if($tipo === 'fiorino'){
                        echo 'selected';
                     } ?>>Fiorino</option>
                     <option value="uno" <?php if($tipo === 'uno'){
                        echo 'selected';
                     } ?>>Uno</option>
                     <option value="palio" <?php if($tipo === 'palio'){
                        echo 'selected';
                     } ?>>Palio</option>
                     <option value="logan" <?php if($tipo === 'logan'){
                        echo 'selected';
                     } ?>>Logan</option>
                  </select>
               </div>
               <div class="form__group field">
                  <input
                     id="ano"
                     type="input" 
                     class="form__field"
                     name="ano" 
                     autocomplete="off" 
                     value="<?php echo $ano; ?>" 
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
                     value="<?php echo $consumo; ?>" 
                     required
                     readonly />
                  <label for="consumo" class="form__label blue">Consumo</label>
               </div>
            </fieldset>
            <div class="btnCadastro">   
               <button name="btnSaveUser" class="btn-cadastro active bg-blue br-6" type="submit">
                  SALVAR
               </button>  
               <button onclick="document.location='/veiculo/find'" type="button" class="btn-cadastro active bg-red br-6">
                  VOLTAR
               </button>  
            </div>
         </form>
        
      </div>

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
   </body>
</html>