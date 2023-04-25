<?php
    include_once('connect.php');


    if(isset($_POST['atualizar'])){


        $id = $_POST ['id'];
        $email = $_POST ['email'];
        $senha = $_POST ['senha'];
        $telefone = $_POST ['telefone'];
        $github = $_POST ['github'];

        
        $sqlUpdate = "UPDATE cadastro SET email='$email', senha='$senha', telefone='$telefone', github='$github' WHERE id='$id'";

        $result = $conn ->query($sqlUpdate);
    }

    header("Location: sistema.php");
?>