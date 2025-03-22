<?php
include "conn.php";

if (isset($_POST['room'])) {
    $adult = $_POST['adult'];
    $child = $_POST['child'];
    $room_num = $_POST['room_num'];
    $room = $_POST['room'];
    $date2 = $_POST['date2'];
    $date1 = $_POST['date1'];
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $Phone = $_POST['Phone'];

    $sql = "SELECT * FROM room where room_name='$room'";
    $result = mysqli_query($conn, $sql);
    $rows = mysqli_fetch_assoc($result);
    $id = $rows['room_id'];
    $query = "INSERT INTO booking (name,email,room_id,date_in,date_out,adult,kid,Phone,room_number) values  ('$fullname','$email','$id','$date1','$date2','$adult','$child','$Phone','$room_num')";
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