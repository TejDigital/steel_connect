<?php
session_start();
require('./includes/header.php');
require('./admin/config/dbcon.php');
?>
<section class="home_top">
    <div class="box">
        <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel" style="position: relative;">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class="img">
                        <img src="images/steel_img_7.jpg" alt="">
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="img">
                        <img src="images/steel_img_8.jpg" alt="">
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="img">
                        <img src="images/steel_img_9.jpg" alt="">
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
        <!-- <div class="img">
            <img src="images/home_bg_1.png" alt="">
        </div> -->
        <div class="text">
            <div class="container">
                <div class="row d-flex align-items-center justify-content-between">
                    <div class="col-md-12 main_box">
                        <h1>STEEL TRADE EVENT <p>2023</p>
                        </h1>
                        <div class="address">
                            <p>
                                <i class="fa-solid fa-calendar-days"></i>
                                26 Nov 2023
                            </p>
                            <p><i class="fa-solid fa-location-dot"></i>Sayaji, Raipur</p>
                        </div>

                        <div class="times">
                            <div class="time_box">
                                <span id="current_day"></span>
                                <span>Days</span>
                            </div>
                            <div class="time_box">
                                <span id="current_hour"></span>
                                <span>Hours</span>
                            </div>
                            <div class="time_box">
                                <span id="current_minuts"></span>
                                <span>Minutes</span>
                            </div>
                            <div class="time_box">
                                <span id="current_second"></span>
                                <span>Seconds</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="home_2">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="down_pdf">
                    <a href="#!">DOWNLOAD BROCHURE</a>
                </div>
                <div class="text">
                    <h1> How Steel Connect Can Help You?</h1>
                    <b></b>
                    <p>Connect, Collaborate, and Flourish in the Dynamic World of Steel Commerce.</p>
                </div>
            </div>
        </div>
        <div class="row boxes">
            <div class="col-md-4 p-1">
                <div class="box">
                    <div class="img">
                        <img src="images/Connect.svg" alt="">
                    </div>
                    <div class="text">
                        <p>Join India's largest trading community at Steel Connect, where you can effortlessly connect with trusted traders from diverse regions, expanding your market reach and customer base</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 p-1">
                <div class="box">
                    <div class="img">
                        <img src="images/Positive Dynamic.svg" alt="">
                    </div>
                    <div class="text">
                        <p>Tap into Chhattisgarh's thriving steel sector, accessing a diverse range of quality products and extensive business opportunities directly from the source.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 p-1">
                <div class="box">
                    <div class="img">
                        <img src="images/Handshake Heart.svg" alt="">
                    </div>
                    <div class="text">
                        <p>Connect with industry peers and reputable manufacturers through Steel Connect, paving the way for enduring collaborations and mutually beneficial partnerships.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="home_3">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Steel Connect - Where India's Steel Industry Meets Chhattisgarh's Potential.</h1>
            </div>
        </div>
    </div>
</section>
<section class="home_4 home_speakers">
    <div class="container">
        <div class="text">
            <h1>Meet the speakers</h1>
            <b></b>
            <p>Engage with Industry Pioneers and Visionaries: Meet the Speakers Who Illuminate the Path Forward.</p>
        </div>
        <div class="row">
            <?php
            $sql = "SELECT * FROM speakers_tbl WHERE s_status = '1'";
            $query = mysqli_query($con, $sql);
            if (mysqli_num_rows($query)) {
                while ($data = mysqli_fetch_assoc($query)) {
            ?>
                    <div class="col-md-4 p-2">
                        <div class="box">
                            <div class="img">
                                <img src="./admin/speakers_images/<?= $data['s_img'] ?>" alt="">
                            </div>
                            <div class="bottom_text">
                                <h1><?= $data['s_name'] ?></h1>
                                <p><?= $data['s_position'] ?></p>
                            </div>
                        </div>
                    </div>
            <?php
                }
            }
            ?>
        </div>
    </div>
</section>
<section class="home_sponsors">
    <div class="container">
        <div class="text">
            <h1>Sponsors</h1>
            <b></b>
            <p>Meet the Valued Sponsors Behind the Success of Steel Connect.</p>
        </div>
        <div class="row p-0 sponsor_box">
            <div class="col-md-12 p-0">
                <h2>Platinum Sponsors</h2>
                <div class="Sponsors_slider_area_1 text-center owl-carousel owl-theme">
                    <?php
                    $query = "SELECT * FROM sponsors_tbl where spo_cat_id = '1' And spo_status = '1'";
                    $query_run = mysqli_query($con, $query);
                    if (mysqli_num_rows($query_run)) {
                        while ($data1 = mysqli_fetch_assoc($query_run)) {
                    ?>
                            <div class="box">
                                <div class="img">
                                    <img src="./admin/sponsor_images/<?= $data1['spo_img'] ?>" alt="">
                                </div>
                            </div>
                    <?php
                        }
                    }
                    ?>

                </div>
            </div>
        </div>
        <div class="row p-0 sponsor_box">
            <div class="col-md-12 p-0">
                <h2>Silver Sponsors</h2>
                <div class="Sponsors_slider_area_2 text-center owl-carousel owl-theme">
                    <?php
                    $query = "SELECT * FROM sponsors_tbl where spo_cat_id = '2' And spo_status = '1'";
                    $query_run = mysqli_query($con, $query);
                    if (mysqli_num_rows($query_run)) {
                        while ($data1 = mysqli_fetch_assoc($query_run)) {
                    ?>
                            <div class="box">
                                <div class="img">
                                    <img src="./admin/sponsor_images/<?= $data1['spo_img'] ?>" alt="">
                                </div>
                            </div>
                    <?php
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
        <div class="row p-0 sponsor_box">
            <div class="col-md-12 p-0">
                <h2>Associate Sponsors</h2>
                <div class="Sponsors_slider_area_3 text-center owl-carousel owl-theme">
                    <?php
                    $query = "SELECT * FROM sponsors_tbl where spo_cat_id = '3' And spo_status = '1' ";
                    $query_run = mysqli_query($con, $query);
                    if (mysqli_num_rows($query_run)) {
                        while ($data1 = mysqli_fetch_assoc($query_run)) {
                    ?>
                            <div class="box">
                                <div class="img">
                                    <img src="./admin/sponsor_images/<?= $data1['spo_img'] ?>" alt="">
                                </div>
                            </div>
                    <?php
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
        <div class="row p-0 sponsor_box">
            <div class="col-md-12 p-0">
                <h2>Digital Partners</h2>
                <div class="Sponsors_slider_area_4 text-center owl-carousel owl-theme">
                    <?php
                    $query = "SELECT * FROM sponsors_tbl where spo_cat_id = '4' And spo_status = '1'";
                    $query_run = mysqli_query($con, $query);
                    if (mysqli_num_rows($query_run)) {
                        while ($data1 = mysqli_fetch_assoc($query_run)) {
                    ?>
                            <div class="box">
                                <div class="img">
                                    <img src="./admin/sponsor_images/<?= $data1['spo_img'] ?>" alt="">
                                </div>
                            </div>
                    <?php
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="home_gallery">
    <div class="container">
        <div class="text">
            <h1>Exhibitor</h1>
            <b></b>
            <p>Browse Through a Visual Journey</p>
        </div>
        <div class="row p-0">
            <div class="col-md-12 p-0">
                <div class="gallery_slider_area owl-carousel owl-theme">
                    <?php
                    $sql = "SELECT * FROM img_tbl WHERE status = '1'";
                    $query = mysqli_query($con, $sql);

                    if (mysqli_num_rows($query)) {
                        while ($data = mysqli_fetch_assoc($query)) {
                    ?>
                            <div class="box">
                                <div class="img">
                                    <img src="admin/admin_img_upload/<?= $data['img_name'] ?>" alt="">
                                    <a href="admin/admin_img_upload/<?= $data['img_name'] ?>" data-fancybox="gallery" title="" itemprop="url"><i class="fa-solid fa-eye"></i></a>
                                    </a>
                                </div>
                            </div>

                    <?php
                        }
                    }
                    ?>
                    <!-- <div class="box">
                        <div class="img">
                            <img src="images/gallery_1.png" alt="">
                            <a href="images/gallery_1.png" data-fancybox="gallery1" itemprop="url"><i class="fa-solid fa-eye"></i></a>
                            </a>
                        </div>
                    </div>
                    <div class="box">
                        <div class="img">
                            <img src="images/gallery_2.png" alt="">
                            <a href="images/gallery_2.png" data-fancybox="gallery1" itemprop="url"><i class="fa-solid fa-eye"></i></a>
                        </div>
                    </div>
                    <div class="box">
                        <div class="img">
                            <img src="images/gallery_3.png" alt="">
                            <a href="images/gallery_3.png" data-fancybox="gallery1" itemprop="url"><i class="fa-solid fa-eye"></i></a>
                        </div>
                    </div>
                    <div class="box">
                        <div class="img">
                            <img src="images/gallery_4.png" alt="">
                            <a href="images/gallery_4.png" data-fancybox="gallery1" itemprop="url"><i class="fa-solid fa-eye"></i></a>
                        </div>
                    </div>
                    <div class="box">
                        <div class="img">
                            <img src="images/gallery_3.png" alt="">
                            <a href="images/gallery_3.png" data-fancybox="gallery1" itemprop="url"><i class="fa-solid fa-eye"></i></a>
                        </div>
                    </div> -->
                </div>
            </div>
        </div>
    </div>
</section>
<section class="home_schedule">
    <div class="container">
        <div class="row">
            <div class="head_text">
                <h1>Schedules</h1>
                <b></b>
                <p>Explore the Timely Sessions and Plan Your Journey: Dive into the <br>Event's Dynamic Schedule</p>
            </div>
        </div>
        <div class="timing_col ">
            <!-- <div class="times">
                <p>
                    <span>08:00 AM</span>: Opening of Registration Desk
                </p>
                <p>
                    <span>10:00 AM</span>: National Anthem
                </p>
                <p>
                    <span>10:10 AM</span>: Lighting of Lamp
                </p>
                <p>
                    <span>10:20 AM</span>: Welcome Speech by Host
                </p>
                <p>
                    <span>10:40 AM</span>: Welcome Speech by Steel Trade
                </p>
                <p>
                    <span>11:00 AM</span>: Speech by Chief Guest
                </p>
                <p>
                    <span>11:15 AM</span>: Speech by Speaker 1
                </p>
                <p>
                    <span>12:00 PM</span>: Speech by Speaker 2
                </p>
                <p>
                    <span>12:45 PM</span>: Speech by Speaker 3
                </p>
                <p>
                    <span>01:30 PM</span>: Closing of Session 1 & Lunch Announcement
                </p>
                <p>
                    <span>02:30 PM</span>: Opening Announcement of Session 2
                </p>
                <p>
                    <span>02:35 PM</span>: Commencement of Networking Session
                </p>
                <p>
                    <span>06:00 PM</span>: Announcement of Evening Tea & Snacks
                </p>
                <p>
                    <span>06:15 PM</span>: Closing Speech by Host for Event
                </p>

            </div> -->
            <table class="table table table-striped table-hover">
                <!-- <thead>
                    <tr>
                        <th scope="col">Time</th>
                        <th scope="col">Event</th>
                    </tr>
                </thead> -->
                <tbody>
                    <tr>
                        <th scope="row">08:00 AM</th>
                        <td>Opening of Registration Desk</td>
                    </tr>
                    <tr>
                        <th scope="row">10:00 AM</th>
                        <td>National Anthem</td>
                    </tr>
                    <tr>
                        <th scope="row">10:10 AM</th>
                        <td>Lighting of Lamp</td>
                    </tr>
                    <tr>
                        <th scope="row">10:20 AM</th>
                        <td>Welcome Speech by Host</td>
                    </tr>
                    <tr>
                        <th scope="row">10:40 AM</th>
                        <td>Welcome Speech by Steel Trade</td>
                    </tr>
                    <tr>
                        <th scope="row">11:00 AM</th>
                        <td>Speech by Chief Guest</td>
                    </tr>
                    <tr>
                        <th scope="row">11:15 AM</th>
                        <td>Speech by Speaker 1</td>
                    </tr>
                    <tr>
                        <th scope="row">12:00 PM</th>
                        <td>Speech by Speaker 2</td>
                    </tr>
                    <tr>
                        <th scope="row">12:45 PM</th>
                        <td>Speech by Speaker 3</td>
                    </tr>
                    <tr>
                        <th scope="row">01:30 PM</th>
                        <td>Closing of Session 1 &amp; Lunch Announcement</td>
                    </tr>
                    <tr>
                        <th scope="row">02:30 PM</th>
                        <td>Opening Announcement of Session 2</td>
                    </tr>
                    <tr>
                        <th scope="row">02:35 PM</th>
                        <td>Commencement of Networking Session</td>
                    </tr>
                    <tr>
                        <th scope="row">06:00 PM</th>
                        <td>Announcement of Evening Tea &amp; Snacks</td>
                    </tr>
                    <tr>
                        <th scope="row">06:15 PM</th>
                        <td>Closing Speech by Host for Event</td>
                    </tr>
                </tbody>
            </table>

        </div>
    </div>
    <div class="container-fluid p-0">
        <div class="img">
            <img src="images/Schedules_img.png" alt="">
        </div>
    </div>
</section>

<section class="home_ticket">
    <div class="container">
        <div class="text">
            <h1>Tickets</h1>
            <b></b>
            <p>Secure your spot at Steel Connect - the ultimate networking event for the iron and steel industry.</p>
        </div>
        <div class="row">
            <div class="col-md-4 box_area_1 p-3">
                <div class="box box_1">
                    <div class="head">
                        <div class="img">
                            <img src="./images/logo_1.svg" alt="">
                        </div>
                        <div class="head_text">
                            <p class="m-0">PER</p>
                            <p class="m-0">EARLY<br>DELEGATE</p>
                        </div>
                    </div>
                    <div class="body_text">
                        <p><span> Limited offer:</span>Exclusive Early Arrival Delegate package for the first 50 attendees at a discounted rate, with all event benefits.</p>
                        <div class="pricing">
                            <div class="price m-0">
                                <p class="">₹</p>
                                <p class="">5,999*</p>
                            </div>
                            <p class="gdt m-0"> + 18% GST</p>
                        </div>
                        <div class="foot_text">
                            <a href="#!">Buy now</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 p-3 box_area_1">
                <div class="box box_2">
                    <div class="head">
                        <div class="img">
                            <img src="./images/logo_1.svg" alt="">
                        </div>
                        <div class="head_text">
                            <p class="m-0">PER</p>
                            <p class="m-0">EXHIBITION</p>
                        </div>
                    </div>
                    <div class="body_text">
                        <p>For <span>exhibitors:</span> Choose the Per Exhibition package for dedicated space, branding, and event access.
                        </p>
                        <div class="pricing">
                            <div class="price m-0">
                                <p class="">₹</p>
                                <p class="">49,000*</p>
                            </div>
                            <p class="gdt m-0"> + 18% GST</p>
                        </div>
                        <div class="foot_text">
                            <a href="#!">Buy now</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4  p-3 box_area_1">
                <div class="box box_3">
                    <div class="head">
                        <div class="img">
                            <img src="./images/logo_1.svg" alt="">
                        </div>
                        <div class="head_text">
                            <p class="m-0">PER</p>
                            <p class="m-0">DELEGATE</p>
                        </div>
                    </div>
                    <div class="body_text">
                        <p> <span>Attendees:</span> Secure your spot with the Per Delegate package for access to sessions, networking, and more</p>
                        <div class="pricing">
                            <div class="price m-0">
                                <p class="">₹</p>
                                <p class="">6,999*</p>
                            </div>
                            <p class="gdt m-0"> + 18% GST</p>
                        </div>
                        <div class="foot_text">
                            <a href="#!">Buy now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="home_register">
    <div class="container">
        <div class="text">
            <h1>Register</h1>
            <b></b>
            <p>Reserve Your Spot Today and Unlock Access to Steel Connect's <br> Networking and Business Opportunities.</p>
        </div>
        <?php
        if (isset($_SESSION['steel_msg'])) {
            echo "<script>alert('" . $_SESSION['steel_msg'] . "')</script>";
            unset($_SESSION['steel_msg']);
        }
        ?>
        <div class="inputs">
            <div class="row px-2">
                <div class="col-md-6 p-0">
                    <div class="form">
                        <form action="./admin/connect.php" method="post">
                            <div class="input_box">
                                <input type="text" name="name" placeholder="Your name" class="input_area" onkeypress="return (event.charCode > 64 && 
                              event.charCode < 91) || (event.charCode > 96 && event.charCode < 123 || event.charCode == 32)">
                            </div>
                            <div class="input_box">
                                <span id="msg_alert2" style="color:red;"></span>
                                <input type="tel" maxlength="10" onkeyup="validateNumber(this,'msg_alert2')" name="phone" placeholder="Your Contact Number" class="input_area">
                            </div>
                            <div class="input_box">
                                <input type="email" name="email" placeholder="Your Email Address" class="input_area">
                            </div>
                            <div class="input_box">
                                <select name="select_opt" id="" class="input_area">
                                    <option value="">SELECT</option>
                                    <option value="DELEGATE">DELEGATE</option>
                                    <option value="EXHIBITION">EXHIBITION</option>
                                    <option value="Other">Other</option>
                                </select>
                            </div>
                            <div class="input_box">
                                <textarea name="message" class="input_area" id="" cols="30" rows="5"></textarea>
                            </div>
                            <div class="sub_btn">
                                <button type="submit" name="submit2" class="btn1">Submit Form</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-md-6 p-0">
                    <div class="map">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d119037.38264123915!2d81.25567209997178!3d21.19540793487601!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3a293cccec49ed45%3A0x2b3ff3bd73c91877!2sBhilai%2C%20Chhattisgarh!5e0!3m2!1sen!2sin!4v1691386404348!5m2!1sen!2sin" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="contact_links">
    <div class="container">
        <div class="row">
            <div class="col-md-4 p-2">
                <div class="box">
                    <div class="icon">
                        <a href="#!"><i class="fa-solid fa-phone-flip"></i></a>
                    </div>
                    <div class="text">
                        <p><a href="tel:8085485778">+918085485778</a></p>
                        <p><a href="#!">+918319619939</a></p>
                        <p><a href="#!">+918602143123</a></p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 p-2">
                <div class="box">
                    <div class="icon">
                        <a href="#!"><i class="fa-regular fa-envelope"></i></a>
                    </div>
                    <div class="text">
                        <p><a href="#!">steelconnect@gmail.com</a></p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 p-2">
                <div class="box">
                    <div class="icon">
                        <a href="#!"><i class="fa-solid fa-location-dot"></i></a>
                    </div>
                    <div class="text">
                        <p ><a onclick="myloc()" style="cursor: pointer;">Office No 40, Palika Bazar, Bhilai, Dist : Durg (Chhattisgarh)</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>














<?php require('./includes/footer.php') ?>
<?php require('./includes/script.php') ?>