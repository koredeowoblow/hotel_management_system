<?php
include "../../funtion/conn.php";

if (isset($_POST['name'])) {   
    $id=$_POST['pid'];
   
    $link = $_POST['link'];
   
    $name = $_POST['name'];
    $icon = $_POST['icon'];
    

  
    $query = "UPDATE  `access modules` set parent_name='$name',link='$link',icon='$icon' where id=$id ";
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