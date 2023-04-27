<?php
    session_start();    
    include_once('connect.php');
    include_once('delet_user.php');

    if((!isset($_SESSION['email']) === true) and (!isset($_SESSION['senha']) === true )){
        unset($_SESSION['email']);
        unset($_SESSION['senha']);
        header('Location: login.php');
    }

    $logado = $_SESSION['email'];

    $sql = "SELECT * FROM cadastro ORDER BY id DESC";
    $resultado = $conn->query($sql);
 
    // Mostra o resultado da tabela na tela
    // print_r($resultado);

?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>SISTEMA LOGIN</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">SISTEMA</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" aria-controls="navbar" aria-expanded="false">
                <span class="navbar-toggler-icon"></span>
            </button>
            
        </div>
        <div class="d-flex">
            <a href="../WEB/sair.php" class="btn btn-danger me-5">Sair</a>
        </div>
        <div class="d-flex">
            <a href="../WEB/tabela.php" class="btn btn-danger me-5">Tabela</a>
        </div>
    </nav>
    <br>
    <?php
    echo "<h1> Bem-vindo <u>$logado</u></h1>";
    ?>
    

</body>
</html>