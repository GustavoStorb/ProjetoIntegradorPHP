<?php
session_start();
ob_start();
define('2022T2', true);
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Projeto Integrador</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="public/font-awesome/css/font-awesome.min.css" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet" />
    <link rel="shortcut icon" type="image/x-icon" href="public/icon.png"/>
    <link rel="stylesheet" type="text/css" href="public/main.css">
    <script src="main.js"></script>
</head>

<body>
    <?php
    require './vendor/autoload.php';

    use Core\ConfigController as Home;

    $url = new Home();
    $url->carregar();
    ?>
</body>
</html>