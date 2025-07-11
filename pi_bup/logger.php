<!DOCTYPE html>
<html>
<head>
    
    <link rel="stylesheet" type="text/css" href="logger_style.css" media="screen"/>

	<title> MY Portal - APAS GT </title>

</head>

<body>


<?php 

    include("nav_bar.php");
    include("connection.php");
  
    ?>

<?php

if(isset($_GET['page']))
    {
        $page = $_GET['page'];
    }
    else
    {
        $page = 1;
    }

    $num_per_page = 15;
    $start_from = ($page-1)*15;


$sql = "SELECT id, msg_name, can_dbc, pgn, frame_id, msg_data, reading_time FROM can_logger ORDER BY id DESC LIMIT $start_from,$num_per_page"; /*select items to display from the can_logger table in the data base*/

echo '<div class="vertical-menu" style="float: left">
  <a href="home.php" >Dashboard</a>
  <a href="logger.php" class="active">Data</a>
  <a href="analysis.php">Analysis</a>
  <a href="#">Overview</a>
  <a href="#">
  <form method="post" action="export.php" align="center" onsubmit="return confirm(\'Export all?\');">  
  <input type="submit" name="export" value="Export" class="btn_bar" />
  </form></a>
  <form action="delete.php" id="my-form" method="post" onsubmit="return confirm(\'All data records will be deleted. Please confirm!\');"> 
  <input hidden type="checkbox" name="check_list[]" checked="checked">
  <a href="#"><button type="submit" name="delete" form="my-form" class="btn_bar">Clean</button></a>
</div>';


echo '<table cellspacing="5" cellpadding="5">

      <tr>
        <tm><button hidden type="submit" form="my-form" class="btn btn-success"></button></tm>
        <th>Date $ Time</th> 
        <th>Signal Name</th> 
        <th>.dbc</th> 
        <th>PGN</th> 
        <th>CAN ID</th>
        <th>Messages</th>       
      </tr>';
    
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

        echo '<tr> 
        
                <tm><input hidden type="checkbox" name="check_list[]" checked="checked"></tm>
                <td>' . $row_reading_time . '</td> 
                <td>' . $row_msg_name . '</td> 
                <td>' . $row_can_dbc . '</td> 
                <td>' . $row_pgn . '</td> 
                <td>' . $row_frame_id . '</td>
                <td>' . $row_msg_data . '</td> 
                </tr>';
              
              $pr_query = "select * from can_logger ";
              $pr_result = mysqli_query($conn,$pr_query);
              $total_record = mysqli_num_rows($pr_result);
              
              $total_page = ceil($total_record/$num_per_page);
            
    }
        
    
    $result->free();
    

}

$conn->close();

        
?>



</table>

</body>
</html>


<div class="php_page">
<?php 
    

if($page > 1)
{
    echo "<a href='logger.php?page=".($page-1)."' class='btn_page'><</a>";
}

$last_page =  $total_page - 3;

for($i = 1; $i< $total_page; $i++)
{
    if($i < 5 && $page > 5){
        
        echo "<a href='logger.php?page=".$i."' class='btn_page'> $i </a>";
   }
   
   if($i < 7 && $page < 6){
        
        echo "<a href='logger.php?page=".$i."' class='btn_page'> $i </a>";
   } 
}


if($page > 5 && $page < $last_page){
    
    $back_page = $page - 1;
    $next_page = $page + 1;
    $next_next_page = $page + 2;
    $block_last_page = $last_page - 2;
    
    echo "<a href='#' class='btn_page'> ... </a>";
    echo "<a href='logger.php?page=".($page-1)."' class='btn_page'> $back_page </a>"; 
    echo "<a href='logger.php?page=".($page-1)."' class='btn_active'> $page </a>";
    echo "<a href='logger.php?page=".$next_page."' class='btn_page'> $next_page </a>";
    
}

if($i > 8){
    
    if(!$i > $last_page || !$page < $last_page){
    
    echo "<a href='#' class='btn_page'> ... </a>";
}

for($i = 1; $i< $total_page; $i++)
{
    if($i > $last_page){
        
        echo "<a href='logger.php?page=".$i."' class='btn_page'> $i </a>";
        
    } 
}
}

if($i > $page)
{
    echo "<a href='logger.php?page=".($page+1)."' class='btn_page'>></a>";
    
}


?>

	</body>
</html>


