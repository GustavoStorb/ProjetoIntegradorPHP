<?php include('./app/Layouts/header.php'); ?>

<!DOCTYPE html>
<html lang="en">
   <title>Projeto Integrador - Cadastro de Usuário</title>
   <body>
      <div class="mt-30">
         <form class="cadastro-form" action="/cadastrar-usuario">
            <fieldset>
               <legend>
                  <img src="../public/user.png" width="150">
               </legend>
               <h2 class="cadastro">Cadastro de Usuário</h2>
               <div class="form__group field">
                  <input
                     id="nome"
                     type="input" 
                     class="form__field" 
                     placeholder="nome"
                     name="nome" 
                     autocomplete="off" 
                     value=""
                     required />
                  <label for="nome" class="form__label blue">Nome</label>
               </div>
               <div class="form__group field">
                  <input
                     id="email"
                     type="input" 
                     class="form__field" 
                     placeholder="email"
                     name="email" 
                     autocomplete="off" 
                     value="" 
                     required />
                  <label for="email" class="form__label blue">E-mail</label>
               </div>
               <div class="form__group field">
                  <input
                     id="senha"
                     type="password" 
                     class="form__field" 
                     placeholder="email"
                     name="senha" 
                     autocomplete="off" 
                     value="" 
                     required />
                  <label for="senha" class="form__label blue">Senha</label>
               </div>
               <label style="font-size: 1.3rem;" class="blue">Cargo</label>
               <div class="input-field">
                  <select name="perfil" required>
                     <option value="" disabled selected>Escolher</option>
                     <option value="adm">Administrador</option>
                     <option value="user">Funcionário</option>
                  </select>
               </div>
               <hr>
               <label style="font-size: 1.3rem;" class="blue">Habilitado</label>
               <div class="input-field col s12">
                  <select name="licensed">
                     <option value="" disabled selected>Escolher</option>
                     <option value="1">Sim</option>
                     <option value="0">Não</option>
                  </select>
               </div>
            </fieldset>
            <div class="btnCadastro">   
               <button class="btn-cadastro" type="submit">
                  <a value="cadastrar" type="submit" class="active bg-blue br-6">CADASTRO</a>
               </button>  
               <button onclick="location.href='/home'" class="btn-cadastro">
               <a class="active bg-red br-6">VOLTAR</a>
               </button>  
            </div>
         </form>
        
      </div>
   </body>
</html>