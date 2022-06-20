<?php include('./app/Layouts/header.php'); ?>

<!DOCTYPE html>
<html lang="en">
   <title>Projeto Integrador - Consulta de Veiculo</title>
   <body>
      <div class="mt-30">
         <form class="cadastro-form" method="POST">
            <h2 class="cadastro">Consulta de Veiculo</h2>
            <div class="form__group field find-user-form">
               <div>
                  <input
                     id="tipo"
                     type="input" 
                     class="form__field margin-160" 
                     placeholder="tipo"
                     name="tipo" 
                     autocomplete="off" 
                     value=""
                     style="width: 65%; font-weight: 500;"
                     required
                     />
                  <label for="tipo" class="form__label blue margin-160" style="top: 35px;">Digite um tipo para pesquisar</label>
               </div>
               <div class="btnCadastro">   
                  <button class="active bg-blue br-6 btn-cadastro" type="submit">
                     CONSULTAR
                  </button>  
                  <button onclick="location.href='/home/index'" class="btn-cadastro active bg-red br-6">
                     VOLTAR
                  </button>  
               </div>
            </div>
         </form>
      </div>
   </body>
</html>