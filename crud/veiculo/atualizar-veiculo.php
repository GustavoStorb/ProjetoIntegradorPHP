<?php
include_once '../autenticar.php';  
?>
<?php 
$cod = base64_decode($_POST['cod']);
$modelo = $_POST["modelo"];
$ano = $_POST["ano"];
$consumo = $_POST["consumo"];

$con = mysqli_connect("localhost:3306","root","","crud");
$sql = "update veiculo set 
modelo = '".$modelo."', ano = '".$ano."', consumo = '".$consumo."' 
where cod = ".$cod;

if(mysqli_query($con,$sql)){
    $msg = "Veiculo atualizado com sucesso!";
}else{
    $msg = "Erro ao atualizar veiculo!";
}

mysqli_close($con);
?>

<script>
    alert('<?php echo $msg; ?>');
    location.href="../painel.php?status=<?php echo $msg;?>";
</script>