<?php require('./includes/header.php');
require('./admin/config/dbcon.php');

 ?>
<section class="top_hero">
    <div class="img">
        <img src="./images/about_bg_1.png" alt="">
    </div>
    <div class="text">
        <h1>Exhibitor</h1>
        <p><span><a href="./index.php">Home</a></span>
            << Exhibitor </p>
    </div>
</section>
<section class="gallery_slick">
    <div class="container">
        <div class="head_text">
            <h1>Our Exhibitors</h1>
            <b></b>
            <p>Browse Through a Visual Journey</p>
        </div>
        <div class="row p-0 m-0">
            <div class="col-md-12">
                <div id="page">
                    <div class="row">
                        <div class="column small-11 small-centered">
                            <div class="slider slider-single">
                                <?php
                                $sql = "SELECT * FROM img_tbl WHERE status = '1'";
                                $query = mysqli_query($con, $sql);

                                if (mysqli_num_rows($query)) {
                                    while ($data = mysqli_fetch_assoc($query)) {
                                ?>
                                        <div class="img">
                                            <img src="./admin/admin_img_upload/<?= $data['img_name'] ?>" alt="">
                                        </div>

                                <?php
                                    }
                                }
                                ?>
                                <!-- <div class="img">
                                    <img src="images/gallery_1.png" alt="">
                                </div>
                                <div class="img">
                                <img src="images/gallery_2.png" alt="">
                                </div>
                                <div class="img">
                                <img src="images/gallery_3.png" alt="">
                                </div>
                                <div class="img">
                                <img src="images/gallery_4.png" alt="">
                                </div>
                                <div class="img">
                                <img src="images/gallery_3.png" alt="">
                                </div>
                                <div class="img">
                                <img src="images/gallery_2.png" alt="">
                                </div> -->
                            </div>
                            <div class="slider slider-nav mt-2">
                                <?php
                                $sql = "SELECT * FROM img_tbl WHERE status = '1'";
                                $query = mysqli_query($con, $sql);

                                if (mysqli_num_rows($query)) {
                                    while ($data = mysqli_fetch_assoc($query)) {
                                ?>
                                        <div class="img_nav">
                                            <img src="./admin/admin_img_upload/<?= $data['img_name'] ?>" alt="">
                                            <p class="text-center"><?=$data['exhibitor_name']?></p>
                                        </div>

                                <?php
                                    }
                                }
                                ?>
                                <!-- <div class="img_nav">
                                <img src="images/gallery_1.png" alt="">
                                </div>
                                <div class="img_nav">
                                <img src="images/gallery_2.png" alt="">
                                </div>
                                <div class="img_nav">
                                <img src="images/gallery_3.png" alt="">
                                </div>
                                <div class="img_nav">
                                <img src="images/gallery_4.png" alt="">
                                </div>
                                <div class="img_nav">
                                <img src="images/gallery_3.png" alt="">
                                </div>
                                <div class="img_nav">
                                <img src="images/gallery_2.png" alt="">
                                </div> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php require('./includes/footer.php') ?>
<?php require('./includes/script.php') ?>