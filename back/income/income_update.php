<?php
include "../funtion/conn.php";

if (isset($_POST['names'])) {   
    $id=$_POST['pid'];
   
    $total_amount = $_POST['total_amounts'];
   
    $name = $_POST['names'];
    

  
    $query = "UPDATE  income set income_name='$name',price='$total_amount' where id=$id ";
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