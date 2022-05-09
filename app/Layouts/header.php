<?php
error_reporting(0);
if(!defined('2022T2')){
    header("Location: /");
    die("");
}
?>

<header>
    <div class="topnav" id="myTopnav">
        <a href="javascript:void(0);" class="icon" onclick="myFunction()">
        <i class="fa fa-bars"></i>
        </a>
        <nav>
        <h1 class="nav-title co2-white fadeIn">Projeto Integrador</h1>
        <div class="nav-items">
            <a href="/">Inicio</a>
            <a class="" href="about">Sobre</a>
            <a class="" href="contact">Contato</a>
            <?php if(!isset($_SESSION['perfil'])){ ?>
                <a class="active br-10" href="login">Acesso</a>
            <?php }else{ ?>
                <a class="active bg-red br-10" href="sair">Sair</a>
            <?php } ?>
        </div>
        </nav>
    </div>
</header>

<script>
      function myFunction() {
        var navBarEl = document.getElementById("myTopnav");
        navBarEl.classList.toggle("responsive");
      }
    </script>