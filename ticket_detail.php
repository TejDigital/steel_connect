<?php require('./includes/header.php');
require('./admin/config/dbcon.php');

?>
<section class="top_hero">
    <div class="img">
        <img src="./images/about_bg_1.png" alt="">
    </div>
    <div class="text">
        <h1>Tickets</h1>
        <p><span><a href="./index.php">Home</a></span>
            << Tickets Details </p>
    </div>
</section>
<section class="ticket_detail">
    <div class="container">
        <div class="row">
            <div class="col-md-4"></div>
            <?php
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                $sql = "SELECT * FROM ticket_tbl WHERE tic_id = '$id' LIMIT 1";
                $query = mysqli_query($con, $sql);
                if (mysqli_num_rows($query) > 0) {
                    foreach($query as $result) {
                        $gstRate = $result['tic_gst'] / 100; 
                        $ticketPrice = $result['tic_price'];

                        $gstAmount = $ticketPrice * $gstRate;
                        
                        $totalAmount = $ticketPrice + $gstAmount;
                        
                       
            ?>
                        <div class="col-md-4">
                            <form action="./admin/ticket_booking.php" method="post">
                                <div class="box">
                                    <h1>Ticket <span>></span> Information <span>></span> Payment</h1>
                                    <div class="text_1 text_flex">
                                        <p>Ticket Type</p>
                                        <p>EARLY DELEGATE</p>
                                    </div>
                                    <div class="text_2 text_flex">
                                        <p>Ticket Number - <span>0011</span></p>
                                        <p><span>₹</span><?=$totalAmount?></p>
                                    </div>
                                    <div class="text_3 text_flex">
                                        <p>Subtotal</p>
                                        <p><span>₹</span><?= $result['tic_price'] ?>.00</p>
                                    </div>
                                    <div class="text_4 text_flex">
                                        <p>GST</p>
                                        <p><?= $result['tic_gst'] ?><span>%</span></p>
                                    </div>
                                    <div class="text_5 text_flex">
                                        <p>Total </p>
                                        <p><span>₹</span><?=$totalAmount?></p>
                                    </div>

                                    <div class="contact">
                                        <h2>Contact</h2>
                                        <input type="hidden" name="tol_price" value="<?=$totalAmount?>">
                                        <div class="form-group">
                                            <input type="text" class="input_area" name="name" placeholder="Name">
                                        </div>
                                        <div class="form-group">
                                            <input type="Number" class="input_area" name="number" placeholder="Contact Number">
                                        </div>
                                        <div class="form-group">
                                            <input type="email" class="input_area" name="email" placeholder="Email Address">
                                        </div>

                                        <div class="form-group">
                                            <input type="checkbox" class="input_check" name="check"> <span>Keep me updated about the Steel Trade Event</span>
                                        </div>

                                        <div class="form-group">
                                            <button type="submit" name="booked" class="btn1">Continue to Book</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
            <?php
                    }
                }
            }
            ?>
            <div class="col-md-4"></div>
        </div>
    </div>
</section>
<?php require('./includes/footer.php') ?>
<?php require('./includes/script.php') ?>