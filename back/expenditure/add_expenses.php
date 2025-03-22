<?php
include "../funtion/conn.php";

if (isset($_POST['name'])) {   
    $a_p_e = $_POST['a_p_e'];
    $total_amount = $_POST['total_amount'];
    $quantity = $_POST['quantity'];
    $date = date('Y-m-d H:i:s');    
    $name = $_POST['name'];
    

  
    $query = "INSERT INTO expenditure (name,quantity,amount_per_quantity,date,total_amount) values  ('$name','$quantity','$a_p_e','$date','$total_amount')";
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