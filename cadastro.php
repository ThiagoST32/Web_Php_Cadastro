<?php
    include_once('connect.php');

    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $telefone = $_POST['telefone'];
    $github = $_POST['github'];



    $stmt = $conn->prepare("insert into Cadastro(email,senha,telefone,github) values(?,?,?,?)");
    $stmt->bind_param ("ssss",$email,$senha,$telefone,$github);
    $stmt->execute();
    echo "Registro Concluido!!";
    $stmt->close();
    $conn->close();

        header('Location: login.html');
?>
