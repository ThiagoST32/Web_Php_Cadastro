<?php
           //Data Base connection
    $conn = new mysqli("localhost",
                        "root",
                        "Bnas123!@#",
                        "test");


                                
    if ($conn->connect_error){
        die("Connection Failed: ".$conn->connect_error);
    }else{
    }


?>




  