<?php
if(!defined('2022T2')){
    header("Location: /");
    die("");
}
?>

<div class="main-wrapper">
<?php include('./app/Layouts/header.php'); ?>

      <section class="hero">
        <div>
          <h1 class="title co2-white fadeIn">O que é pegada de carbono?</h1>
          <hr class="fadeIn" />
          <p class="subtitle co2-white fadeIn">
            A Pegada de Carbono é o cálculo da emissão total de gases de efeito
            estufa , incluindo o dióxido de carbono e o metano, associados às
            atividades humanas no Planeta. A conta inclui as emissões que têm
            origem na produção, no uso e no descarte de produtos ou serviços.
            <br />
            <br />
            Para evitar que o aumento da temperatura média global chegue a 2ºC
            até o final deste século, junto à emissão desenfreada de gases de
            efeito estufa, a pegada de carbono média anual por pessoa precisa
            ficar abaixo de 2 toneladas até 2050. Nos Estados Unidos, a média é
            de 16 toneladas por pessoa, uma das taxas mais altas no mundo, já o
            brasileiro deixa uma pegada de carbono de 2,6 toneladas.
          </p>
        </div>
        <div>
          <img class="fadeIn" src="./public/logo.png" />
        </div>
      </section>
    </div>
    <script>
      function myFunction() {
        var navBarEl = document.getElementById("myTopnav");
        navBarEl.classList.toggle("responsive");
      }
    </script>