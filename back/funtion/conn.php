<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "hotel_db";

    $conn = new mysqli($servername , $username ,$password, $dbname);
    if ($conn){
   
    }else {
    die(mysqli_error($conn));
    }

?>


