<?php
include "../funtion/conn.php";
$id = $_GET['id'];

$query="SELECT * FROM room WHERE room_id='$id' " ;
$sql = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($sql);    
if($row['room_id'] != ""){
$room = $row['room_id']; 
$sqls = "SELECT * FROM room_number where room_id='$room'";
$result = mysqli_query($conn, $sqls);
$rows = mysqli_fetch_assoc($result);
$row['troom'] = $rows['total_room'];
}
echo json_encode($row); 
?>