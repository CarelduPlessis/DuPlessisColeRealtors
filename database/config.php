<?php
   // Attempt to Connect to MySQL
$servername = "localhost";
$username = "root";
$password = "";

// Create connection
$dbc = new mysqli($servername, $username, $password);

// Check connection
if ($dbc->connect_error) {
    die("Connection failed: " . $dbc->connect_error);
}else{
    //Attempt to select the database
    $db_selected = mysqli_select_db($dbc, "dcrealtors69_db");
    if (!$db_selected){
      die ("Couldn't select database : ");
    }
}

?>
