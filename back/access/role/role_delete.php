<?php
include "../../funtion/conn.php";
$id = $_POST['id'];

$sql = "DELETE FROM `access role`  WHERE id='$id'";
$result = mysqli_query($conn, $sql);


$result = $conn->query($sql);

if ($result == true) {
  $output = array("result" => 'success');
 
} else {
  $output = array("result" => 'fail');
  
}

echo json_encode($output);


?>