<?php require('./includes/header.php') ;
require('./admin/config/dbcon.php');
?>
<section class="top_hero">
    <div class="img">
        <img src="./images/about_bg_1.png" alt="">
    </div>
    <div class="text">
        <h1>Program</h1>
        <p><span><a href="./index.php">Home</a></span>
            << Program </p>
    </div>
</section>
<section class="event_details">
    <div class="container">
        <div class="head_text">
            <h1>Event Details</h1>
            <b></b>
            <p>Building strong connections between traders & manufacturers for better business</p>
        </div>
        <div class="row">
            <div class="col-md-6  p-3">
                <div class="box">
                    <h1>Session 1: Knowledge Enrichment</h1>
                    <p>. Engage with industry insights in a session led by Speaker 1. </p>
                    <p>. Gain valuable perspectives in a session presented by Speaker 2.</p>
                </div>
            </div>
            <div class="col-md-6  p-3">
                <div class="box">
                    <h1>Session 2 : Forge Connections</h1>
                    <p>. Network directly with Manufacturers and Traders/Resellers.</p>
                    <p>. Join forces with The Indian Steel Bulls and amplify your reach.</p>
                    <p>. Seize the spotlight with an exclusive Brand Launch opportunity alongside us.</p>
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
<section class="home_schedule">
    <div class="container">
        <div class="row">
            <div class="head_text">
                <h1>Schedules</h1>
                <b></b>
                <p>Explore the Timely Sessions and Plan Your Journey: Dive into the <br>Event's Dynamic Schedule</p>
            </div>
        </div>
        <div class="timing_col">
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
            <table class="table table table-striped">
                <thead>
                    <tr>
                        <th scope="col">Time</th>
                        <th scope="col">Event</th>
                    </tr>
                </thead>
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
</section>
<section class="program_gallery">
    <div class="container">
        <div class="text">
            <h1>Our Exhibitors</h1>
            <b></b>
            <p>Browse Through a Visual Journey</p>
        </div>
        <div class="row p-0">
            <div class="col-md-12 p-0">
                <div class="gallery_slider_area text-center owl-carousel owl-theme" id="lightgallery">
                    <?php
                    $sql = "SELECT * FROM img_tbl WHERE status = '1'";
                    $query = mysqli_query($con, $sql);

                    if (mysqli_num_rows($query)) {
                        while ($data = mysqli_fetch_assoc($query)) {
                    ?>
                            <div class="box">
                                <div class="img">
                                    <img src="./admin/admin_img_upload/<?= $data['img_name'] ?>" alt="">
                                    <a href="./admin/admin_img_upload/<?= $data['img_name'] ?>" data-fancybox="gallery1" itemprop="url"><i class="fa-solid fa-eye"></i></a>
                                    </a>
                                </div>
                                <div class="box_text">
                                    <p class="text-center"><?=$data['exhibitor_name']?></p>
                                </div>
                            </div>

                    <?php
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
        <?php
        $sql1 = "SELECT * FROM delegate_tbl WHERE status = '1'";
        $query1 = mysqli_query($con, $sql1);
        $result = mysqli_fetch_assoc($query1);
        ?>
        <div class="foot_text">
            <a href="./admin/delegate/<?=$result['name']?>">DOWNLOAD DELEGATE LIST</a>
        </div>
    </div>
</section>
<section class="sponsor_end">
    <div class="container">
        <div class="head_text">
            <h1>Want To Be Our Sponsors?</h1>
            <b></b>
        </div>
        <div class="body_text">
            <p>Sponsoring Steel Connect offers a multitude of advantages, including prominent recognition on event collateral, signage, and digital platforms. Your brand will enjoy enhanced visibility, networking opportunities, and the chance to showcase products and services to a diverse audience. By aligning with this industry-leading event, you'll position your organization as a key player in the iron and steel sector while fostering valuable connections and gaining access to exclusive benefits.</p>
            <p><span>Elevate your brand's presence and seize unique opportunities by sponsoring Steel Connect, the platform that connects the iron and steel industry's leading players.</span></p>
        </div>
        <div class="foot_text">
            <a href="contact.php">Contact Us</a>
        </div>
    </div>
</section>
<?php require('./includes/footer.php') ?>
<?php require('./includes/script.php') ?>