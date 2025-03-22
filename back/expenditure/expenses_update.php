<?php
include "../funtion/conn.php";

if (isset($_POST['name'])) {   
    $id=$_POST['pid'];
    $a_p_e = $_POST['a_p_e'];
    $total_amount = $_POST['total_amount'];
    $quantity = $_POST['quantity'];    
    $name = $_POST['name'];
    

  
    $query = "UPDATE  expenditure set name='$name',quantity='$quantity',amount_per_quantity='$a_p_e',total_amount='$total_amount' where id=$id ";
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