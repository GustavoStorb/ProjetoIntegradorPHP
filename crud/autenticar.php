<?php
session_start();

if(!isset($_SESSION['nome'])){
     session_destroy();
     $msg = 'Acesso Negado!';
     header("location:index.php?msg=".$msg);
 }

 if($_SESSION['tempo'] + 10*60 < time()){
 	session_destroy();
 	$msg = 'Sessao Expirada!';
 	header("location:index.php?msg=".$msg);
 }else{
 	$_SESSION['tempo'] = time();
 }



?>