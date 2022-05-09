<?php
include_once '../autenticar.php';  
?>

<?php

    $cod = $_GET["cod"];

    $con = mysqli_connect("localhost:3306","root","","crud");

    $sql = "delete from veiculo where cod = ".$cod;

    if(mysqli_query($con,$sql)){
        $msg = "Veiculo excluído com sucesso!";
    }else{
        $msg = "Erro ao excluir veiculo!";
    }

    mysqli_close($con);

?>

<script>    
    alert('<?php echo $msg; ?>');
    location.href="../painel.php";
</script>
