<?php
require "../funtion/conn.php";
if (isset($_FILES['images'])) {
    $imageSend = $_FILES['images'];
    $title = $_POST['title'];
    $filename = $_FILES['images']['name'];
    $fileTmpname = $_FILES['images']['tmp_name'];
    $fileExt = explode('.', $filename);
    $fileActualExt = strtolower(end($fileExt));
    $allowed = array('jpg', 'jpeg', 'png');
    if (in_array($fileActualExt, $allowed)) {
        $filenamenew = uniqid('', true) . "." . $fileActualExt;
        if ($title = 'gallery') {
            $locations = "../../front/img/gallery/" ;
        }
        if ($title = 'room 1'  ) {
            $locations = "../../front/img/room/" ;

        }
        if ($title = 'room 3'  ) {
            $locations = "../../front/img/room/" ;

        }
        $upload_images = $locations.$filenamenew;
        move_uploaded_file($fileTmpname, $upload_images);
        $sql = "INSERT INTO img_gallery (image_name,img_title) values ('$upload_images','$title')";
        $result = mysqli_query($conn, $sql);

        if ($result == true) {
            $output = 'success';
        } else {
            $output = 'fail';
        }

    } else {
        $output = 'fail';
    }


    echo json_encode($output);

}
?>