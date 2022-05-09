<?php  include_once 'autenticar.php'; ?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel Administrativo</title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

</head>
<body>

<style>
    h3{
        text-align: center;
        font-weight: bold;
        font-size: 40px;
    }
    .menu{
        font-size: 30px;
    }
    h5{
        text-align: center;
    }
</style>
    
    <div class="container">
        <h3>Painel do Sistema</h3>
        <h5>Seja bem vindo(a): <?php echo $_SESSION['nome']?></h5>

        <?php           
            if(isset($_GET["status"])){
                ?>
                <script>console.log(<?php echo $_GET["status"]; ?>)</script>
                <?php
            }

            if($_SESSION["perfil"] == "adm"){
                include_once 'menu-adm.php';
            }elseif($_SESSION["perfil"] == "user"){
                include_once 'menu-user.php';
            }

        ?>
    </div>

</body>
</html>