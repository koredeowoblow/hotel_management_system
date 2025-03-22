<?php
include "../funtion/conn.php";

if (isset($_POST['name'])) {   
    
   
    
    $name = $_POST['name'];
    

  
    $query = "INSERT INTO `access role` (name) values  ('$name')";
    $results = mysqli_query($conn, $query);
    if($results == true){
        
        $output='success';
    }
    else{
        $output='failed';
    }
    echo json_encode($output);
}

?>