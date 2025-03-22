<?php
include "../funtion/conn.php";

if (isset($_POST['rname'])) {
    $adult = $_POST['adult'];
    $child = $_POST['child'];
    $t_room = $_POST['troom'];
    $price = $_POST['price'];
    $fullname = $_POST['rname'];
    $query = "INSERT INTO room (room_name,adult_occupancy,child_occupancy,price) values  ('$fullname','$adult','$child','$price')";
    $results = mysqli_query($conn, $query);
    if ($results == true) {
        $sql = "SELECT * FROM room where room_name='$fullname'";
        $result = mysqli_query($conn, $sql);
        $rows = mysqli_fetch_assoc($result);
        $id = $rows['room_id'];
        $querys = "INSERT INTO room_number (room_id,total_room,available_room,booked_room) values  ('$id','$t_room','$t_room','0')";
        $resulted = mysqli_query($conn, $querys);
        if ($resulted == true) {
            $output = 'success';
        } else {
            $output = 'failed';
        }
    } else {
        $output = 'failed';
    }
    echo json_encode($output);
}

?>