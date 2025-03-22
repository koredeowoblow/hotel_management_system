<?php
include "../funtion/conn.php";
$id = $_GET['id'];

$query="SELECT * FROM img_gallery WHERE id='$id' " ;

$result =mysqli_query($conn,$query);

$row = mysqli_fetch_assoc($result);
$pics =$row["image_name"];
$row["pics"] = $pics;
echo json_encode($row)

?>