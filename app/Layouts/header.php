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
        <h1 class="nav-title co2-white">Projeto Integrador</h1> <!-- // fadeIn class -->
        <div class="nav-items"> <!-- // with-animation class -->
            <a href="/">Inicio</a>
            <a class="" href="about">Sobre</a>
            <a class="" href="contact">Contato</a>
            <?php if(!isset($_SESSION['perfil'])){ ?>
                <a class="active br-10" href="login">Acesso</a>
            <?php }else{ ?>
                <button onClick='confirmaSair()' style="background-color: #272833; border: none; cursor: pointer;" ><a class="active bg-red br-10">Sair</a></button>
                <script>
                function confirmaSair(){
                    if (confirm("Você realmente gostaria de sair?")){
                        document.location = '/sair/index';
                    }
                }
            </script>
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