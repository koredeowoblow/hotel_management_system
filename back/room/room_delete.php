<?php
include "../funtion/conn.php";
$id = $_POST['id'];

$sql = "DELETE FROM room  WHERE room_id='$id'";
$sqls = "DELETE FROM room_number  WHERE room_id='$id'";

$results = mysqli_query($conn, $sqls);


$result = $conn->query($sql);

if ($result == true) {
  $output = array("result" => 'success');
 
} else {
  $output = array("result" => 'fail');
  
}

echo json_encode($output);


?>