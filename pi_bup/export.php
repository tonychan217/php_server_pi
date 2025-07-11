<?php  

 include("connection.php");

      //export.php  
 if(isset($_POST["export"]))  
 {  

      header('Content-Type: text/csv; charset=utf-8');  
      header('Content-Disposition: attachment; filename=export_data.csv');  
      $output = fopen("php://output", "w");  
      fputcsv($output, array('id','reading_time','msg_name', 'can_dbc', 'pgn', 'frame_id', 'msg_data'));  
      $query = "SELECT * from can_logger ORDER BY id DESC";  
      $result = mysqli_query($conn, $query);  
      while($row = mysqli_fetch_assoc($result))  
      {  
           fputcsv($output, $row);  
      }  
      fclose($output);  
 }  
 ?>  
