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
        <h3>Consulta de Usuarios</h3>


        <form action='consultar-usuario.php' method="GET">

            <input type="text" name='nome' placeholder="Digite para pesquisar" autocomplete="off">
            <input type="submit" value="Pesquisar" class="btn">

        </form>

        <?php
        if(isset($_GET['nome'])){
            $nome = $_GET['nome'];

            $con = mysqli_connect("localhost:3306","root","","crud");

            $sql = "select * from usuario where nome like '".$nome."%' order by nome";

            $result = mysqli_query($con, $sql);

            if(mysqli_num_rows($result)){
                ?>


                <table class="striped">
                    <tr>
                        <th>Nome</th>
                        <th>Email</th>
                        <th>Login</th>
                        <th>Tipo</th>
                        <th>Habilitado</th>
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
                $nome = $row[1];
                $email = $row[2];
                $login = $row[3];
                $tipo = $row[5];
                $licensed = $row[6];

                ?>

                <tr>
                    <td>
                        <?php echo $nome;?>
                    </td>
                    <td>
                        <?php echo $email;?>
                    </td>
                    <td>
                        <?php echo $login;?>
                    </td>
                    <td>
                        <?php 
                            if($tipo == 'adm'){
                                echo "Admin";
                            }elseif($tipo == 'user'){
                                echo "Funcionário";
                            }
                        ?>
                    </td>
                    <td>
                    <?php 
                            if($licensed == '1'){
                                echo "Sim";
                            }elseif($licensed == '0'){
                                echo "Não";
                            }
                        ?>
                    </td>
                    <td>
                        <a href="editar-usuario.php?cod=<?php echo $cod ?>" > <i style="font-size:18px " class="fa fa-pencil"></i></a>
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
                echo 'Não há usuarios cadastrados no banco de dados!';
            }

            mysqli_close($con);
        }



        ?>


    </div>

    <script>
        function confirmarExclusao(cod){
            if(confirm('Deseja excluir o usuario?')){
                location.href='excluir-usuario.php?cod='+cod;
            }

        }
    </script>

</body>
</html>