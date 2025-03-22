<?php
require "../funtion/conn.php";

if (isset($_POST['bid'])) {
    $user_id = $_POST['bid'];

    $sql = "SELECT * FROM img_gallery WHERE id=$user_id";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $file = $row['image_name'];

            $imageSend = $_FILES['images'];
            $title = $_POST['title'];
            // $imageSend = $_FILES['image'];


            // $date = date('Y-m-d H:i:s');


            if (isset($_FILES['images']['name']) && ($_FILES['images']['name'] != "")) {

                $filename = $_FILES['images']['name'];
                $fileTmpname = $_FILES['images']['tmp_name'];

                $fileExt = explode('.', $filename);
                $fileActualExt = strtolower(end($fileExt));
                $allowed = array('jpg', 'jpeg', 'png');
                $filenamenew = uniqid('', true) . "." . $fileActualExt;
                
                if ($title = 'gallery') {
                    $locations = "../../front/img/gallery/";
                }
                if ($title = 'room 1') {
                    $locations = "../../front/img/room/";
        
                }
                $upload_images = $locations . $filenamenew;
                move_uploaded_file($fileTmpname, $upload_images);
                unlink($file);
                $sqls = "UPDATE img_gallery set image_name=' $upload_images', img_title='$title'   WHERE id=$user_id ";

                $results = mysqli_query($conn, $sqls);
                if ($results == true) {
                    $output = 'success';
                } else {
                    $output = 'fail';
                }

            } else {
                $sqls = "UPDATE  img_gallery set img_title='$title'  WHERE id=$user_id ";
                $results = mysqli_query($conn, $sqls);
                if ($results == true) {
                    $output = 'success';
                } else {
                    $output = 'fail';
                }
            }

        }

    }
    echo json_encode($output);

}

?>