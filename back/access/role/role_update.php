<?php
include "../../funtion/conn.php";

if (isset($_POST['rname'])) {   
    $id=$_POST['pid'];
   
   
    $name = $_POST['rname'];
    

  
    $query = "UPDATE  `access role` set name='$name' where id=$id ";
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