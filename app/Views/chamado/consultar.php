<?php include('./app/Layouts/header.php'); ?>

<!DOCTYPE html>
<html lang="en">
   <title>Projeto Integrador - Consulta de Chamado</title>
   <body>
      <div class="mt-30">
         <form class="cadastro-form" method="POST">
            <h2 class="cadastro">Consulta de Chamado</h2>
            <div class="form__group field find-user-form">
               <div>
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
               </div>
               <div class="btnCadastro">   
               <button class="active bg-blue br-6 btn-cadastro" type="submit">
                     CONSULTAR
                  </button>  
                  <button onclick="location.href='/home/index'" class="btn-cadastro active bg-red br-6">
                     VOLTAR
                  </button>
                  <button class="active gerar-relatorio font-black bg-green br-6 btn-cadastro ml-9" type="submit">
                     GERAR RELATORIO
                  </button> 
               </div>
            </div>
         </form>
      </div>
   </body>
</html>