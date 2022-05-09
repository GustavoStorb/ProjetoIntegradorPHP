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
            <h1>Perfil do usuário<h1>
            <h5>ID: <?php echo $_SESSION['usuario_id'] ?></h5>
            <h5>Nome: <?php echo $_SESSION['usuario_nome'] ?></h5>
            <h5>E-mail: <?php echo $_SESSION['usuario_email'] ?></h5>
            <h5>Cargo: <?php echo $_SESSION['perfil'] === 'adm' ? 'Administrador' : 'Funcionário' ?></h5>
            <h5>Habilitado: <?php echo $_SESSION['licensed'] === 1 ? 'Sim' : 'Não' ?></h5>
            </div>
            <div>
                <h1 class="text-center">AÇÕES</h1>
                <div class="actions-buttons-table">
                    <button class="mr-16 action">Cadastrar Chamada</button>
                    <button class="action">Consultar Chamada</button>
                </div>
                <div class="actions-buttons-table">
                    <button class="action">Cadastrar Veiculo</button>
                    <button class="action">Consultar Veiculo</button>
                </div>
                <div class="actions-buttons-table">
                    <button class="action">Cadastrar Usuario</button>
                    <button class="action">Consultar Usuario</button>
                </div>
            </div>
    </section>
 </div>