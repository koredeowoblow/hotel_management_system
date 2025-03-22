<?php
include "../funtion/conn.php";
$fat = "4";
include "../funtion/header.php";
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>expenditure</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">expenditure</li>
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
                        <button class="btn  btn-block bg-gradient-warning float-right m-t-35" data-toggle="modal" data-target="#addnew">Add
                            expenses</button>
                        <div id="example1_wrapper"></div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div id="msg"></div>
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>expense name:</th>
                                        <th>quantity:</th>
                                        <th>amount per expenses:</th>
                                        <th>total amount:</th>
                                        <th>date:</th>
                                        <th style="text-align:right;">option:</th>
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
                <h5 class="p1 modal-title">Add Expenses</h5>
                <button type="button" class="close" data-dismiss="modal">
                    <i class="anticon anticon-close"></i>
                </button>
            </div>
            <div class="modal-body">
                <div id="msg1"></div>
                <form id="myform">

                    <div id="msg1"></div>
                    <div class="form-group">

                        <p>expense name:</p>
                        <input type="text" name="name" class="form-control" name="adult">
                    </div>

                    <div class="form-group">
                        <p style="font-size: 14px;color:#242424;margin-bottom: 2px;font-weight: 400;">
                            quantity bought:</p>
                        <input type="text" name="quantity" oninput="add_number();" class="form-control" id="quantity">
                    </div>
                    <div class="form-group">
                        <p style="font-size: 14px;color:#242424;margin-bottom: 2px;font-weight: 400;">Amount per
                            expenses :
                        </p>
                        <input type="text" name="a_p_e" oninput="add_number();" class="form-control" id="a_p_e">
                    </div>
                    <div class="form-group">
                        <p style="font-size: 14px;color:#242424;margin-bottom: 2px;font-weight: 400;">total amount:</p>
                        <input type="number" name="total_amount" class="form-control" id="total_amount">
                    </div>
                    <button type="submit" class=" btn btn-primary" btn-block style="float:right;">add expenses
                    </button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="reset" class="btn btn-default btn-tone  m-r-10" data-dismiss="modal">Close</button>
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
                <h5 class="modal-title" id="mods">update expenses</h5>
                <button type="button" class="close" data-dismiss="modal">
                    <i class="anticon anticon-close"></i>
                </button>
            </div>
            <div class="modal-body">
                <div id="msg2"></div>
                <form id="myforms">

                    <div id="msg1"></div>
                    <input type="text" hidden class="form-control" name="pid" id="">
                    <div class="form-group">
                        <p>expense name:</p>
                        <input type="text" name="name" class="form-control" name="adult">
                    </div>

                    <div class="form-group">
                        <p style="font-size: 14px;color:#242424;margin-bottom: 2px;font-weight: 400;">
                            quantity bought:</p>
                        <input type="text" name="quantity" oninput="add_numbers();" class="form-control" id="quantitys">
                    </div>
                    <div class="form-group">
                        <p style="font-size: 14px;color:#242424;margin-bottom: 2px;font-weight: 400;">Amount per
                            expenses :
                        </p>
                        <input type="text" name="a_p_e" oninput="add_numbers();" class="form-control" id="a_p_es">
                    </div>
                    <div class="form-group">
                        <p style="font-size: 14px;color:#242424;margin-bottom: 2px;font-weight: 400;">total amount:</p>
                        <input type="number" name="total_amount" class="form-control" id="total_amounts">
                    </div>
                    <button type="submit" class=" btn btn-block btn-primary" style="float:right;">add expenses
                    </button>
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
                <h5 class="modal-title" id="exampleModalLabel">Delete reservation <button type="button" class="close" data-dismiss="modal">
                        <i class="anticon anticon-close"></i>
                    </button></h5>

            </div>
            <div class="modal-body">
                <p>Are you sure</p>
                <button type="button" class="btn btn-danger btn-tone Delete " style="float:right;"> <i class="anticon anticon-delete"></i>delete</button>
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
    function add_number() {
        document.getElementById("total_amount").value = "0";
        var first_number = parseFloat(document.getElementById("quantity").value);
        var second_number = parseFloat(document.getElementById("a_p_e").value);
        var result = first_number * second_number;

        document.getElementById("total_amount").value = result;

    }

    function add_numbers() {
        document.getElementById("total_amounts").value = "0";
        var first_number = parseFloat(document.getElementById("quantitys").value);
        var second_number = parseFloat(document.getElementById("a_p_es").value);
        var result = first_number * second_number;

        document.getElementById("total_amounts").value = result;

    }
    $(function() {
        $("#example1").DataTable({
            "responsive": true,

            "ajax": {
                url: "expenses_fetch.php",
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

    $('#myform').on('submit', function(event) {
        event.preventDefault();
        $.ajax({
            type: 'post',
            url: "add_expenses.php",
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

                    $("#msg").html('<span class="alert alert-success">expenditure added</span>');
                    setTimeout(function() {
                        $("#msg").html('');
                    }, 5000);

                } else {
                    $("#").html('<span class="alert alert-warning alert-dismissible fade show">error occured</span><br><br>');
                    setTimeout(function() {
                        $("#check-form").html('');
                    }, 5000);
                }

            }
        });

    });
    $(document).on('click', '#editbtn', function(event) {
        var id = $(this).data('id');
        $.ajax({
            url: "get_single_expenses.php",
            data: {
                id: id
            },
            type: "GET",
            success: function(data) {
                var json = JSON.parse(data);
                $('#updatenew').modal('show');
                $("input[name='pid']").val(json.id);
                $("input[name='name']").val(json.name);
                $("input[name='a_p_e']").val(json.amount_per_quantity);
                $("input[name='quantity']").val(json.quantity);
                $("input[name='total_amount']").val(json.total_amount);
            }
        })
    });
    $(document).ready(function() {
        $('#myforms').on('submit', function(event) {
            event.preventDefault();
            $.ajax({
                type: 'post',
                url: "expenses_update.php",
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
                        $("#msg").html('<span class="alert alert-success">expenses is updated Successfully</span><br><br>');
                        setTimeout(function() {
                            $("#msg").html('');
                        }, 5000);

                    } else {
                        $("#msg2").html('<span class="alert alert-warning alert-dismissible fade show">expenditure is already exist</span><br><br>');
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
                url: "expenses_delete.php",
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
                        $("#msg").html('<p class="alert alert-success">expenditure  deleted Successfully</p><br><br>');
                        setTimeout(function() {
                            $("#msg").html('');
                        }, 5000);
                    } else {
                        $('#dtable').DataTable().ajax.reload();
                        $("#msg").html('<span class="alert alert-warnin">expenditure not deleted</span><br><br>');
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