<?php
include "../funtion/conn.php";
session_start();
$fat = "4";
$output = array(); 
$query = "SELECT * FROM expenditure";

$result = mysqli_query($conn, $query);
$count_all_rows = mysqli_num_rows($result);

if (isset($_POST['search']['value'])) {
    $search_value = $_POST['search']['value'];
    $query .= " WHERE  name like '%" . $search_value . "%' ";
    $query .= " OR quantity like '%" . $search_value . "%' ";
    $query .= " OR amount_per_quantity  like '%" . $search_value . "%' ";
    $query .= " OR  date like '%" . $search_value . "%' ";
    $query .= " OR  total_amount like '%" . $search_value . "%' ";
}
$column_order = array('id', 'name', 'quantity', 'amount_per_quantity', 'date', 'total_amount',);
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
    $sub_data[] = $row["quantity"];
    $sub_data[] = '&#8358;' . number_format($row["amount_per_quantity"], 2);
    $sub_data[] = '&#8358;' . number_format($row["total_amount"], 2);
    $sub_data[] = $row["date"];
    $rid = $_SESSION['role_id'];
    $sql = "SELECT * FROM access where role_id ='$rid'  ";
    $result = mysqli_query($conn, $sql);
    if ($fat != '') {
        if (mysqli_num_rows($result) > 0) {
            while ($rows = mysqli_fetch_array($result)) {
                $datas = $rows['crud'];
                $ans = json_decode($datas);
                $delete = $ans[$fat][4];
                $update = $ans[$fat][3]; 

                if ($delete && $update == 1) {
                    $option = '<div style="float:right" ><a href="javascript:void()"  id="editbtn"  data-id="' . $row['id'] . '"   class="text-primary"> <i class="anticon anticon-edit "></i>Edit</a>&nbsp;&nbsp;|<a href="javascript:void()" data-id="' . $row['id'] . '" class="text-danger btnDelete"> <i class="anticon anticon-delete"></i>Delete</a></div>';
                }elseif($delete == 1) {
                    $option = '<div  style="float:right"  ><a href="javascript:void()" data-id="' . $row['id'] . '" class="text-danger btnDelete"> <i class="anticon anticon-delete"></i>Delete</a></div>';
                }elseif($update == 1) {
                    $option = '<div  style="float:right" ><a href="javascript:void()"  id="editbtn"  data-id="' . $row['id'] . '"   class="text-primary"> <i class="anticon anticon-edit "></i>Edit</a></div>';
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
