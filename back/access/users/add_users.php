<?php
include "../../funtion/conn.php";

if (isset($_POST['fullname'])) {   
    
    $password = md5( $_POST['password']);
    $email = $_POST['email'];
    $role = $_POST['role'];
    
    $name = $_POST['fullname'];
    

  
    $query = "INSERT INTO `users` (fullname,email,password,role_id) values  ('$name','$email','$password','$role')";
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