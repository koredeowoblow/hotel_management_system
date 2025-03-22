<?php
include "../funtion/conn.php";
session_start();
$fat = "2";

$query = '';
$output = array();
$query = "SELECT * FROM room";

$result = mysqli_query($conn, $query);
$count_all_rows = mysqli_num_rows($result);

if (isset($_POST['search']['value'])) {
    $search_value = $_POST['search']['value'];
    $query .= " WHERE name like '%" . $search_value . "%' ";
    $query .= " OR id like '%" . $search_value . "%' ";
    // $query .= " OR cat_id like '%" . $search_value . "%' ";

}
$column_order = array('id', 'name', 'name', 'id');
if (isset($_POST['order'])) {
    $column = $_POST['order'][0]['column'];
    $order = $_POST['order'][0]['dir'];
    $query .= " ORDER BY " . $column_order[$_POST['order'][0]['column']] . ' ' . $order;
} else {
    $query .= " ORDER BY room_id desc ";
}
$data = array();

$run_result = mysqli_query($conn, $query);

while ($row = mysqli_fetch_assoc($run_result)) {
    $sub_data = array();
    
   
    $adult=$row["adult_occupancy"] ;
    $kids= $row["child_occupancy"] ;
    $sub_data[] = $row['room_name'];
    $id = $row["room_id"];
    $querys = "SELECT * FROM room_number WHERE room_id='$id' ";
    $result = mysqli_query($conn, $querys);
    while ($rows = mysqli_fetch_assoc($result)) {
        $room_name = $rows['available_room'];
        $total=$rows['total_room'];
        $sub_data[] = $total;
        $sub_data[] = $room_name;
    }   
    
    $sub_data[] = $adult . " adults  ";
    $sub_data[]=$kids . " child";
    $sub_data[] = '&#8358;'.number_format($row['price'],2);
  
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
                   $option='<div ><a href="javascript:void()"  id="editbtn"  data-id="' . $row['room_id'] . '"   class="text-primary"> <i class="anticon anticon-edit "></i>Edit</a>&nbsp;&nbsp;|<a href="javascript:void()" data-id="' . $row['room_id'] . '" class="text-danger btnDelete"> <i class="anticon anticon-delete"></i>Delete</a></div>';
                }elseif ($delete==1) {
                    $option='<div ><a href="javascript:void()" data-id="' . $row['room_id'] . '" class="text-danger btnDelete"> <i class="anticon anticon-delete"></i>Delete</a></div>';
              
                }
                elseif ($update==1) {
                    $option='<div ><a href="javascript:void()"  id="editbtn"  data-id="' . $row['room_id'] . '"   class="text-primary"> <i class="anticon anticon-edit "></i>Edit</a></div>';
              
                }
            }
        }
    }
    $sub_data[] = $option;
    $data[] = $sub_data;
}

$output = array(
    
    "recordsTotal" => $count_all_rows,
    "recordsFiltered" => $count_all_rows,
    "data" => $data,

);
echo json_encode($output);

?>