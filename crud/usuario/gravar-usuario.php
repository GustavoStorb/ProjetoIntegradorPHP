<?php
include_once '../autenticar.php';  
?>

<?php 

//Gravação em Banco de dados
//1- Resgatar os dados

$nome = $_POST["nome"];
$email = $_POST["email"];
$login = $_POST["login"];
$senha = $_POST["senha"];
$tipo = $_POST["tipo"];
$licensed = $_POST["licensed"];

//2- Conectar o PHP ao Mysql
//endereço, usuario, senha, banco
$con = mysqli_connect("localhost:3306","root","","crud");

//3- Montar a instrução SQL de gravação
//INSERT INTO USUARIO values(null, 'Maria', 'maria@gmail.com', 'Maria', md5('123'), 'user');

$sql = "insert into usuario values(null,'".$nome."','".$email."','".$login."','".md5($senha)."','".$tipo."','".$licensed."')";

//4- Executar a instrução
if(mysqli_query($con,$sql)){
    $msg = "Usuario adicionado com sucesso!";
}else{
    $msg = "Erro ao adicionar usuario!";
}

//5- Fechar a conexão
mysqli_close($con);
?>

<script>    
    alert('<?php echo $msg; ?>');
    location.href="../painel.php";
</script>