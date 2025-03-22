<?php
include "funtion/conn.php";
session_start();
if (isset($_SESSION['User_id'])) {
  $query = "SELECT * FROM `access modules` orderby  ORDER BY id desc  ";
  $run_result = mysqli_query($conn, $query);
  while ($row = mysqli_fetch_assoc($run_result)) {
    $rid = $row['id'];
    $names = $row['name'];
    $link = $row['link'];
    $icon = $row['icon'];
    $id=$_SESSION['role_id'];
    if ($id != '') {
      $sql = "SELECT * FROM access where role_id ='$id'  ";
      $result = mysqli_query($conn, $sql);
      if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_array($result)) {
          $datas = $row['crud'];
          $ans = json_decode($datas);
          $rs = count($ans);
          for ($row = 0; $row < $rs; $row++) {
            $name = $ans[$row][0];

            if ($name == $rid) {
              $read = $ans[0][2];
              $site="..\profile\index.php";
              if ($read == 1) {
                $site = $link;
               
              }
            }
          }
        }
      }
    }
  }

  header("location:home/$site");
  die();
}

if (isset($_POST['submit'])) {

  $firstname = $_POST['email'];
  $password = md5($_POST['password']);
  $sql = "SELECT * FROM users where email = '" . $firstname . "' && password = '" . $password . "' ";
  $result = mysqli_query($conn, $sql);
  $num = mysqli_num_rows($result);

  if ($num > 0) {
    $row = mysqli_fetch_assoc($result);
    $_SESSION['User_id'] = $row['id'];

    $_SESSION['Username'] = $row['fullname'];
    $_SESSION['role_id'] = $row['role_id'];
    $id = $_SESSION['role_id'];

    $query = "SELECT * FROM `access modules` orderby  ORDER BY id desc  ";
    $run_result = mysqli_query($conn, $query);
    while ($row = mysqli_fetch_assoc($run_result)) {
      $rid = $row['id'];
      $names = $row['parent_name'];
      $link = $row['link'];
      $icon = $row['icon'];
      if ($id != '') {
        $sql = "SELECT * FROM access where role_id ='$id'  ";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
          while ($row = mysqli_fetch_array($result)) {
            $datas = $row['crud'];
            $ans = json_decode($datas);

            //print_r($ans);
            $rs = count($ans);

            for ($row = 0; $row < $rs; $row++) {
              $name = $ans[$row][0];

              if ($name == $rid) {
                $read = $ans[$row][2];
                if ($read == 1) {
                  $site = $link;
                 
                }
              }
            }
          }
        }
      }
    }
    $_SESSION['sites']=$sites;
    header("Location:home/$site");
  } else {
    header("Location:index.php?error=Incorrect details ");
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title></title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href=".plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>

<body class="hold-transition text-capitalize login-page">
  <div class="login-box">
    <!-- /.login-logo -->
    <div class="card card-outline card-primary">
      <div class="card-header text-center">
        <a href="#" class="h1"><b>Sign in</b></a>
      </div>
      <div class="card-body">
        <?php if (isset($_GET['error'])) { ?>
          <div id="msg1" class="alert alert-warning w-50" role="alert">
            <?php echo $_GET['error'] ?>
          </div>
        <?php } ?>
        <!-- <form action="" id="myform" method="post">
          <div class="input-group mb-3">
            <input type="email" class="form-control" name="email" placeholder="Email">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="password" class="form-control" name="password" placeholder="Password">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-8">
              <div class="icheck-primary">
                <input type="checkbox" id="remember">
                <label for="remember">
                  Remember Me
                </label>
              </div>
            </div>
           
            <div class="col-4">
              <button type="submit" class="btn btn-primary btn-block">Sign In</button>
            </div>
             /.col
          </div>
        </form> -->
        <form action="" id="myform" method="post">
          <div class="form-group">
            <label class="font-weight-semibold" for="userName">email:</label>
            <div class="input-affix">
              <i class="prefix-icon anticon anticon-user"></i>
              <input type="email" class="form-control" name="email" id="" placeholder="email">
            </div>
          </div>
          <div class="form-group">
            <label class="font-weight-semibold" for="password">Password:</label>
            <a class="float-right font-size-13 text-muted" href="funtion/forget.php">Forget Password?</a>
            <div class="input-affix m-b-10">
              <i class="prefix-icon anticon anticon-lock"></i>
              <input type="password" name="password" class="form-control" id="password" placeholder="Password">
            </div>
          </div>
          <div class="form-group">
            <div class="d-flex align-items-center justify-content-between">
              <span class="font-size-13 text-muted">
                Don't have an account?
                <a class="small" href="funtion/signup.php"> Signup</a>
              </span>
              <button class="btn btn-primary" name="submit">Sign In</button>
            </div>
          </div>


        </form>



        <p class="mb-1">
          <a href="funtion/forget.php">I forgot my password</a>
        </p>

      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
  </div>
  <!-- /.login-box -->

  <!-- jQuery -->
  <script src="plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
</body>

</html>