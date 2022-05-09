<?php
include_once '../autenticar.php';  
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel Administrativo</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
</head>
<body>

    <?php
        $cod = $_GET['cod'];

        $con = mysqli_connect("localhost:3306", "root", "", "crud");

        $sql = "select * from usuario where cod =".$cod;

        $result = mysqli_query($con,$sql);

        $row = mysqli_fetch_array($result);

        $nome = $row['nome'];
        $email = $row['email'];
        $login = $row['login'];
        $tipo = $row['perfil'];
        $licensed = $row['licensed'];

        mysqli_close($con);

    ?>
    
    <div class="container">
        <h3>Alteracao de Usuario</h3>

        <form action="atualizar-usuario.php" method="post" autocomplete="off">

            <div class="input-field">
                <label for="nome">Nome</label>  
                <input type="text" id="nome" name="nome" required value="<?php echo $nome; ?>">
            </div>
            
            <div class="input-field">
                <label for="email">E-mail</label>
                <input type="email" id="email" name="email" required value="<?php echo $email; ?>">
            </div>

            <div class="input-field">
                <label for="login">Login</label>  
                <input type="text" id="login" name="login" value="<?php echo $login; ?>">
            </div>

            <div class="input-field">
                <label for="senha">Alterar senha</label>  
                <input type="password" id="senha" name="senha" value="">
            </div>
            <label>Cargo</label>
            <div class="input-field">
                <select name="tipo" required>
                    <option value="" disabled>Escolha</option>
                    <option value="adm" <?php if($tipo == 'adm'){?> selected <?php } ?>>Administrador</option>
                    <option value="user" <?php if($tipo == 'user'){?> selected <?php } ?>>Funcionário</option>
                </select>
            </div>
            <label>Habilitado</label>
            <div class="input-field">
                <select name="licensed" required>
                    <option value="" disabled>Escolha</option>
                    <option value="1" <?php if($licensed == '1'){?> selected <?php } ?>>Sim</option>
                    <option value="0" <?php if($licensed == '0'){?> selected <?php } ?>>Não</option>
                </select>
            </div>

            <input type='hidden' name='cod' id='cod' value="<?php echo base64_encode($cod); ?>">

            <input type="submit" value="Atualizar" class="btn">
        </form>
       
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    
    <script>
       $(document).ready(function(){
            $('select').formSelect();
            $("select[required]").css();
        });

    </script>
</body>
</html>