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
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <style>
        td,th{
            text-align: center;
        }
    </style>
</head>
<body>
    
    <div class="container">
        <h3>Consulta de Veiculos</h3>


        <form action='consultar-veiculo.php' method="GET">

            <input type="text" name='cod' placeholder="Digite para pesquisar" autocomplete="off">
            <input type="submit" value="Pesquisar" class="btn">

        </form>

        <?php
        if(isset($_GET['cod'])){
            $cod = $_GET['cod'];

            $con = mysqli_connect("localhost:3306","root","","crud");

            $sql = "select * from veiculo where cod like '".$cod."%' order by cod";

            $result = mysqli_query($con, $sql);

            if(mysqli_num_rows($result)){
                ?>


                <table class="striped">
                    <tr>
                        <th>Modelo</th>
                        <th>Ano</th>
                        <th>Consumo</th>
                        <th>Editar</th>

                        <?php 
                        if($_SESSION['perfil'] == 'adm'){
                        ?>
                        <th>Excluir</th>
                    <?php } ?>

                    </tr>

                <?php
                while($row = mysqli_fetch_array($result)){
                $cod = $row[0];
                $modelo = $row[1];
                $ano = $row[2];
                $consumo = $row[3];
                ?>

                <tr>
                    <td>
                        <?php echo $modelo;?>
                    </td>
                    <td>
                        <?php echo $ano;?>
                    </td>
                    <td>
                        <?php echo $consumo;?>
                    </td>
                    <td>
                        <a href="editar-veiculo.php?cod=<?php echo $cod ?>" > <i style="font-size:18px " class="fa fa-pencil"></i></a>
                    </td>
                    <?php 
                        if($_SESSION['perfil'] == 'adm'){
                        ?>

                    <td>
                        <a href ="#" onclick="confirmarExclusao(<?php echo $cod;?>)" > <i class="material-icons red-text">delete_forever</i></a>
                    </td>

                <?php } ?>

                </tr>
                <?php }?>
                </table>

                <?php
            }else{
                echo 'Não há veiculos cadastrados no banco de dados!';
            }

            mysqli_close($con);
        }
        ?>
    </div>

    <script>
        function confirmarExclusao(cod){
            if(confirm('Deseja excluir o veiculo?')){
                location.href='excluir-veiculo.php?cod='+cod;
            }

        }
    </script>

</body>
</html>