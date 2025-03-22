<?php
include "../funtion/conn.php";
$id = $_GET['id'];

$query="SELECT * FROM booking WHERE id='$id' " ;
$sql = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($sql);    
if($row['room_id'] != ""){
$room = $row['room_id']; 
$sqls = "SELECT * FROM room where room_id='$room'";
$result = mysqli_query($conn, $sqls);
$rows = mysqli_fetch_assoc($result);
$row['room_name'] = $rows['room_name'];
}
echo json_encode($row); 
?>