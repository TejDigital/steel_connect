<?php
 session_start();
 require('./includes/header.php');
 require('./admin/config/dbcon.php');
 ?>
<section class="top_hero">
    <div class="img">
        <img src="./images/about_bg_1.png" alt="">
    </div>
    <div class="text">
        <h1>Contact Us</h1>
        <p><span><a href="./index.php">Home</a></span>
            << Contact Us</p>
    </div>
</section>
<section class="home_register">
    <div class="container">
        <div class="text">
            <h1>Contact</h1>
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
                                <input type="text" name="name" placeholder="Your name" class="input_area"  onkeypress="return (event.charCode > 64 && 
                              event.charCode < 91) || (event.charCode > 96 && event.charCode < 123 || event.charCode == 32)">
                            </div>
                            <div class="input_box">
                            <span id="msg_alert1" style="color:red;"></span>
                                <input type="tel" maxlength="10" onkeyup="validateNumber(this,'msg_alert1')" name="phone" placeholder="Your Contact Number" class="input_area">
                            </div>
                            <div class="input_box">
                                <input type="email" name="email" placeholder="Your Email Address" class="input_area">
                            </div>
                            <div class="input_box">
                                <input type="text" name="address" placeholder="Your Address" class="input_area">
                            </div>
                            <div class="input_box">
                                <select name="select_opt" id="" class="input_area">
                                    <option value="SELECT">SELECT</option>
                                    <option value="DELEGATE">DELEGATE</option>
                                    <option value="EXHIBITION">EXHIBITION</option>
                                    <option value="Other">Other</option>
                                </select>
                            </div>
                            <div class="input_box">
                                <textarea name="message" class="input_area" id="" cols="30" rows="5"></textarea>
                            </div>
                            <div class="sub_btn">
                                <button type="submit" name="submit" class="btn1">Submit Form</button>
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
                        <p><a href="tel:8085485778"><span>+918085485778 </span> <b class="name"> Rohit Kumar Burman (For Exhibition)</b></a></p>
                        <p><a href="tel:8319619939">+918319619939  <b class="name"> Amit Kumar (For Sponsorship & Exhibition)</b></a></p>
                        <p><a href="tel:8602143123">+918602143123  <b class="name">Sandeep Kumar (For Delegates)</b></a></p>
                    </div>
                </div>
            </div>
       
            <div class="col-md-4 p-2">
                <div class="box">
                    <div class="icon">
                        <a href="#!"><i class="fa-solid fa-location-dot"></i></a>
                    </div>
                    <div class="text">
                        <p><a onclick="myloc()" style="cursor: pointer;">Office No 40, Palika Bazar, Bhilai, Dist : Durg (Chhattisgarh)</a></p>
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
        </div>
    </div>
</section>
<?php require('./includes/footer.php') ?>
<?php require('./includes/script.php') ?>