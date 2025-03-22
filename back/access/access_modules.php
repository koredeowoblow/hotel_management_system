<?php
$fat = "14";
include "../funtion/header.php";
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>access</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="">Home</a></li>
                        <li class="breadcrumb-item active">access</li>
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

                        <!-- /.card-header -->
                        <div class="card-body">
                            <div id="msg"></div>
                            <div class="form-group">
                                <p>role:</p>
                                <select name="role" id="role" class="suit-select form-control">
                                    <?php
                                    $sql = "SELECT * FROM `access role`";
                                    echo "<option></option>";
                                    if ($result = mysqli_query($conn, $sql)) {
                                        if (mysqli_num_rows($result) > 0) {
                                            //print_r($result);
                                            while ($row = mysqli_fetch_assoc($result)) {
                                                echo "<option value='" . $row['id'] . "'>" . $row['name'] . "</option>";
                                            }
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>view name</th>
                                        <th>create permisson</th>
                                        <th>read permisson</th>
                                        <th>update permisson</th>
                                        <th>delete permisson</th>
                                    </tr>
                                </thead>
                                <tbody id="access_resp"></tbody>
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
    $(document).ready(function() {
        $('#role').on('change', function() {
            var id = document.getElementById('role').value;
            $.ajax({
                url: "access_modules/access_fetch.php",
                data: {
                    id: id
                },
                type: "POST",
                success: function(data) {
                    $('#access_resp').html(data);

                }
            });


        })
    });

    function dat(x,y,z,w) {
        let yep = document.getElementById('checkboxPrimary'+x+z);
        
        
        if(yep.checked == true){
            y = 1;
        }
        if(yep.checked == false){
            y = 0;
           
        }
        $.ajax({
                url: "access_modules/access_update.php",
                data: {x,y,z,w },
                type: "POST",
                success: function(data) {
                   
                }
            });
        
        
    }
</script>

</body>

</html>