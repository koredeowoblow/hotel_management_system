<?php
include "../funtion/conn.php";

$fat = "1";
include "../funtion/header.php";
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>reservations</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">reservations</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">


                        <?php

                        $id = $_SESSION['role_id'];

                        $sql = "SELECT * FROM access where role_id ='$id'  ";
                        $result = mysqli_query($conn, $sql);
                        if ($fat != '') {
                            if (mysqli_num_rows($result) > 0) {
                                while ($row = mysqli_fetch_array($result)) {
                                    $datas = $row['crud'];
                                    $ans = json_decode($datas);
                                    $create = $ans[$fat][1];

                                    if ($create == 1) {
                                        echo '<button class="btn  btn-block bg-gradient-warning float-right m-t-35" data-toggle="modal" data-target="#addnew">Add
                                   reservations</button>';
                                    }
                                }
                            }
                        }

                        ?>

                        <div id="example1_wrapper"></div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div id="msg"></div>
                            <table id="example1" class="table table-bordered table-striped">

                                <thead>
                                    <tr>
                                        <th>name</th>
                                        <th>email</th>
                                        <th>room</th>
                                        <th>room number</th>
                                        <th>guest</th>
                                        <th>date in</th>
                                        <th>date out</th>
                                        <?php

                                        $id = $_SESSION['role_id'];

                                        $sql = "SELECT * FROM access where role_id ='$id'  ";
                                        $result = mysqli_query($conn, $sql);
                                        if ($fat != '') {
                                            if (mysqli_num_rows($result) > 0) {
                                                while ($row = mysqli_fetch_array($result)) {
                                                    $datas = $row['crud'];
                                                    $ans = json_decode($datas);
                                                    $delete = $ans[$fat][4];
                                                    $update = $ans[$fat][3];;

                                                    if ($delete || $update == 1) {
                                                        echo ' <th style="text-align:right;">option:</th>';
                                                    }
                                                }
                                            }
                                        }

                                        ?>
                                        <!-- <th style="text-align:right;">option</th> -->


                                    </tr>
                                </thead>

                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- add modal start -->
<div class="modal fade" id="addnew">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="p1 modal-title">Add reservation</h5>

                <button type="button" class="close" data-dismiss="modal">
                    <i class="anticon anticon-close"></i>
                </button>
            </div>
            <div class="modal-body">
                <p class="p1 modal-title">Check Availability</p>
                <p class="p2" style="display:none;">Enter Credentials</p>
                <div id="msg1"></div>
                <form id="myform">

                    <div id="msg1"></div>
                    <div class="datepicker form-group row">
                        <div class="date-select  col-6">
                            <p>From:</p>
                            <input type="datetime-local" class="form-control" name="date1" value="dd / mm / yyyy">

                            <!-- <img src="img/calendar.png" alt=""> -->
                        </div>
                        <div class="date-select to col-6">
                            <p>To:</p>
                            <input type="datetime-local" class="form-control" name="date2" value="dd / mm / yyyy">
                            <!-- <img src="img/calendar.png" alt=""> -->
                        </div>
                    </div>
                    <div class="room-quantity row">
                        <div class="single-quantity col-6">
                            <p>Adults:</p>
                            <div class="pro-qty"><input type="text" class="form-control" name="adult"></div>
                        </div>
                        <div class="single-quantity col-6">
                            <p>Children:</p>
                            <div class="pro-qty"><input type="text" class="form-control" name="child"></div>
                        </div>
                        <div class="single-quantity last col-12">
                            <br>
                            <p>Rooms:</p>
                            <div class="pro-qty"><input type="text" class="form-control" name="room_num">
                            </div>
                        </div>
                    </div>
                    <div class="room-selector form-group">
                        <br>
                        <p>Room type:</p>
                        <select name="room" class="suit-select form-control">
                            <?php
                            $sql = "SELECT * FROM room";
                            echo "<option></option>";
                            if ($result = mysqli_query($conn, $sql)) {
                                if (mysqli_num_rows($result) > 0) {
                                    //print_r($result);
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        echo "<option value='" . $row['room_name'] . "'>" . $row['room_name'] . "</option>";
                                    }
                                }
                            }
                            ?>
                            <!-- <option value="Master suite"> Master suite</option>
                            <option value="Double Room">Double Room</option>
                            <option value="Single Room">Single Room</option>
                            <option value="Special Room">Special Room</option> -->
                        </select>
                    </div>
                    <div class="form-group " style="display:none; ">
                        <p style="font-size: 14px;color:#242424;margin-bottom: 2px;font-weight: 400;">Full
                            Name:</p>
                        <input type="text" name="fullname" class="form-control" style="border:none;border-bottom:1px solid  #888888;border-radius: 0;-webkit-tap-highlight-color: transparent;" id="">
                    </div>
                    <div class="form-group" style="display:none;">
                        <p style="font-size: 14px;color:#242424;margin-bottom: 2px;font-weight: 400;">email:
                        </p>
                        <input type="email" name="email" class="form-control" style="border:none;border-bottom:1px solid  #888888;border-radius: 0;-webkit-tap-highlight-color: transparent;" id="">
                    </div>
                    <div class="form-group" style="display:none;">
                        <p style="font-size: 14px;color:#242424;margin-bottom: 2px;font-weight: 400;">Phone
                            number:</p>
                        <input type="tel" name="Phone" class="form-control" style="border:none;border-bottom:1px solid  #888888;border-radius: 0;-webkit-tap-highlight-color: transparent;" id="">
                    </div>
                    <button type="submit" class="btn1 btn btn-secondary">CHECK Availability </button>
                    <button type="btn" id="ban" class="btn2 btn btn-secondary" style="display:none;float:right;">BOOK NOW </button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default btn-tone  m-r-10" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!-- add modal stop -->
<!-- update modal start -->
<div class="modal fade" id="updatenew">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="mods">update reservation</h5>
                <button type="button" class="close" data-dismiss="modal">
                    <i class="anticon anticon-close"></i>
                </button>
            </div>
            <div class="modal-body">
                <div id="msg2"></div>
                <form id="myforms">

                    <div id="msg1"></div>
                    <input type="text" name="pid" hidden class="form-control" id="">
                    <div class="datepicker form-group row">
                        <div class="date-select  col-6">
                            <p>From:</p>
                            <input type="datetime-local" class="form-control" name="date1" value="dd / mm / yyyy">

                            <!-- <img src="img/calendar.png" alt=""> -->
                        </div>
                        <div class="date-select to col-6">
                            <p>To:</p>
                            <input type="datetime-local" class="form-control" name="date2" value="dd / mm / yyyy">
                            <!-- <img src="img/calendar.png" alt=""> -->
                        </div>
                    </div>
                    <div class="room-quantity row">
                        <div class="single-quantity col-6">
                            <p>Adults:</p>
                            <div class="pro-qty"><input type="text" class="form-control" name="adult"></div>
                        </div>
                        <div class="single-quantity col-6">
                            <p>Children:</p>
                            <div class="pro-qty"><input type="text" class="form-control" name="child"></div>
                        </div>
                        <div class="single-quantity last col-12">
                            <br>
                            <p>Rooms:</p>
                            <div class="pro-qty"><input type="text" class="form-control" name="room_num">
                            </div>
                        </div>
                    </div>
                    <div class="room-selector form-group">
                        <br>
                        <p>Room type:</p>
                        <select name="room" id="room" class="suit-select form-control">
                            <?php
                            $sql = "SELECT * FROM room";
                            echo "<option></option>";
                            if ($result = mysqli_query($conn, $sql)) {
                                if (mysqli_num_rows($result) > 0) {
                                    //print_r($result);
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        echo "<option value='" . $row['room_name'] . "'>" . $row['room_name'] . "</option>";
                                    }
                                }
                            }
                            ?>
                            <!-- <option value="Master suite"> Master suite</option>
                            <option value="Double Room">Double Room</option>
                            <option value="Single Room">Single Room</option>
                            <option value="Special Room">Special Room</option> -->
                        </select>
                    </div>
                    <div class="form-group ">
                        <p style="font-size: 14px;color:#242424;margin-bottom: 2px;font-weight: 400;">Full
                            Name:</p>
                        <input type="text" name="fullname" class="form-control" style="border:none;border-bottom:1px solid  #888888;border-radius: 0;-webkit-tap-highlight-color: transparent;" id="">
                    </div>
                    <div class="form-group">
                        <p style="font-size: 14px;color:#242424;margin-bottom: 2px;font-weight: 400;">email:
                        </p>
                        <input type="email" name="email" class="form-control" style="border:none;border-bottom:1px solid  #888888;border-radius: 0;-webkit-tap-highlight-color: transparent;" id="">
                    </div>
                    <div class="form-group">
                        <p style="font-size: 14px;color:#242424;margin-bottom: 2px;font-weight: 400;">Phone
                            number:</p>
                        <input type="tel" name="Phone" class="form-control" style="border:none;border-bottom:1px solid  #888888;border-radius: 0;-webkit-tap-highlight-color: transparent;" id="">
                    </div>
                    <button type="submit" class="btn1 btn btn-block btn-secondary">update reservation</button>

                </form>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default btn-tone m-r-10" data-dismiss="modal">Close</button>

            </div>
        </div>
    </div>
</div>
<!-- update modal stop -->
<!-- delete modal start -->
<div class="modal fade" id="delete">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Delete reservation</h5>
                <button type="button" class="close" data-dismiss="modal">
                    <i class="anticon anticon-close"></i>
                </button>
            </div>
            <div class="modal-body">
                <p>Are you sure <button type="button" class="btn btn-danger btn-tone Delete " style="float:right;"> <i class="anticon anticon-delete"></i>delete</button></p>

            </div>
            <div class="modal-footer">
            </div>
        </div>
    </div>
</div>
<!-- delete modal stop -->
<!-- /.content-wrapper -->
<footer class="main-footer">
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">Eko hotel</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
        <b>Version</b> 3.2.0
    </div>
</footer>


<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="../plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="../plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="../plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="../plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="../plugins/jszip/jszip.min.js"></script>
<script src="../plugins/pdfmake/pdfmake.min.js"></script>
<script src="../plugins/pdfmake/vfs_fonts.js"></script>
<script src="../plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="../plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="../plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.min.js"></script>

<!-- Page specific script -->
<script>
    $(function() {
        $("#example1").DataTable({
            "responsive": true,

            "ajax": {
                url: "reservation_fetch.php",
                method: "POST"
            },
            "fnCreate": function(nRow, aData, iDataIndex) {
                $(nRow).attr("name", aData[0]);
            },
            "columnDefs": [{
                "targets": [], //not sort
                "orderable": false
            }],


        })
    });

    $(document).ready(function() {
        $('#myform').on('submit', function(event) {
            event.preventDefault();
            $.ajax({
                type: 'post',
                url: "availbiltiy.php",
                data: new FormData(this),
                dataType: "json",
                contentType: false,
                processData: false,
                cache: false,
                success: function(data) {
                    if (data == 'success') {
                        $('.form-group').show();
                        $('.btn2').show();
                        $('.p2').show();
                        $('.room-selector').hide();
                        $('.btn1').hide();
                        $('.p1').hide();
                        $('.room-quantity').hide();
                        $('.datepicker').hide();

                    }
                    if (data == 'failed') {
                        $("#msg1").html('<span class="alert alert-warning alert-dismissible fade show">room ask is more than available room</span><br><br>');
                        setTimeout(function() {
                            $("#msg1").html('');
                        }, 5000);

                    }
                    if (data == 'dams') {

                    }

                }
            });

        })
    });
    $('#ban').on('click', function() {
        $('#myform').on('submit', function(event) {
            event.preventDefault();
            $.ajax({
                type: 'post',
                url: "add_book.php",
                data: new FormData(this),
                dataType: "json",
                contentType: false,
                processData: false,
                cache: false,
                success: function(data) {
                    if (data == 'success') {
                        $("#myform")[0].reset();
                        $('#example1').DataTable().ajax.reload();
                        $('.modal').each(function() {
                            $(this).modal('hide');
                        });
                        $('.form-group').hide();
                        $('.btn2').hide();
                        $('.p2').hide();
                        $('.room-selector').show();
                        $('.btn1').show();
                        $('.p1').show();
                        $('.room-quantity').show();
                        $('.datepicker').show();
                        $("#msg").html('<p>room booked successfully</p>');
                        setTimeout(function() {
                            $("#msg").html('');
                        }, 5000);

                    } else {
                        $("#check-form").html('<span class="alert alert-warning alert-dismissible fade show">error occured</span><br><br>');
                        setTimeout(function() {
                            $("#check-form").html('');
                        }, 5000);
                    }

                }
            });

        })
        return;
    });
    $(document).on('click', '#editbtn', function(event) {
        var id = $(this).data('id');
        $.ajax({
            url: "get_single_reservation.php",
            data: {
                id: id
            },
            type: "GET",
            success: function(data) {
                var json = JSON.parse(data);
                $('#updatenew').modal('show');
                $("input[name='pid']").val(json.id);
                $("input[name='date1']").val(json.date_in);
                $("input[name='date2']").val(json.date_out);
                $("input[name='child']").val(json.kid);
                $("input[name='adult']").val(json.adult);
                $("input[name='room_num']").val(json.room_number);
                $('#room option[value="' + json.room_name + '"]').prop('selected', true);
                $("input[name='fullname']").val(json.name);
                $("input[name='email']").val(json.email);
                $("input[name='Phone']").val(json.Phone);
            }
        })
    });
    $(document).ready(function() {
        $('#myforms').on('submit', function(event) {
            event.preventDefault();
            $.ajax({
                type: 'post',
                url: "reservation_update.php",
                data: new FormData(this),
                dataType: "json",
                contentType: false,
                processData: false,
                cache: false,
                success: function(data) {
                    if (data == 'success') {
                        $('.modal').each(function() {
                            $(this).modal('hide');
                        });
                        $('#example1').DataTable().ajax.reload();
                        $('#dtable').DataTable().ajax.reload();
                        $("#msg").html('<span class="alert alert-success">Category is updated Successfully</span><br><br>');
                        setTimeout(function() {
                            $("#msg").html('');
                        }, 5000);

                    } else {
                        $("#msg2").html('<span class="alert alert-warning alert-dismissible fade show">Category is already exist</span><br><br>');
                        setTimeout(function() {
                            $("#msg2").html('');
                        }, 5000);
                    }
                }
            });
        })
    });
    $(document).on('click', '.btnDelete', function(event) {
        $('#delete').modal('show');
        var id = $(this).data('id');
        $(document).on('click', '.Delete', function(event) {
            event.preventDefault();
            $.ajax({
                url: "reservation_delete.php",
                data: {
                    id: id
                },
                type: "post",
                success: function(data) {
                    var d = JSON.parse(data);
                    if (d.result == 'success') {
                        $('#example1').DataTable().ajax.reload();
                        $('.modal').each(function() {
                            $(this).modal('hide');
                        });
                        $("#msg").html('<p class="alert alert-success">reservation  deleted Successfully</p><br><br>');
                        setTimeout(function() {
                            $("#msg").html('');
                        }, 5000);
                    } else {
                        $('#dtable').DataTable().ajax.reload();
                        $("#msg").html('<span class="alert alert-warnin">product not deleted</span><br><br>');
                        setTimeout(function() {
                            $("#msg").html('');
                        }, 5000);
                    }
                }
            })
        });
    });
</script>
</body>

</html>