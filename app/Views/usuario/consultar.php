<?php include('./app/Layouts/header.php'); ?>

<!DOCTYPE html>
<html lang="en">
   <title>Projeto Integrador - Consulta de Usuário</title>
   <body>
      <div class="mt-30">
         <form class="cadastro-form" action="/consultar-usuario">
               <h2 class="cadastro">Consulta de Usuário</h2>
               <div class="form__group field" >
                  <input
                     id="nome"
                     type="input" 
                     class="form__field margin-160" 
                     placeholder="nome"
                     name="nome" 
                     autocomplete="off" 
                     value=""
                     style="width: 65%;"
                     required
                     />
                  <label for="nome" class="form__label blue margin-160">Digite para pesquisar</label>
                  <div class="btnCadastro">   
               <button class="btn-cadastro " type="submit">
                  <a value="consultar" type="submit" class="active bg-blue br-6">CONSULTAR</a>
               </button>  
               <button class="btn-cadastro">
               <a href="/home" class="active bg-red br-6">VOLTAR</a>
               </button>  
            </div>
               </div>
         </form>
      </div>
   </body>
</html>