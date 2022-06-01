<?php include('./app/Layouts/header.php'); ?>
<?php 
if (isset($_GET['id'])){
   
   $selectByID = new \App\Models\Usuario();
   $retorno = $selectByID->selectByID($_GET['id']);
   $id = $retorno[0];
   $nome = $retorno[1];
   $email = $retorno[2];
   $tipo = $retorno[4];
   $licensed = $retorno[5];

}

?>
<!DOCTYPE html>
<html lang="en">
   <title>Projeto Integrador - Editar Usuário</title>
   <body>
      <div class="mt-30">
         <form class="cadastro-form" method="POST">
            <fieldset>
               <legend>
                  <img src="/../public/user.png" width="150">
               </legend>
               <h2 class="cadastro">Editar Usuário</h2>
               <div class="form__group field">
                  <input
                     id="nome"
                     type="input" 
                     class="form__field" 
                     placeholder="nome"
                     name="nome" 
                     autocomplete="off" 
                     value="<?php echo $nome; ?>"
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
                     value="<?php echo $email; ?>" 
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
                    <option value="" disabled>Escolha</option>
                    <option value="adm" <?php if($tipo == 'adm'){?> selected <?php } ?>>Administrador</option>
                    <option value="user" <?php if($tipo == 'user'){?> selected <?php } ?>>Funcionário</option>
                  </select>
               </div>
               <hr>
               <label style="font-size: 1.3rem;" class="blue">Habilitado</label>
               <div class="input-field col s12">
                  <select name="licensed">
                    <option value="" disabled>Escolha</option>
                    <option value="1" <?php if($licensed == '1'){?> selected <?php } ?>>Sim</option>
                    <option value="0" <?php if($licensed == '0'){?> selected <?php } ?>>Não</option>
                  </select>
               </div>
            </fieldset>
            <div class="btnCadastro">   
               <button name="SendCadastro" class="btn-cadastro active bg-blue br-6" type="submit">
                  SALVAR
               </button>  
               <button onclick="location.href='/usuario/find'" class="btn-cadastro active bg-red br-6">
                  VOLTAR
               </button>  
            </div>
         </form>
        
      </div>
   </body>
</html>