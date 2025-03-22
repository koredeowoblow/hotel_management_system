<?php
include "operations/conn.php";
include "operations/header.php";
?>

<!-- Hero Slider Begin -->
<div class="hero-slider">
    <div class="slider-item">
        <div class="single-slider-item set-bg" data-setbg="img/slider-1.jpg">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <h1>We hope you’ll enjoy <br />your stay.</h1>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="slider-nav">
                            <a href="#" class="single-slider-nav">
                                <img src="img/nav-1.jpg" alt="">
                                <div class="nav-text active">
                                    <p>Pool<i class="lnr lnr-arrow-right"></i></p>
                                </div>
                            </a>
                            <a href="#" class="single-slider-nav">
                                <img src="img/nav-2.jpg" alt="">
                                <div class="nav-text">
                                    <p>Sauna<i class="lnr lnr-arrow-right"></i></p>
                                </div>
                            </a>
                            <a href="#" class="single-slider-nav last">
                                <img src="img/nav-3.jpg" alt="">
                                <div class="nav-text">
                                    <p>Restaurant<i class="lnr lnr-arrow-right"></i></p>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Hero Slider End -->
<div class="notification-toast top-right" id="notification-toast"></div>

<!-- Room Availability Section Begin -->
<section class="room-availability spad">
    <div class="container">
        <div class="room-check">
            <div class="row">
                <div class="col-lg-6">
                    <div class="room-item">
                        <div class="room-pic-slider room-pic-item owl-carousel">
                            <div class="room-pic">
                                <img src="img/room-slider/room-1.jpg" alt="">
                            </div>
                            <div class="room-pic">
                                <img src="img/room-slider/room-2.jpg" alt="">
                            </div>
                            <div class="room-pic">
                                <img src="img/room-slider/room-3.jpg" alt="">
                            </div>
                        </div>
                        <div class="room-text">
                            <div class="room-title">
                                <h2>Junior Suite</h2>
                                <div class="room-price">
                                    <span>From</span>
                                    <h2>$252</h2>
                                </div>
                            </div>
                            <div class="room-features">
                                <div class="room-info">
                                    <i class="flaticon-019-television"></i>
                                    <span>Smart TV</span>
                                </div>
                                <div class="room-info">
                                    <i class="flaticon-029-wifi"></i>
                                    <span>High Wi-fii</span>
                                </div>
                                <div class="room-info">
                                    <i class="flaticon-003-air-conditioner"></i>
                                    <span>AC</span>
                                </div>
                                <div class="room-info">
                                    <i class="flaticon-036-parking"></i>
                                    <span>Parking</span>
                                </div>
                                <div class="room-info last">
                                    <i class="flaticon-007-swimming-pool"></i>
                                    <span>Pool</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="check-form">
                        <h2 class="p1">Check Availability</h2>
                        <h2 class="p2" style="display:none;">Enter Credentials</h2>
                        <form id="myform">
                            <div id="msg1"></div>
                            <div class="datepicker">
                                <div class="date-select">
                                    <p>From</p>
                                    <input required type="date" name="date1" value="dd / mm / yyyy">
                                    <!-- <img src="img/calendar.png" alt=""> -->
                                </div>
                                <div class="date-select to">
                                    <p>To</p>
                                    <input required type="date" name="date2" value="dd / mm / yyyy">
                                    <!-- <img src="img/calendar.png" alt=""> -->
                                </div>
                            </div>
                            <div class="room-quantity">
                                <div class="single-quantity">
                                    <p>Adults</p>
                                    <div class="pro-qty"><input required type="text" name="adult" value="0"></div>
                                </div>
                                <div class="single-quantity">
                                    <p>Children</p>
                                    <div class="pro-qty"><input type="text" name="child" value="0"></div>
                                </div>
                                <div class="single-quantity last">
                                    <p>Rooms</p>
                                    <div class="pro-qty"><input required type="text" name="room_num" value="0"></div>
                                </div>
                            </div>
                            <div class="room-selector">
                                <p>Room</p>
                                <select name="room" class="suit-select">
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
                            <div class="form-group" style="display:none;">
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
                            <button type="submit" class="btn1">CHECK Availability <i class="lnr lnr-arrow-right"></i></button>
                            <button type="btn" id="ban" class="btn2"  style="display:none;">BOOK NOW <i class="lnr lnr-arrow-right "></i></button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
        <div class="about-room">
            <div class="row">
                <div class="col-lg-10 offset-lg-1">
                    <h2>“Customers may forget what you said but they will never forget how you made themfeel”.</h2>
                </div>
            </div>
            <div class="about-para">
                <div class="row">
                    <div class="col-lg-6">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus libero mauris,
                            bibendum eget sapien ac, ultrices rhoncus ipsum. Donec nec sapien in urna fermentum
                            ornare. Morbi vel ultrices leo. Sed eu turpis eu arcu vehicula fringilla ut vitae
                            orci. Suspendisse maximus malesuada</p>
                    </div>
                    <div class="col-lg-6">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi at vulputate est.
                            Donec tempor felis at nibh eleifend malesuada. Nullam suscipit lobortis aliquam.
                            Phasellus lobortis ante lorem, vitae scelerisque lacus tempus sed. Phasellus rutrum
                            magna </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Room Availability Section End -->

<!-- Facilities Section Begin -->
<div class="facilities-section spad">
    <div class="container">
        <div class="facilities-content">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h1>Facilities</h1>
                    </div>
                </div>
                <div class="col-lg-6 p-0">
                    <div class="facilities-img set-bg" data-setbg="img/facilities-1.jpg"></div>
                </div>
                <div class="col-lg-6 p-0 ">
                    <div class="facilities-text-warp">
                        <div class="facilities-text">
                            <h2>Wellness Center</h2>
                            <p>Lorem ipsum dolor sit amet, consectetur adipis-cing elit. Mauris tincidunt
                                consectetur
                                turpis, eget consequat.</p>
                            <a href="#" class="primary-btn fac-btn">Visit Center <i class="lnr lnr-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 p-0 order-lg-1 order-2">
                    <div class="facilities-text-warp">
                        <div class="facilities-text">
                            <h2>Wellness Center</h2>
                            <p>Lorem ipsum dolor sit amet, consectetur adipis-cing elit. Mauris tincidunt
                                consectetur
                                turpis, eget consequat.</p>
                            <a href="#" class="primary-btn fac-btn">Visit Center <i class="lnr lnr-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 p-0 order-lg-2 order-1">
                    <div class="facilities-img set-bg" data-setbg="img/facilities-2.jpg"></div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Facilities Section End -->

<div class="testimonial-section spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <h1>Guestbook</h1>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="testimonial-item">
                    <div class="tab-content">
                        <div class="tab-pane fade-in active" id="testimonial-1" role="tabpanel">
                            <div class="single-testimonial-item">
                                <span class="test-date">02/02/2019</span>
                                <div class="test-rating">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                                <h4>Loved It</h4>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiselit. Vivamus libero mauris,
                                    bibendum eget sapien ac, ultrices rhoncus ipsum. Donec nec sapien in urna
                                    fermentum ornare.</p>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="testimonial-2" role="tabpanel">
                            <div class="single-testimonial-item">
                                <span class="test-date">02/02/2019</span>
                                <div class="test-rating">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                                <h4>Loved It2</h4>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiselit. Vivamus libero mauris,
                                    bibendum eget sapien ac, ultrices rhoncus ipsum. Donec nec sapien in urna
                                    fermentum ornare.</p>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="testimonial-3" role="tabpanel">
                            <div class="single-testimonial-item">
                                <span class="test-date">02/02/2019</span>
                                <div class="test-rating">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                                <h4>Loved It3</h4>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiselit. Vivamus libero mauris,
                                    bibendum eget sapien ac, ultrices rhoncus ipsum. Donec nec sapien in urna
                                    fermentum ornare.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="testimonial-author-item">
                    <ul class="nav" role="tablist">
                        <li>
                            <a data-toggle="tab" href="#testimonial-1" role="tab" class="show active">
                                <div class="author-pic">
                                    <img src="img/testimonial/author-1.jpg" alt="">
                                </div>
                                <div class="author-text">
                                    <h5>John Doe <span>Berlin</span></h5>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a data-toggle="tab" href="#testimonial-2" role="tab">
                                <div class="author-pic">
                                    <img src="img/testimonial/author-2.jpg" alt="">
                                </div>
                                <div class="author-text">
                                    <h5>John Doe <span>Berlin</span></h5>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a data-toggle="tab" href="#testimonial-3" role="tab">
                                <div class="author-pic">
                                    <img src="img/testimonial/author-3.jpg" alt="">
                                </div>
                                <div class="author-text">
                                    <h5>John Doe <span>Berlin</span></h5>
                                </div>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Follow Instagram Section Begin -->
<section class="follow-instagram">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2>Follow us on Instagram @yourhotel</h2>
            </div>
        </div>
    </div>
</section>
<!-- Follow Instagram Section End -->

<!-- Footer Room Pic Section Begin -->
<div class="footer-room-pic">
    <div class="container-fluid">
        <div class="row">
            <img src="img/room-footer-pic/room-1.jpg" alt="">
            <img src="img/room-footer-pic/room-2.jpg" alt="">
            <img src="img/room-footer-pic/room-3.jpg" alt="">
            <img src="img/room-footer-pic/room-4.jpg" alt="">
        </div>
    </div>
</div>
<!-- Footer Room Pic Section End -->


<?php
// include "operations/footer.php";
?>
<footer class="footer-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="footer-logo">
                    <a href="#"><img src="img/logo.png" alt=""></a>
                </div>
            </div>
        </div>
        <div class="row pb-50">
            <div class="col-lg-3 col-sm-6">
                <div class="single-footer-widget">
                    <h5>Location</h5>
                    <div class="widget-text">
                        <i class="lnr lnr-map-marker"></i>
                        <p>1525 Boring Lane, <br />Los Angeles, CA</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="single-footer-widget">
                    <h5>Reception</h5>
                    <div class="widget-text">
                        <i class="lnr lnr-phone-handset"></i>
                        <p>+1 (603)535-4592</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="single-footer-widget">
                    <h5>Shuttle Service</h5>
                    <div class="widget-text">
                        <i class="lnr lnr-phone-handset"></i>
                        <p>+1 (603)535-4592</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="single-footer-widget">
                    <h5>Restaurant</h5>
                    <div class="widget-text">
                        <i class="lnr lnr-phone-handset"></i>
                        <p>+1 (603)535-4592</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="copyright-area">
        <div class="container">
            <div class="copyright-text">
                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                &copy;
                <script>
                    document.write(new Date().getFullYear());
                </script>
            </div>

        </div>
    </div>
</footer>
<!-- Footer Section End -->

<!-- Js Plugins -->
<script src="js/jquery-3.3.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.magnific-popup.min.js"></script>
<script src="js/jquery-ui.min.js"></script>
<script src="js/jquery.nice-select.min.js"></script>
<script src="js/jquery.slicknav.js"></script>
<script src="js/owl.carousel.min.js"></script>
<script src="js/main.js"></script>
<!-- <script src="js/jquery-3.3.1.min.js"></script> -->

<!-- <script src="js/jquery-3.6.3.js"></script> -->
<script>
    $('.room').select
    $(document).ready(function() {
        $('#myform').on('submit', function(event) {
            event.preventDefault();
            $.ajax({
                type: 'post',
                url: "operations/availbiltiy.php",
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
    })
   
    $('#ban').on('click', function() {
        $('#myform').on('submit', function(event) {
            event.preventDefault();
            $.ajax({
                type: 'post',
                url: "operations/add_book.php",
                data: new FormData(this),
                dataType: "json",
                contentType: false,
                processData: false,
                cache: false,
                success: function(data) {
                    if (data == 'success') {
                        $("#myform").hide();
                        $(".check-form").html('<h2>room booked successfully</h2>');
                        setTimeout(function() {
                            $("#myform").show();
                            $(".check-form").html('');
                        }, 1000);
                        // event.default();

                    } else {
                        $("#msg1").html('<span class="alert alert-warning alert-dismissible fade show">error occured</span><br><br>');
                        setTimeout(function() {
                            $("#msg1").html('');
                        }, 5000);
                        event.load();
                    }

                }
            });

        })
        return;
    })
</script>
</body>

</html>