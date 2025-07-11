<?php
$servername = "localhost";
$username = "tony";
$password = "4801";
$dbname = "rasp_db";

/*$conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);*/

$api_key_value = "ae052af8-4845-4c1c-9aa3-d98687c4ed6b";

$api_key= $msg_name = $can_dbc = $pgn = $frame_id = $msg_data = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $api_key = test_input($_POST["api_key"]);
    if($api_key == $api_key_value) {
        $msg_name = test_input($_POST["msg_name"]);
        $can_dbc = test_input($_POST["can_dbc"]);
        $pgn = test_input($_POST["pgn"]);
        $frame_id = test_input($_POST["frame_id"]);
        $msg_data = test_input($_POST["msg_data"]);
        
        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        } 
        
        $sql = "INSERT INTO can_logger (msg_name, can_dbc, pgn, frame_id, msg_data)
        VALUES ('" . $msg_name . "', '" . $can_dbc . "', '" . $pgn . "', '" . $frame_id . "', '" . $msg_data . "')";
        
        if ($conn->query($sql) === TRUE) {
            echo "New record created successfully";
        } 
        else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    
        $conn->close();
    }
    else {
       echo "Wrong API Key provided.";
    }

}
else {
    echo "No data posted with HTTP POST.";
}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
