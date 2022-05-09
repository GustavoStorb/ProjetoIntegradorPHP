<?php
if(!defined('2022T2')){
    header("Location: /");
    die("");
}
?>

<div class="main-wrapper">
<?php include('./app/Layouts/header.php'); ?>
<title>Projeto Integrador - Contato</title>
      <section class="hero">
        <div class="login-wrapper fadeIn">
          <h2 class="co2-white" id="titulocontact">Nos contate</h2>
          <form class="name-form">
            <label for="Name" class="co2-white">Nome</label>
            <input
              type="text"
              id="Name"
              name="Name"
              class="name-input"
              required
            />
          </form>
          <form class="email-form">
            <label for="Email" class="co2-white">Email</label>
            <input
              type="text"
              id="Email"
              name="Email"
              class="name-input"
              required
            />
          </form>
          <form class="message-form">
            <label for="Message" class="co2-white">Mensagem</label>
            <div class="container">
              <div class="comment">
                <textarea
                  type="text"
                  id="Email"
                  name="Email"
                  class="textinput"
                  placeholder=""
                  required
                ></textarea>
              </div>
            </div>
          </form>
          <div>
            <br /><br /><br /><br />
            <form class="login-form" onsubmit="submitForm()">
              <button type="submit">ENVIAR</button>
            </form>
          </div>
        </div>
      </section>
    </div>
    <script>
      function myFunction() {
        var navBarEl = document.getElementById("myTopnav");
        navBarEl.classList.toggle("responsive");
      }
    </script>