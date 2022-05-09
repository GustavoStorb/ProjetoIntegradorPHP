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
        <h3>Cadastro de Veiculo</h3>

        <form action="gravar-veiculo.php" method="post" autocomplete="off">

            <div class="input-field col s12">
                <select name="modelo" required>
                <option value="" disabled selected>Modelo</option>
                <option value="strada">Strada</option>
                <option value="fiorino">Fiorino</option>
                <option value="uno">Uno</option>
                <option value="palio">Pálio</option>
                <option value="logan">Logan</option>
                </select>
            </div>

            <div class="input-field">
                <label for="ano">Ano</label>  
                <input type="text" id="ano" name="ano" required>
            </div>

            <div class="input-field">
                <label for="consumo">Consumo</label>  
                <input type="text" id="consumo" name="consumo">
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