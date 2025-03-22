<?php
include "../funtion/conn.php";

if (isset($_POST['room'])) {
    $adult = $_POST['adult'];
    $child = $_POST['child'];
    $room_num = $_POST['room_num'];
    $room = $_POST['room'];
    $date2 = $_POST['date2'];
    $date1 = $_POST['date1'];

    $sql = "SELECT * FROM room where room_name='$room'";
    $result = mysqli_query($conn, $sql);
    $rows = mysqli_fetch_assoc($result);
    $id = $rows['room_id'];
    $run = "SELECT * FROM room_number where room_id='$id'";
    $results = mysqli_query($conn,$run);
    $row=mysqli_fetch_assoc($results);    
    if ( $room_num < $row['available_room']) {
        if ($rows['adult_occupancy'] < $adult) {
            $old = 'failed';
        } else {
            $old = 'sucess';            
        }
        if ($rows['child_occupancy'] < $child) {
            $pikin = 'sack';
            $output = $pikin;
        } else {
            $pikin = 'sucess';
        }
        if ($pikin == $old) {
            $output = 'success';
        } else {
            $output = 'fail';
        }
    } else {
        $output = 'failed';
    }
    echo json_encode($output);
}

?>