<?php
$fat = "3";
include "../funtion/header.php";
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 style="font-weight:500;">Gallery</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Gallery</li>
                    </ol>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header " style="background-color:#fd7e14; color:white;">
                            <h4 class="card-title" style="font-size:150%;">gallery picture</h4>
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
                                            echo ' <button class="btn  btn-outline-info btn-sm" data-toggle="modal"
                                        data-target="#modal-default" style="float:right;"> add</button>';
                                        }
                                    }
                                }
                            }

                            ?>


                        </div>
                        <div class="card-body">
                            <div>
                                <div class="filter-container p-0 row">
                                    <?php
                                    require "../funtion/conn.php";
                                    $select = " SELECT * FROM img_gallery";
                                    $result = mysqli_query($conn, $select);
                                    if ($result->num_rows > 0) {
                                        while ($row = $result->fetch_assoc()) {


                                            echo "<div   class='filtr-item col-sm-4 '>
                                            
                                           
                                        <img  id='editbtn'   src='" . $row['image_name'] . "' data-id=" . $row['id'] . "
                                                    style='width:auto; display: block;position:relative; max-width: 90%;min-width: 80%;height:80%; margin:auto; object-fit:cover;object-position: top;'
                                                    >
                                              <p style='text-align:center;'>
                                               " . $row['img_title'] . "</p>                                         
                                              <a style='float:right;margin-right:10%;margin-top:-10%;' href='javascript:void()' data-id='" . $row['id'] . "' class='text-danger anticon anticon-delete btnDelete'>Delete</a>
                                              </div>";
                                        }
                                    } ?>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<div class="modal fade" id="modal-default">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="background-color:#fd7e14;">
                <h4 class="modal-title">add image</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form enctype="multipart/form-data" id="myform">
                    <figure>
                        <img id="myimage" style="width:auto; display: block;position:relative; max-width: 50%; margin:auto; object-fit:cover;object-position: top;">
                    </figure>
                    <div class="custom-file">
                        <p style=" font-weight: 500;">image:</p>
                        <input type="file" name="images" accept="image/*" class="custom-file-input" required id="customFile">
                        <label class="custom-file-label" for="customFile">Choose image</label>
                        <!-- 
                                <input type="file" class="btn btn-secondary" name="image" 
                                    required> -->
                    </div>
                    <div class="form-group">
                        <p style=" font-weight: 500;">room</p>
                        <select name="title" class="form-control" id="title">
                            <option></option>
                            <option value="room">Room 1</option>
                            <option value="gallery">gallery</option>
                            <option value="room 3">Room 3</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary" style="float:right;">Save changes</button>

                </form>
            </div>
        </div>

    </div>
</div>

<div class="modal fade" id="updatenew">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="background-color:#fd7e14;">
                <h4 class="modal-title">update image</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form enctype="multipart/form-data" id="myforms">
                    <input type="text" hidden name="bid" id="">
                    <figure>
                        <img id="myimages" style="width:auto; display: block;position:relative; max-width: 50%; margin:auto; object-fit:cover;object-position: top;">
                    </figure>
                    <div class="custom-file">
                        <p style=" font-weight: 500;">image:</p>
                        <input type="file" name="images" accept="image/*" class="custom-file-input" required id="customFiles">
                        <label class="custom-file-label" for="customFiles">Choose image</label>
                        <!-- 
                                <input type="file" class="btn btn-secondary" name="image" 
                                    required> -->
                    </div>
                    <div class="form-group">
                        <p style=" font-weight: 500;">room</p>
                        <select name="title" class="form-control" id="title">
                            <option value="room 1">Room 1</option>
                            <option value="gallery">gallery</option>
                            <option value="room 3">Room 3</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary" style="float:right;">Save changes</button>

                </form>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- delete modal start -->
<div class="modal fade" id="delete">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Delete product</h5>
                <button type="button" class="close" data-dismiss="modal">
                    <i class="anticon anticon-close"></i>
                </button>
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
<footer class="main-footer">
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">Eko hotel</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
        <b>Version</b> 3.2.0
    </div>
</footer>

<script src="../plugins/jquery/jquery.min.js"></script>

<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- jQuery UI 1.11.4 -->

<!-- AdminLTE App -->
<script src="../dist/js/adminlte.js"></script>
<script>
    $(document).ready(function() {
        $('#myform').on('submit', function(event) {
            event.preventDefault();
            $.ajax({
                type: 'post',
                url: "gallery_insert.php",
                data: new FormData(this),
                dataType: "json",
                contentType: false,
                processData: false,
                cache: false,
                success: function(data) {
                    if (data == 'success') {
                        $("#myform")[0].reset();
                        $('.modal').each(function() {
                            $(this).modal('hide');
                        });

                        $("#msg").html('<span class="alert alert-success">Category is Added Successfully</span><br><br>');
                        setTimeout(function() {
                            $("#msg").html('');
                        }, 5000);
                        myimage.clear();

                    } else {
                        $("#msg1").html('<span class="alert alert-warning alert-dismissible fade show">Category already exist</span><br><br>');
                        setTimeout(function() {
                            $("#msg1").html('');
                        }, 5000);

                        // $("#msg1").html('<span class="alert alert-warning alert-dismissible fade show">Category already exist</span><br><br>');
                        // $('#msg1').toast('show');

                        //     function display() {$("#msg1").html('');                               
                        //    }                                                                
                        //     setTimeout( display(),10000);
                        // $('#msg1').toast('show');
                    }
                }
            });

        });
    });
    let uploadbtn = document.getElementById("customFile");
    let myimage = document.getElementById("myimage");
    uploadbtn.onchange = () => {
        let reader = new FileReader();
        reader.readAsDataURL(uploadbtn.files[0]);
        reader.onload = () => {
            myimage.setAttribute("src", reader.result);
        }
    };
    let uploadbtn1 = document.getElementById("customFiles");
    let myimages = document.getElementById("myimages");
    uploadbtn1.onchange = () => {
        let reader = new FileReader();
        reader.readAsDataURL(uploadbtn1.files[0]);
        reader.onload = () => {
            myimages.setAttribute("src", reader.result);
        }
    }


    $(document).on('click', '#editbtn', function() {
        //event.preventDefault();
        var id = $(this).data('id');
        $.ajax({
            type: 'GET',
            url: "get_single_user.php",
            data: {
                id: id
            },
            success: function(data) {
                var json = JSON.parse(data);
                $("#updatenew").modal("show");
                $("input[name='bid']").val(json.id);
                $('#title option[value="' + json.img_title + '"]').prop('selected', true);
                myimages.setAttribute("src", json.pics);

            },

        });
    })
    $(document).on('click', '.btnDelete', function(event) {
        $('#delete').modal('show');
        var id = $(this).data('id');
        $(document).on('click', '.Delete', function(event) {
            event.preventDefault();
            $.ajax({
                url: "gallery_delete.php",
                data: {
                    id: id
                },
                type: "post",
                success: function(data) {
                    var d = JSON.parse(data);
                    if (d.result == 'success') {
                        $('.modal').each(function() {
                            $(this).modal('hide');
                        });
                    } else {

                    }
                }
            })
        });
    });

    $(document).ready(function() {
        $('#myforms').on('submit', function(event) {
            event.preventDefault();
            $.ajax({
                type: 'post',
                url: "gallery_update.php",
                data: new FormData(this),
                dataType: "json",
                contentType: false,
                processData: false,
                cache: false,
                success: function(data) {
                    if (data == 'success') {
                        $("#myform")[0].reset();
                        $('.modal').each(function() {
                            $(this).modal('hide');
                        });
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
</script>
<!-- jQuery -->
</body>

</html>
<?php
//$path = "C:/xampp/htdocs/otel/back/funtion/footer.php";
//include($path);
?>