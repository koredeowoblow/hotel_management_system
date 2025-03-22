<?php
include "../funtion/conn.php";
session_start();

$fat = "1";
$output = array();
$query = "SELECT * FROM booking";

$result = mysqli_query($conn, $query);
$count_all_rows = mysqli_num_rows($result);

if (isset($_POST['search']['value'])) {
    $search_value = $_POST['search']['value'];
    $query .= " WHERE  name like '%" . $search_value . "%' ";
    $query .= " OR email like '%" . $search_value . "%' ";
    $query .= " OR room_id  like '%" . $search_value . "%' ";    

}
$column_order = array('id', 'name','email','date_in','date_out','room_id',);
if (isset($_POST['order'])) {
    $column = $_POST['order'][0]['column'];
    $order = $_POST['order'][0]['dir'];
    $query .= " ORDER BY " . $column_order[$_POST['order'][0]['column']] . ' ' . $order;
} else {
    $query .= " ORDER BY id desc ";
}
$data = array();

$run_result = mysqli_query($conn, $query);


while ($row = mysqli_fetch_assoc($run_result)) {
    $sub_data = array();
    $sub_data[] = $row["name"];
    $sub_data[] = $row["email"];
   if($row["room_id"] != ""){
    $id = $row["room_id"];
    $query = "SELECT * FROM room WHERE room_id='$id' ";
    $result = mysqli_query($conn, $query);

        while ($rows = mysqli_fetch_assoc($result)) {
           $room_name= $rows['room_name'];
        }
   }
   if(($row["adult"] != "") && ($row["kid"] != "")){
    $adult=$row["adult"] ;
   $kids= $row["kid"] ;
        $ist = $adult . " adults  " . $kids . " kids";
   }
    $sub_data[] = $room_name;
    $sub_data[] = $row["room_number"];    
    $sub_data[] = $ist;    
    $sub_data[] = $row["date_in"];
    $sub_data[] = $row["date_out"];
   
    $rid = $_SESSION['role_id'];   
    $sql = "SELECT * FROM access where role_id ='$rid'  ";
    $result = mysqli_query($conn, $sql);
    if ($fat != '') {
        if (mysqli_num_rows($result) > 0) {
            while ($rows = mysqli_fetch_array($result)) {
                $datas = $rows['crud'];
                $ans = json_decode($datas);
                $delete = $ans[$fat][4];
                $update = $ans[$fat][3];;

                if ($delete && $update == 1) {
                   $option='<div  style="float:right"  ><a href="javascript:void()"  id="editbtn"  data-id="' . $row['id'] . '"   class="text-primary"> <i class="far fa-edit "></i>Edit</a>&nbsp;&nbsp;|<a href="javascript:void()" data-id="' . $row['id'] . '" class="text-danger btnDelete"> <i class="fas fa-delete"></i>Delete</a></div>';
                }elseif ($delete==1) {
                    $option='<div  style="float:right"  ><a href="javascript:void()" data-id="' . $row['id'] . '" class="text-danger btnDelete"> <i class="anticon anticon-delete"></i>Delete</a></div>';
              
                }
                elseif ($update==1) {
                    $option='<div  style="float:right" ><a href="javascript:void()"  id="editbtn"  data-id="' . $row['id'] . '"   class="text-primary"> <i class="far fa-edit "></i>Edit</a></div>';
              
                }
            }
        }
    }
    $sub_data[] = $option;

    $data[] = $sub_data;
}

$output = array(
    // "draw" => intval($_POST["draw"]),
    "recordsTotal" => $count_all_rows,
    "recordsFiltered" => $count_all_rows,
    "data" => $data

);
echo json_encode($output);
