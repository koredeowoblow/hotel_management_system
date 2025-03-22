<?php
include "../funtion/conn.php";

if (isset($_POST['name'])) {   
    
    $icon = $_POST['icon'];
    $link = $_POST['link'];
    
    $name = $_POST['name'];
    

  
    $query = "INSERT INTO `access modules` (parent_name,link,icon) values  ('$name','$link','$icon')";
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