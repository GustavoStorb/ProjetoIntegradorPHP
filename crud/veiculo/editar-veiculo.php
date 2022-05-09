<?php
include_once '../autenticar.php';  
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel Administrativo</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
</head>
<body>

    <?php
        $cod = $_GET['cod'];

        $con = mysqli_connect("localhost:3306", "root", "", "crud");

        $sql = "select * from veiculo where cod =".$cod;

        $result = mysqli_query($con,$sql);

        $row = mysqli_fetch_array($result);

        $modelo = $row['modelo'];
        $ano = $row['ano'];
        $consumo = $row['consumo'];

        mysqli_close($con);

    ?>
    
    <div class="container">
        <h3>Alteracao de Veiculo</h3>

        <form action="atualizar-veiculo.php" method="post" autocomplete="off">

            <div class="input-field">
                <select name="modelo" required>
                    <option value="" disabled>Modelo</option>
                    <option value="strada" <?php if($modelo == 'strada'){?> selected <?php } ?>>Strada</option>
                    <option value="fiorino" <?php if($modelo == 'fiorino'){?> selected <?php } ?>>Fiorino</option>
                    <option value="uno" <?php if($modelo == 'uno'){?> selected <?php } ?>>Uno</option>
                    <option value="palio" <?php if($modelo == 'palio'){?> selected <?php } ?>>Pálio</option>
                    <option value="logan" <?php if($modelo == 'logan'){?> selected <?php } ?>>Logan</option>
                </select>
            </div>
            
            <div class="input-field">
                <label for="ano">Ano</label>
                <input type="text" id="ano" name="ano" required value="<?php echo $ano; ?>">
            </div>

            <div class="input-field">
                <label for="consumo">Consumo</label>
                <input type="text" id="consumo" name="consumo" value="<?php echo $consumo; ?>">
            </div>
            

            <input type='hidden' name='cod' id='cod' value="<?php echo base64_encode($cod); ?>">

            <input type="submit" value="Atualizar" class="btn">
        </form>
       
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    
    <script>
       $(document).ready(function(){
            $('select').formSelect();
            $("select[required]").css();
        });

    </script>
</body>
</html>