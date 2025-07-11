<?php

include("connection.php");

    foreach($_POST['check_list'] as $dataID)
     {
         
        $sql = "DELETE from can_logger WHERE id"; //ALTER TABLE can_logger AUTO_INCREMENT = 1
        $query = mysqli_query($conn,$sql);
     }
     if($query)
        {
            header('Location:logger.php');
        }
        else
        {
              header('Location:error404.php');
        }
     

?>
