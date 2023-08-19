<?php require('./includes/header.php');
require('./admin/config/dbcon.php');
?>
<section class="top_hero">
    <div class="img">
        <img src="./images/about_bg_1.png" alt="">
    </div>
    <div class="text">
        <h1>Sponsors</h1>
        <p><span><a href="./index.php">Home</a></span>
            << Sponsors </p>
    </div>
</section>
<section class="sponsors_sponsors">
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
                                    <img src="./admin/sponsor_images/<?=$data1['spo_img']?>" alt="">
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
                                    <img src="./admin/sponsor_images/<?=$data1['spo_img']?>" alt="">
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
                                    <img src="./admin/sponsor_images/<?=$data1['spo_img']?>" alt="">
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
                                    <img src="./admin/sponsor_images/<?=$data1['spo_img']?>" alt="">
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
<section class="home_3">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Steel Connect - Where India's Steel Industry Meets Chhattisgarh's Potential.</h1>
            </div>
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
            <a href="./contact.php">Contact Us</a>
        </div>
    </div>
</section>
<?php require('./includes/footer.php') ?>
<?php require('./includes/script.php') ?>