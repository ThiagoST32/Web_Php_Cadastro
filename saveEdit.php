<?php
    include_once('connect.php');

    // if(isset($_POST['atualizar']))
    // {
    //     $email = $_POST ['email'];
    //     $senha = $_POST ['senha'];
    //     $telefone = $_POST ['telefone'];         
    //     $github = $_POST ['github'];
        
    //     $sqlInsert ="UPDATE cadastro SET email='$email', senha='$senha', telefone='$telefone', github='$github' WHERE id='$id'";
    //     $result = $conn->query($sqlInsert);
    //     print_r($result);
    //     echo $email;
    // }
    if(isset($_POST['atualizar'])){
        if (!empty($_POST['email']) && !empty($_POST['senha']) && !empty($_POST['telefone']) && !empty($_POST['github'])) {
            
            $id = $_POST ['id'];
            $email = $_POST ['email'];
            $senha = $_POST ['senha'];
            $telefone = $_POST ['telefone'];
            $github = $_POST ['github'];
        }

        $sqlUpdate = "UPDATE cadastro SET email='$email', senha='$senha', telefone='$telefone', github='$github' WHERE id='$id'";
        $result = $conn->query($sqlUpdate);
    }
    

    header("Location: tabela.php");
?>