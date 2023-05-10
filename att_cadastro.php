
<?php
    if(!empty($_GET['id'])){
        include_once('connect.php');
        $id = $_GET['id'];
        
        $sql = "SELECT * FROM cadastro WHERE id=$id";
        
        $result = mysqli_query($conn, $sql);
        
        //trnasforma o resulta em array e armazena na var linha
        $row = mysqli_fetch_assoc($result);
        
        // atribui na variavel nome o valor que vem da tabela
        $id = $row ['id'];
        $email = $row ['email'];
        $senha = $row ['senha'];
        $telefone = $row ['telefone'];
        $github = $row ['github'];

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
            <form action="saveEdit.php" method="POST">
                Id: <input type="text" name="id" id="id" autocomplete="off" value="<?php if(isset($id)){
                    echo $id;
                } ?>">
                
                <i class="fa-solid fa-envelope" style="color: #ffffff;"></i>        
                Email: <input type="text" name="email" id="email" value="<?php echo $email ?>" required>

                <i class="fa-solid fa-lock" style="color: #ffffff;"></i>
                Senha: <input type="text" name="senha" id="senha"  value="<?php echo $senha ?>" required>

                <i class="fa-solid fa-phone" style="color: #ffffff;"></i>
                Telefone: <input type="text" name="telefone" id="telefone" value="<?php echo $telefone?>" required>

                <i class="fa-brands fa-github" style="color: #ffffff;"></i>
                Github: <input type="text" name="github" id="github" value="<?php echo $github ?>" required>
                <br><br>
                
                <input type="hidden" name="id" value="<?php echo $id;?>">
                <input type="submit" value="atualizar" name="atualizar" id="atualizar" class="btn-att">    
                <a href="../WEB/tabela.php">Voltar</a>
            </form>    
        </div>
    </div>
</body>
</html>
