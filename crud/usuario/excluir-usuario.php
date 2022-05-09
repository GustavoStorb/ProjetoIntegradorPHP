<?php
include_once '../autenticar.php';  
?>

<?php

    $cod = $_GET["cod"];

    $con = mysqli_connect("localhost:3306","root","","crud");

    $sql = "delete from usuario where cod = ".$cod;

    if(mysqli_query($con,$sql)){
        $msg = "Usuario excluído com sucesso!";
    }else{
        $msg = "Erro ao excluir usuario!";
    }

    mysqli_close($con);

?>

<script>    
    alert('<?php echo $msg; ?>');
    location.href="../painel.php";
</script>
