<?php
if(!defined('2022T2')){
    header("Location: /");
    die("");
}
?>

<div class="main-wrapper">
<?php include('./app/Layouts/header.php'); ?>
<title>Projeto Integrador - Painel</title>
<section class="dashboard-card mt-80">
   <div>
      <h1>
      Bem vindo ao sistema: <?php echo $_SESSION['usuario_nome'] ?>
      <h1>
      <h5>ID: <?php echo $_SESSION['usuario_id'] ?></h5>
      <h5>E-mail: <?php echo $_SESSION['usuario_email'] ?></h5>
      <h5>Cargo: <?php echo $_SESSION['perfil'] === 'adm' ? 'Administrador' : 'Funcionário' ?></h5>
      <h5>Habilitado: <?php echo $_SESSION['licensed'] === 1 ? 'Sim' : 'Não' ?></h5>
   </div>
   <div class="actions-dashboard-buttons">
      <h1 class="text-center">AÇÕES</h1>
      <div class="actions-buttons-table">
         <button class="mr-16 action">Cadastrar Chamado</button>
         <button class="action">Consultar Chamado</button>
      </div>
      <div class="actions-buttons-table">
         <button class="action">Cadastrar Veiculo</button>
         <button class="action">Consultar Veiculo</button>
      </div>
      <div class="actions-buttons-table">
         <a href="/usuario/add">
         <button class="action">Cadastrar Usuário</button>
         </a>
         <a href="/usuario/find">
         <button class="action">Consultar Usuário</button>
         </a>
      </div>
   </div>
</section>
</div>