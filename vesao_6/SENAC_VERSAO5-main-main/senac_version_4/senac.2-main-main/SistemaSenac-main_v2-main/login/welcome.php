<?php
// Inicialize a sessão
session_start();
 
// Verifique se o usuário está logado, se não, redirecione-o para uma página de login
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>
 
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Bem vindo</title>
    <link rel="stylesheet" href="./css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        body{ font: 10px sans-serif; }
        .wrapper{ width: 360px; padding: 20px;  margin-left: 30%;}
    </style>
</head>
<body>

<nav class="navbar navbar-expand-sm " id="bgnav">
    <!-- logo -->
    <a class="navbar-brand" href="#">
      <img src="img/logo-senac.png" alt="logo" style="width:65px;" class="logoo">
    </a>
    <!-- Links -->
    
  </nav>



    <h1 class="my-5 text-center">Oi, <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b>. Bem vindo ao Painel.</h1>
    <p class="ajuste">
        <a href="senac.php" class="btn btn-warning tex">Clique aqui para fazer sua Prova</a>
        <a href="reset-password.php" class="btn btn-warning">Redefina sua senha</a>
        <a href="logout.php" class="btn btn-danger ml-3">Sair da conta</a>
    </p>
</body>
</html>