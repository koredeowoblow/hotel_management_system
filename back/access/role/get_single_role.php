<?php
include "../../funtion/conn.php";
$id = $_GET['id'];

$query="SELECT * FROM `access role` WHERE id='$id' " ;
$sql = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($sql);  

echo json_encode($row); 
?>