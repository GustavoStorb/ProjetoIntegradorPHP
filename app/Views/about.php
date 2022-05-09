<?php
if(!defined('2022T2')){
    header("Location: /");
    die("");
}
?>
<div class="main-wrapper">
<?php include('./app/Layouts/header.php'); ?>
<title>Projeto Integrador - Sobre</title>
      <section class="hero">
        <div>
          <h1 class="title co2-white fadeIn">Sobre o projeto</h1>
          <hr class="fadeIn" />
          <p class="subtitle co2-white fadeIn">
            Tendo em vista a necessidade de medidas efetivas para redução do
            impacto ambiental, a nossa empresa necessita medir a "pegada de
            carbono" relativa à emissão de CO2 da sua frota de veículos
            utilizados por seus colaboradores. Para isso, foi desenvolvido um
            sistema para o cálculo dessa pegada de carbono através dos chamados
            dos nossos funcionários.
          </p>
        </div>
        <div>
          <img height="550px" width="900px" class="fadeIn" src="./public/about.png" />
        </div>
      </section>
    </div>
    <script>
      function myFunction() {
        var navBarEl = document.getElementById("myTopnav");
        navBarEl.classList.toggle("responsive");
      }
    </script>