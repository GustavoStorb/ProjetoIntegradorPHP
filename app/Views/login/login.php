<?php

if (!defined('2022T2')) {
    header("Location: /");
    die();
}

if (isset($this->dados['form'])) {
    $valorForm = $this->dados['form'];
}
?>
<link rel="stylesheet" type="text/css" href="../public/main.css">
<?php include('./app/Layouts/header.php'); ?>
<div class="main-wrapper">
<title>Projeto Integrador - Acesso</title>

    <section class="login-page">
        <div class="login-wrapper fadeIn">
            <?php
                
                if (isset($_SESSION['msg'])){
                    echo $_SESSION['msg'];
                    unset($_SESSION['msg']);
                }
            ?>
            <h2 class="co2-white">Faça o login em sua conta:</h2>
            <form method="POST" class="login-form" action="">
                <div class="form__group field">
                    <input
                    id="usuario"
                    type="input" 
                    class="form__field" 
                    placeholder="Username"
                    name="usuario" 
                    autocomplete="off" 
                    value="<?php if (isset($valorForm['usuario'])) {echo $valorForm['usuario'];} ?>" id="username" 
                    required />
              <label for="usuario" class="form__label">Usuário</label>
            </div>
            <div class="form__group field">
              <input
              id="senha"
                type="password"
                class="form__field"
                placeholder="Password"
                name="senha"
                autocomplete="off"
                required
              />
              <label for="senha" class="form__label">Senha</label>
            </div>
            <button name="SendLogin" type="submit" value="Acessar">ENVIAR</button>
          </form>
        </div>
    </section>
</div>
<script>
function myFunction() {
    var navBarEl = document.getElementById("myTopnav");
    navBarEl.classList.toggle("responsive");
}
</script>