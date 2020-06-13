<?php 
    $server = "localhost";
    $username = "root";
    $password = "";
    $db = "database";

    $conn = mysqli_connect($server,$username,$password,$db);

    if(!$conn){
        
        die("Connection Error:".mysqli_connect_error());
        
    }

?>