<?php 

    include("connection.php");
  
    ?>

<?php 

$sql = "SELECT id, msg_name, can_dbc, pgn, frame_id, msg_data, reading_time FROM can_logger ORDER BY id DESC LIMIT 1"; /*select items to display from the can_logger table in the data base*/

if ($result = $conn->query($sql)) {

    while ($row = $result->fetch_assoc()) {
   
        $row_id = $row["id"];
        $row_reading_time = $row["reading_time"];
        $row_msg_name = $row["msg_name"];
        $row_can_dbc = $row["can_dbc"];
        $row_pgn = $row["pgn"];
        $row_frame_id = $row["frame_id"]; 
        $row_msg_data = $row["msg_data"];
        
        
        // Uncomment to set timezone to - 1 hour (you can change 1 to any number)
        // $row_reading_time = date("Y-m-d H:i:s", strtotime("$row_reading_time - 1 hours"));
      
        // Uncomment to set timezone to + 4 hours (you can change 4 to any number)
        $row_reading_time = date("Y-m-d H:i:s", strtotime("$row_reading_time + 8 hours"));

echo '
  
        <div class="container" id="time2">
        ' . $row_reading_time . '
        </div>
              <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
              <script type="text/javascript" src="data_upd.js"></script>';
        
        
    }
        
    
    $result->free();
    

}

$conn->close();

        
?>
