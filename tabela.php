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

    if(!empty($_GET['search'])){
        $data= $_GET ['search'];
        
        $sql= "SELECT * FROM cadastro WHERE id LIKE '%$data%' or email LIKE '%$data%' or telefone LIKE '%$data%' ORDER BY id DESC";
    }
    else{
        $sql = "SELECT * FROM cadastro ORDER BY id DESC";    
    }

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
    <style>
        .Box-pesquisa{
            display: flex;
            justify-content: center;
            gap: 0.2em;
        }
    </style>
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
            <a href="../WEB/sistema.php" class="btn btn-danger me-5">Voltar</a>
        </div>
    </nav>
    <br>
    <?php
    echo "<h1> Bem-vindo <u>$logado</u></h1>";
    ?>
    <div class="Box-pesquisa">
        <input type="search" class="form-control w-25" placeholder="Pesquisar" id="pesquisar">
        
        <button onclick="searchData()" class="btn btn-primary">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
            </svg>
        </button>
    </div>
    <div class="m-5">
    <table class="table table-bg">
  <thead>
    <tr>
       <th scope="col">Id</th> 
      <th scope="col">Email</th>
      <th scope="col">Senha</th>
      <th scope="col">Telefone</th>
      <th scope="col">Github</th>
    </tr>
  </thead>
  <tbody>
    <?php
        while($user_data = mysqli_fetch_assoc($resultado))
        {
            echo "<tr></tr>";
            echo "<td>".$user_data['id']."</td>";
            echo "<td>".$user_data['email']."</td>";
            echo "<td>".$user_data['senha']."</td>";
            echo "<td>".$user_data['telefone']."</td>";
            echo "<td>".$user_data['github']."</td>";
            echo"<td>
                <a class= 'btn btn-primary' href='att_cadastro.php? id=$user_data[id]'>
                    <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-pencil' viewBox='0 0 16 16'>
                        <path d='M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z'/>
                    </svg>
                </a>
                <a class= 'btn btn-danger' href='delet_user.php? id=$user_data[id]'>
                    <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-x-circle-fill' viewBox='0 0 16 16'>
                        <path d='M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM5.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293 5.354 4.646z'/>
                    </svg>
                </a>

            </td>";
            echo "<tr>";

        }
    ?>
  </tbody>
</table>
    </div>
</body>
<script>
    var search = document.getElementById('pesquisar');

    search.addEventListener("keydown",function(event){
        if (event.key === "Enter"){
            searchData();
        }
    });


    function searchData(){
        window.location='tabela.php?search='+ search.value;
    }
</script>
</html>