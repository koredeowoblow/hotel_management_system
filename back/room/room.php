<?php

$fat = "2";
include "../funtion/header.php";
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>room</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="">Home</a></li>
                        <li class="breadcrumb-item active">room</li>
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
                                        echo '  <button class="btn  btn-block bg-gradient-warning float-right m-t-35" data-toggle="modal" data-target="#addnew">Add
                                        room</button> ';
                                    }
                                }
                            }
                        }

                        ?>
                        <!-- <button class="btn  btn-block bg-gradient-warning float-right m-t-35" data-toggle="modal" data-target="#addnew">Add
                            room</button> -->
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div id="msg"></div>
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>room_name</th>
                                        <th>no. room </th>
                                        <th>no. room available</th>
                                        <th>adult capacity</th>
                                        <th>child capacity</th>
                                        <th>price</th>
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
                <h5 class="p1 modal-title">add new room info </h5>

                <button type="button" class="close" data-dismiss="modal">
                    <i class="anticon anticon-close"></i>
                </button>
            </div>
            <div class="modal-body">
                <div id="msg1"></div>
                <form id="myform">
                    <div class="form-group">
                        <p>room name:</p>
                        <input type="text" class="form-control" name="rname" id="">
                    </div>
                    <div class="form-group">
                        <p>adult limit:</p>
                        <input type="number" class="form-control" name="adult" id="">
                    </div>
                    <div class="form-group">
                        <p>child limit:</p>
                        <input type="number" class="form-control" name="child" id="">
                    </div>
                    <div class="form-group">
                        <p>price:</p>
                        <input type="number" class="form-control" name="price" id="">
                    </div>
                    <div class="form-group">
                        <p>total number of room:</p>
                        <input type="number" class="form-control" name="troom" id="">
                    </div>
                    <br>
                    <button type="submit" id="ban" class="btn btn-block btn-primary btn-tone">add room</button>
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
                <h5 class="modal-title" id="mods">update room info</h5>
                <button type="button" class="close" data-dismiss="modal">
                    <i class="anticon anticon-close"></i>
                </button>
            </div>
            <div class="modal-body">
                <div id="msg2"></div>
                <form id="myforms">

                    <div id="msg1"></div>
                    <input type="text" name="pid" hidden class="form-control">
                    <div class="form-group">
                        <p>room name:</p>
                        <input type="text" class="form-control" name="rname" id="">
                    </div>
                    <div class="form-group">
                        <p>adult limit:</p>
                        <input type="number" class="form-control" name="adult" id="">
                    </div class="form-group">
                    <div class="form-group">
                        <p>child limit:</p>
                        <input type="number" class="form-control" name="child" id="">
                    </div>
                    <div class="form-group">
                        <p>price:</p>
                        <input type="number" class="form-control" name="price" id="">
                    </div>
                    <div class="form-group">
                        <p>total number of room:</p>
                        <input type="number" class="form-control" name="troom" id="">
                    </div>
                    <br>
                    <button type="submit" class="btn btn-block btn-primary btn-tone">add room</button>

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
                <h5 class="modal-title" id="exampleModalLabel">Delete room info</h5>
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
<script>
    $(function() {
        $("#example1").DataTable({
            "responsive": true,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"],

            "ajax": {
                url: "room_fetch.php",
                method: "POST"
            },
            "fnCreate": function(nRow, aData, iDataIndex) {
                $(nRow).attr("name", aData[0]);
            },
            "columnDefs": [{
                "targets": [], //not sort
                "orderable": false
            }],

        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');

    });


    $('#ban').on('click', function() {
        $('#myform').on('submit', function(event) {
            event.preventDefault();
            $.ajax({
                type: 'post',
                url: "add_room.php",
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

                        $("#msg").html('<p>room booked successfully</p>');
                        setTimeout(function() {
                            $("#msg").html('');
                        }, 5000);

                    } else {
                        $("#msg1").html('<span class="alert alert-warning alert-dismissible fade show">error occured</span><br><br>');
                        setTimeout(function() {
                            $("#msg1").html('');
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
            url: "get_single_room.php",
            data: {
                id: id
            },
            type: "GET",
            success: function(data) {
                var json = JSON.parse(data);
                $('#updatenew').modal('show');
                $("input[name='pid']").val(json.room_id);
                $("input[name='rname']").val(json.room_name);
                $("input[name='child']").val(json.child_occupancy);
                $("input[name='adult']").val(json.adult_occupancy);
                $("input[name='troom']").val(json.troom);
                $("input[name='price']").val(json.price);
            }
        })
    });
    $(document).ready(function() {
        $('#myforms').on('submit', function(event) {
            event.preventDefault();
            $.ajax({
                type: 'post',
                url: "room_update.php",
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
                url: "room_delete.php",
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
                        $("#msg").html('<span class="alert alert-success">Product deleted Successfully</span><br><br>');
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