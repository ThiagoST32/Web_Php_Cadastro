<?php   
    if(!empty($_GET['id'])){
        include_once('connect.php');
        $id = $_GET['id'];
        
        $sql = "SELECT * FROM cadastro WHERE id=$id";
        
        $result = mysqli_query($conn, $sql);
        
        if($result ->num_rows >0){
            $sqlDelete = "DELETE FROM cadastro WHERE id=$id";
            $resultDelete =$conn->query($sqlDelete);
        }
    }
    // header('Location: sitema');
?>