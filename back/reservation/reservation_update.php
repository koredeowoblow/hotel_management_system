<?php
include "../funtion/conn.php";

if (isset($_POST['room'])) {
    $id= $_POST['pid'];
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
    $ids = $rows['room_id'];
    $query = "UPDATE  booking set name='$fullname',email='$email',room_id='$ids',date_in='$date1',date_out='$date2',adult='$adult',kid='$child',Phone='$Phone',room_number='$room_num' where id=$id ";
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