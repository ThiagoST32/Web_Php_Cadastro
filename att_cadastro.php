
<?php
    if(!empty($_GET['id'])){
        include_once('connect.php');
        include_once('saveEdit.php');
        $id = $_GET['id'];

        $sqlSelect = "SELECT * FROM cadastro WHERE id = $id";
        
        $r = $conn->query($sqlSelect);
        
        if($r-> num_rows > 0){

            while($user_data = mysqli_fetch_assoc($r)){

                $email = $user_data ['email'];
                $senha = $user_data ['senha'];
                $telefone = $user_data['telefone'];
                $github = $user_data ['github'];
            }
       
        }
        else{
            header('Location: sistema.php');
        }
      

    }
      
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../WEB/att_cadastro.css">
    <script src="https://kit.fontawesome.com/6886554d63.js" crossorigin="anonymous"></script>

    <title>Edit Cadastro</title>
</head>
<body>
    <div class="container">
        <div class="base2">
            <form action="att_cadastro.php" method="POST">
                Id: <input type="text" name="id" id="id" autocomplete="off" value="<?php echo $id; ?>">
                
                <i class="fa-solid fa-envelope" style="color: #ffffff;"></i>        
                Email: <input type="text" name="email" id="email" autocomplete="off" value="<?php echo $email; ?>" required>

                <i class="fa-solid fa-lock" style="color: #ffffff;"></i>
                Senha: <input type="text" name="senha" id="senha" autocomplete="off" value="<?php echo $senha; ?>" required>

                <i class="fa-solid fa-phone" style="color: #ffffff;"></i>
                Telefone: <input type="text" name="telefone" id="telefone" autocomplete="off" value="<?php echo $telefone;?>" required>

                <i class="fa-brands fa-github" style="color: #ffffff;"></i>
                Github: <input type="text" name="github" id="github" autocomplete="off" value="<?php echo $github; ?>" required>

                <input type="hidden" name="id" id="id" value="<?php echo $id;?>" required>

                <input type="submit" value="atualizar" nome="atualizar" class="btn-att">    
                <a href="../WEB/tabela.php">Voltar</a>
            </form>    
        </div>
    </div>
</body>
</html>