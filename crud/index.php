<?php
    session_start();
    if(isset($_SESSION['nome'])){
        header("location:painel.php");
    }
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel Administrativo</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    
    <style>
    	body{
            height: 100vh;
            background-color: #dddddd;            
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .login{
            width: 350px;
            background-color: #ffffff;
            padding: 30px;
            box-shadow: 5px 5px 20px #999999;
            border-radius: 5px;
        }
        h3{
            text-align: center;
        }
        input:not([type]):focus:not([readonly]), input[type=text]:not(.browser-default):focus:not([readonly]), input[type=password]:not(.browser-default):focus:not([readonly]), input[type=email]:not(.browser-default):focus:not([readonly]), input[type=url]:not(.browser-default):focus:not([readonly]), input[type=time]:not(.browser-default):focus:not([readonly]), input[type=date]:not(.browser-default):focus:not([readonly]), input[type=datetime]:not(.browser-default):focus:not([readonly]), input[type=datetime-local]:not(.browser-default):focus:not([readonly]), input[type=tel]:not(.browser-default):focus:not([readonly]), input[type=number]:not(.browser-default):focus:not([readonly]), input[type=search]:not(.browser-default):focus:not([readonly]), textarea.materialize-textarea:focus:not([readonly]) {
            border-bottom: 1px solid #2196F3;
            -webkit-box-shadow: 0 1px 0 0 #2196F3;
            box-shadow: 0 1px 0 0 #2196F3;
        }
    </style>

</head>
<body>
    <div class="login">
        <h3>Área Restrita</h3>

        <!-- Formulário de Login -->
        <form action="verificar-login.php" method='post'>
            <input type='text' name='login' autocomplete="off" placeholder="Digite o Login">
            <input type='password' name='senha' placeholder="Digite a Senha">
            <input type="submit" value="Entrar" class="blue btn">
		</form>    
		<p>
		<?php
		if(isset($_GET['msg'])){
			echo $_GET['msg'];
		}
		?>
		</p>
    </div>
</body>
</html>