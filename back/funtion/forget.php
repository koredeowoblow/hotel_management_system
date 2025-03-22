<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AdminLTE 3 | Recover Password (v2)</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../dist/css/adminlte.min.css">
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <div class="card card-outline card-primary">
            <div class="card-header text-center">
                <a  class="h1"><b>Admin</b>LTE</a>
            </div>
            <div class="card-body">
                <p class="login-box-msg">You are only one step a way from your new password, recover your password now.
                </p>
                <form enctype="multipart/form-data" id="myform">
                    <div id="msg1"></div>
                    <div class="form-group">
                        <label class="font-weight-semibold" for="userName">Fullname:</label>
                        <input type="text" class="form-control" autocomplete="off" name="username" id="userName"
                            placeholder="Fullname">
                    </div>
                    <div class="form-group">
                        <label class="font-weight-semibold" for="email">Email:</label>
                        <input type="email" name="email" required class="form-control" id="email" placeholder="Email">
                    </div>
                    <div class="form-group" style="display: none;">
                        <label class="font-weight-semibold" for="password">Password:</label>
                        <input type="password" disabled name="password" autocomplete="off" class="form-control"
                            id="password" placeholder="Password">
                    </div>
                    <div class="form-group" style="display: none;">
                        <label class="font-weight-semibold" autocomplete="off" for="confirmPassword">Confirm
                            Password:</label>
                        <input type="password" disabled class="form-control" name='PasswordConfirm' id="confirmPassword"
                            placeholder="Confirm Password">
                    </div>
                    <div class="form-group">
                        <div class="d-flex align-items-center justify-content-between p-t-15">
                            <div class="checkbox">
                                <button id="check" class="btn btn-primary m-r-5">                                 
                                    <span>check account</span>
                                </button>
                            </div>
                            <button type="submit" style="display: none;" id="ban" class="btn btn-primary">Sign
                                In</button>
                        </div>
                    </div>
                </form>

            </div>
            <!-- /.login-card-body -->
        </div>
    </div>
    <!-- /.login-box -->

    <!-- jQuery -->
    <script src="../plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../dist/js/adminlte.min.js"></script>
    <script>
        $('#check').on('click', function () {          
            $('#myform').on('submit', function (event) {
                event.preventDefault();
                $.ajax({
                    type: 'post',
                    url: "see.php",
                    data: new FormData(this),
                    dataType: "json",
                    contentType: false,
                    processData: false,
                    cache: false,
                    success: function (data) {
                        if (data == 'pass') {                          
                            $('.form-group').show();
                            $('#confirmPassword').attr("disabled", false);
                            $('#password').attr("disabled", false);
                            $('#ban').show();
                            $('#check').hide();
                        } if (data == 'fail') {
                            setTimeout(function () { $("#check").removeClass("is-loading"); }, 100);
                            $("#msg1").html('<span class="alert alert-warning alert-dismissible fade show">account doesnt exist </span><br><br>');
                            setTimeout(function () {
                                $("#msg1").html('');
                            }, 5000);
                        }
                        else {

                        }
                    }
                });

            })
        });
        $('#ban').on('click', function () {
            $('#myform').on('submit', function (event) {
                event.preventDefault();
                $.ajax({
                    type: 'post',
                    url: "dad.php",
                    data: new FormData(this),
                    dataType: "json",
                    contentType: false,
                    processData: false,
                    cache: false,
                    success: function (data) {
                        if (data == 'success') {
                            // $("#myform")[0].reset();
                            window.location = "../";
                            setTimeout(function () {
                                $("#msg").html('');
                            }, 5000);
                        } if (data == 'fails') {
                            $("#msg1").html('<span class="alert alert-warning alert-dismissible fade show">email already exist </span><br><br>');
                            setTimeout(function () {
                                $("#msg1").html('');
                            }, 5000);
                        }
                        if (data == 'failed') {
                            $("#msg1").html('<span class="alert alert-warning alert-dismissible fade show">passord doesnt match confirm Password </span><br><br>');
                            setTimeout(function () {
                                $("#msg1").html('');
                            }, 5000);
                        }
                        else {

                        }
                    }
                });

            })
        })
    </script>

</body>

</html>