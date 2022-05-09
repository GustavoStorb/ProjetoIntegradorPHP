<?php
include_once '../autenticar.php';  
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel Administrativo</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
</head>
<style>
    label{
        font-size: 15px;
    }
</style>
<body>
    
    <div class="container">
        <h3>Cadastro de Usuario</h3>

        <form action="gravar-usuario.php" method="post" autocomplete="off">

            <div class="input-field">
                <label for="nome">Nome</label>  
                <input type="text" id="nome" name="nome" required>
            </div>
            
            <div class="input-field">
                <label for="email">E-mail</label>
                <input type="email" id="email" name="email" required>
            </div>

            <div class="input-field">
                <label for="login">Login</label>  
                <input type="text" id="login" name="login" required>
            </div>

            <div class="input-field">
                <label for="senha">Senha</label>  
                <input type="password" id="senha" name="senha" required>
            </div>
            <label>Cargo</label>
            <div class="input-field col s12">
                <select name="tipo" required>
                <option value="" disabled selected>Escolher</option>
                <option value="adm">Administrador</option>
                <option value="user">Funcionário</option>
                </select>
            </div>
            <label>Hablitado</label>
            <div class="input-field col s12">
                <select name="licensed">
                <option value="" disabled selected>Escolher</option>
                <option value="1">Sim</option>
                <option value="0">Não</option>
                </select>
            </div>
            <input type="submit" value="Enviar" class="btn">
        </form>
       
    </div>
    <script>
       $(document).ready(function(){
            $('select').formSelect();
            $("select[required]").css();
        });
    </script>
</body>
</html>