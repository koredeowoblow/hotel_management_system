<?php
include "../funtion/conn.php";
if (isset($_POST['rname'])) {
    $adult = $_POST['adult'];
    $child = $_POST['child'];
    $t_room = $_POST['troom'];
    $price = $_POST['price'];
    $fullname = $_POST['rname'];
    $id= $_POST['pid'];
    $sql = "SELECT * FROM room_number where room_id='$id'";
    $result = mysqli_query($conn, $sql);
    $rows = mysqli_fetch_assoc($result);
    $booked = $rows['booked_room'];
    $ava = $t_room - $booked;
    $sql = "UPDATE room_number set available_room='$ava',total_room='$t_room' where room_id=$id  ";
    $dat = mysqli_query($conn, $sql);
    $query = "UPDATE  room set room_name='$fullname',child_occupancy='$child',adult_occupancy='$adult',price='$price' where room_id=$id ";
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