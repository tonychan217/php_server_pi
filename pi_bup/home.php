<html>
<head>
    <link rel="stylesheet" type="text/css" href="home_style.css" media="screen"/>

	<title> MY Portal - APAS GT </title>
	
</head>
<body>
    
    <?php 
   
    include("connection.php");
    include("nav_bar.php");
   
    ?>

<div class="vertical-menu" style="float: left">
  <a href="home.php" class="active">Dashboard</a>
  <a href="logger.php">Data</a>
  <a href="analysis.php">Analysis</a>
  <a href="#">Overview</a>
  <a href="#">
  <form method="post" action="export.php" align="center" onsubmit="return confirm('Export data?');">  
  <input type="submit" name="export" value="Export" class="btn_bar" />
  </form></a>
  <form action="delete.php" id="my-form" method="post" onsubmit="return confirm('All data records will be deleted. Please confirm.');"> 
  <input hidden type="checkbox" name="check_list[]" checked="checked">
  <a href="#"><button type="submit" name="delete" form="my-form" class="btn_bar">Clean</button></a>
</div>

<table cellspacing="5" cellpadding="5" >
    
    <tr>
        <th>Username</th> 
        <th>Latest</th> 
        <th>Device Info</th> 
        <th>WiFi IP</th>
        
    </tr>
    
    
 <?php 
 
    ob_start();
    include('logger.php');
    include('index.php');
    include('login.php');
    ob_end_clean();  
    
    $device = "NodeMCU 2.0";
    $ip = "192.168.0.1";
    
    if($row_reading_time == null){
        $row_reading_time = "No data found";
        $device = "No data found";
        $ip = "No data found";
    }
    
     echo' <tr> 
     
     <td>' . $user . '</td> 
     <td>' . $row_reading_time . '</td> 
     <td>' . $device . '</td>
     <td>' . $ip . '</td>

   </tr>' 
   
   ?>
   
   
<table cellspacing="5" cellpadding="5">

      <tr>
        <tm><button hidden type="submit" form="my-form" class="btn btn-success"></button></tm>
        <th>Date $ Time</th> 
        <th>Signal Name</th> 
        <th>.dbc</th> 
        <th>PGN</th> 
        <th>CAN ID</th>
        <th>Messages</th>       
      </tr>
      
      
 <tr> 

 <td><?php  include('time1.php');  ?></td>
 <td><?php  include('time2.php');  ?></td>

 
 </tr>;

 <tr><td colspan="5"><img class="img" src="iot.png" style="float: bottom"></td></tr>';
              



</table>
    
    

</body>
</html>
