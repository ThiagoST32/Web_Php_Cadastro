<?php
    include_once('connect.php');
    include_once('att_cadastro.php')
  //trnasforma o resulta em array e armazena na var linha
        $row = mysqli_fetch_assoc($result);
        //atribui na variavel nome o valor que vem da tabela
        $id = $row ['id'];
        $email = $row ['email'];
        $senha = $row ['senha'];
        $telefone = $row ['telefone'];
        $github = $row ['github'];

    if(isset($_POST['atualizar'])){
      
        if (!empty($_POST['id']) && !empty($_POST['email']) && !empty($_POST['senha']) && !empty($_POST['telefone']) && !empty($_POST['github'])) {
            
            $sqlUpdate = "UPDATE cadastro SET email='$email', senha='$senha', telefone='$telefone', github='$github' WHERE id='$id'";

            $result = $conn ->query($sqlUpdate);
        }
    }

    header("Location: sistema.php");
?>