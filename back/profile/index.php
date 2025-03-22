<?php
include "../funtion/conn.php";
$fat = "8";
include "../funtion/header.php";
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Profile</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">User Profile</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3">

                    <!-- Profile Image -->
                    <div class="card card-warning card-outline">
                        <div class="card-body box-profile">
                            <div class="text-center  text-warning">
                                <figure> <img id="ima" class="profile-user-img img-fluid img-circle" src="" alt="m"></figure>

                            </div>

                            <h3 id="name" class="profile-username text-center"></h3>

                            <p id="role" class="text-muted text-center"></p>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->

                    <!-- About Me Box -->

                </div>
                <!-- /.col -->
                <div class="col-md-9">
                    <div class="card">
                        <div class="card-header p-2">
                            <ul class="nav nav-pills">
                                <li class="nav-item"><a class="nav-link active bg-warning mx-2" href="#about" data-toggle="tab">about</a>
                                <li class="nav-item"><a class="nav-link bg-warning " href="#settings" data-toggle="tab">Settings</a></li>
                            </ul>
                        </div><!-- /.card-header -->
                        <div class="card-body">
                            <div class="tab-content">
                                <div class="tab-pane " id="settings">
                                    <form class="form-horizontal">
                                        <div class="form-group row">
                                            <label for="inputName" class="col-sm-2 col-form-label">Name</label>
                                            <div class="col-sm-10">
                                                <input type="text" name="fullname" class="form-control" id="inputName" placeholder="Name">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                                            <div class="col-sm-10">
                                                <input type="email" class="form-control" id="inputEmail" placeholder="Email">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputpassword" class="col-sm-2 col-form-label">new password</label>
                                            <div class="col-sm-10">
                                                <input type="password" class="form-control" id="inputpassword" placeholder="password">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputExperience" class="col-sm-2 col-form-label">Confirm password</label>
                                            <div class="col-sm-10">
                                                <input type="password" class="form-control" name="inputconfirmpassword" id="inputconfirmpassword">
                                            </div>
                                        </div>
                                        <figure>
                                            <img id="myimage" style=" display: block;position:relative; max-width: 30%; height:30%; margin:auto; object-fit:cover;">
                                        </figure>
                                        <div class="form-group">
                                            <label for="customFile col-sm-2 col-form-label">Profile picture</label>

                                            <div class="custom-file col-sm-10 mx-1  " >
                                                <input type="file" class="custom-file-input" id="customFile">
                                                <label class="custom-file-label" for="customFile">Choose file</label>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="offset-sm-2 col-sm-10">
                                                <button type="submit" class="btn btn-danger">Submit</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="tab-pane  active" id="about">
                                    <div class="card-header">
                                        <h3 class="card-title">About Me</h3>
                                    </div>
                                    <!-- /.card-header -->
                                    <div class="card-body">
                                        <strong><i class="fas fa-book mr-1"></i> Education</strong>

                                        <p class="text-muted">
                                            B.S. in Computer Science from the University of Tennessee at Knoxville
                                        </p>

                                        <hr>

                                        <strong><i class="fas fa-map-marker-alt mr-1"></i> Location</strong>

                                        <p class="text-muted">Malibu, California</p>
                                        <hr>
                                        <strong><i class="fas fa-pencil-alt mr-1"></i> Skills</strong>
                                        <p class="text-muted">
                                            <span class="tag tag-danger">UI Design</span>
                                            <span class="tag tag-success">Coding</span>
                                            <span class="tag tag-info">Javascript</span>
                                            <span class="tag tag-warning">PHP</span>
                                            <span class="tag tag-primary">Node.js</span>
                                        </p>

                                        <hr>

                                        <strong><i class="far fa-file-alt mr-1"></i> Notes</strong>

                                        <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fermentum enim neque.</p>
                                    </div>
                                    <!-- /.card-body -->
                                </div>
                                <!-- /.card -->
                                <!-- /.tab-pane -->
                            </div>
                            <!-- /.tab-content -->
                        </div><!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->


<!-- /.control-sidebar -->
</div>
<footer class="main-footer">
    <div class="float-right d-none d-sm-block">
        <b>Version</b> 3.2.0
    </div>
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
</footer>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.min.js"></script>
<script>
    $(function() {
        $.ajax({
            url: "profile_fetch.php",
            method: "post",
            success: function(data) {
                var json = JSON.parse(data);
                $("#name").html(json.fullname);
                $("#role").html(json.role_name);
                $("#ima").setAttribute("src", json.image);
                $("input[name='fullname']").val(json.fullname);
            }
        })
    });
    let uploadbtn = document.getElementById("customFile");
    let myimage = document.getElementById("myimage");
    uploadbtn.onchange = () => {
        let reader = new FileReader();
        reader.readAsDataURL(uploadbtn.files[0]);
        reader.onload = () => {
            myimage.setAttribute("src", reader.result);
        }
    }
</script>


</body>

</html>