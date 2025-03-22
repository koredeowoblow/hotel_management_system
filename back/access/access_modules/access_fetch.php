<?php
include "../../funtion/conn.php";


$id = $_POST['id'];
$tr = '';
$query = "SELECT * FROM `access modules`";
$run_result = mysqli_query($conn, $query);


while ($row = mysqli_fetch_assoc($run_result)) {
    $rid = $row['id'];
    $tr .= '<tr>';

    $tr .= '<td>' . $row['name'] . '</td>';
    if ($id != '') {
        $sql = "SELECT * FROM access where role_id ='$id' ";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_array($result)) {
                $datas = $row['crud'];
                $role=$row['role_id'];
                $ans = json_decode($datas);

                //print_r($ans);  
                $rs = count($ans);

                for ($row = 0; $row < $rs; $row++) {
                    $name = $ans[$row][0];
                    if ($name == $rid) {
                        $create = $ans[$row][1];
                        $check1 = '<td><input type="checkbox" name="box"  value="create"  style="font-size:20px;" onchange="dat(' . $name . ', ' . $create . ',1, ' . $role . ')" id="checkboxPrimary' . $name . '1"></td>';

                        if ($create == 1) {
                            $check1 = '<td><input type="checkbox"  value="create"  name="box" onchange="dat(' . $name . ', ' . $create . ',1, ' . $role . ')" checked id="checkboxPrimary' . $name . '1"> </td>';
                        }
                        $read = $ans[$row][2];
                        $check2 = '<td><input type="checkbox" name="box" value="read" onchange="dat(' . $name . ', ' . $read . ', 2, ' . $role . ')" id="checkboxPrimary' . $name . '2"></td>';
                        if ($read == 1) {
                            $check2 = '<td><input type="checkbox" value="read" name="box" onchange="dat(' . $name . ', ' . $read . ',2, ' . $role . ')" checked id="checkboxPrimary' . $name . '2"></td>';
                        }
                       
                        $update = $ans[$row][3];
                        $check3 = '<td><input type="checkbox" name="box"  value="update"  style="font-size:20px;" onchange="dat(' . $name . ', ' . $update . ',3, ' . $role . ')" id="checkboxPrimary' . $name . '3"></td>';
                        if ($update == 1) {
                            $check3 = '<td><input type="checkbox"  value="update"  name="box" onchange="dat(' . $name . ', ' . $update . ',3, ' . $role . ')" checked id="checkboxPrimary' . $name . '3"></td>';
                        }
                        $delete = $ans[$row][4];
                        $check4 = '<td><input type="checkbox" name="box" value="update"  style="font-size:20px;" onchange="dat(' . $name . ', ' . $delete . ',4, ' . $role . ')" id="checkboxPrimary' . $name . '4"></td>';

                        if ($delete == 1) {
                            $check4 = '<td><input type="checkbox"  value="delete"  name="box" onchange="dat(' . $name . ', ' . $delete . ',4, ' . $role . ')" checked id="checkboxPrimary' . $name . '4"></td>';
                        }
                    }
                }
            }
        }
    }
    $tr .= $check1;
    $tr .= $check2;
    $tr .= $check3;
    $tr .= $check4;

    $tr .= '</tr>';
}

echo $tr;
?>
