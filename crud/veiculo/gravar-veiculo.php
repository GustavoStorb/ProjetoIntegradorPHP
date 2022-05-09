<?php
include_once '../autenticar.php';  
?>

<?php 

$modelo = $_POST["modelo"];
$ano = $_POST["ano"];
$consumo = $_POST["consumo"];

$con = mysqli_connect("localhost:3306","root","","crud");

$sql = "insert into veiculo values(null,'".$modelo."','".$ano."','".$consumo."')";

//4- Executar a instrução
if(mysqli_query($con,$sql)){
    $msg = "Veiculo adicionado com sucesso!";
}else{
    $msg = "Erro ao adicionar veiculo!";
}

//5- Fechar a conexão
mysqli_close($con);
?>

<script>    
    alert('<?php echo $msg; ?>');
    location.href="../painel.php";
</script>