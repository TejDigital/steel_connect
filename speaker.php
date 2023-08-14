<?php require('./includes/header.php');
require('./admin/config/dbcon.php');

 ?>
<section class="top_hero">
    <div class="img">
        <img src="./images/about_bg_1.png" alt="">
    </div>
    <div class="text">
        <h1>Speakers</h1>
        <p><span><a href="./index.php">Home</a></span>
            << Speakers </p>
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
                                <img src="./admin/speakers_images/<?=$data['s_img']?>" alt="">
                            </div>
                            <div class="bottom_text">
                                <h1><?=$data['s_name']?></h1>
                                <p><?=$data['s_position']?></p>
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
<section class="home_3">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Steel Connect - Where India's Steel Industry Meets Chhattisgarh's Potential.</h1>
            </div>
        </div>
    </div>
</section>
<?php require('./includes/footer.php') ?>
<?php require('./includes/script.php') ?>