<?php
include "../funtion/conn.php";

if (isset($_POST['name'])) {   
    
    $total_amount = $_POST['total_amount'];
    
    $name = $_POST['name'];
    

  
    $query = "INSERT INTO income (income_name,income_amount) values  ('$name','$total_amount')";
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