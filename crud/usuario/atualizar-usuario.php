<?php
include_once '../autenticar.php';  
?>
<?php 

$cod = base64_decode($_POST['cod']);
$nome = $_POST["nome"];
$email = $_POST["email"];
$login = $_POST["login"];
$tipo = $_POST["tipo"];
$licensed = $_POST["licensed"];

$con = mysqli_connect("localhost:3306","root","","crud");
if(isset($_POST['senha']) && strlen($_POST['senha']) >= 1){
    $senha = $_POST["senha"];
    $sql = "update usuario set nome = '".$nome."', email = '".$email."', login = '".$login."', perfil = '".$tipo."', senha = '".md5($senha)."', licensed = ".$licensed." where cod = ".$cod;
}else{
    $sql = "update usuario set nome = '".$nome."', email = '".$email."', login = '".$login."', perfil = '".$tipo."', licensed = ".$licensed." where cod = ".$cod;
}

if(mysqli_query($con,$sql)){
    $msg = "Usuario atualizado com sucesso!";
}else{
    $msg = "Erro ao atualizar usuario!";
}

mysqli_close($con);
?>
<script>
    alert('<?php echo $msg; ?>');
    location.href="../painel.php?status=<?php echo $msg;?>";
</script>