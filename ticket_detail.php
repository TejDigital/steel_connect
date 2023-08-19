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
        <h1>Tickets</h1>
        <p><span><a href="./index.php">Home</a></span>
            << Tickets Details </p>
    </div>
</section>
<section class="ticket_detail">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3"></div>
            <?php
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                $sql = "SELECT * FROM ticket_tbl WHERE tic_id = '$id' LIMIT 1";
                $query = mysqli_query($con, $sql);
                if (mysqli_num_rows($query) > 0) {
                    foreach ($query as $result) {
                        $gstRate = $result['tic_gst'] / 100;
                        $ticketPrice = $result['tic_price'];

                        $gstAmount = $ticketPrice * $gstRate;

                        $totalAmount = $ticketPrice + $gstAmount;
                        // Get the ticket type ID from the URL parameter
                     

                        // Check if the ticket number for this ticket type is already generated and stored in the session
                        if (!isset($_SESSION['ticket_numbers'][$id])) {
                            // Generate a random 4-digit ticket number
                            $ticketNumber = str_pad(mt_rand(1, 9999), 4, '0', STR_PAD_LEFT);

                            // Store the ticket number in the session, associated with the ticket type ID
                            $_SESSION['ticket_numbers'][$id] = $ticketNumber;
                        } else {
                            // Retrieve the stored ticket number for this ticket type from the session
                            $ticketNumber = $_SESSION['ticket_numbers'][$id];
                        }




            ?>
                        <div class="col-md-6">
                            <form action="./admin/ticket_booking.php" method="post">
                                <div class="box">
                                    <h1>Ticket <span>></span> Information <span>> Payment</span></h1>
                                    <div class="text_1 text_flex">
                                        <p>Ticket Type</p>
                                        <p>EARLY DELEGATE</p>
                                    </div>
                                    <div class="text_2 text_flex">
                                        <p>Ticket Number - <span><?= $ticketNumber ?></span></p>
                                        <p><span>₹</span><?= $totalAmount ?></p>
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
                                        <p><span>₹</span><?= $totalAmount ?></p>
                                    </div>

                                    <div class="contact">
                                        <h2>Contact</h2>
                                        <input type="hidden" name="tol_price" value="<?= $totalAmount ?>">
                                        <input type="hidden" name="tic_number" value="<?= $ticketNumber ?>">
                                        <div class="form-group">
                                            <input type="text" class="input_area" name="name" placeholder="Name">
                                        </div>
                                        <div class="form-group">
                                            <p id="msg_alert3" style="color:red;"></p>
                                            <input type="tel" maxlength="10" onkeyup="validateNumber(this,'msg_alert3')" class="input_area" name="number" placeholder="Contact Number">
                                        </div>
                                        <div class="form-group">
                                            <input type="email" class="input_area" name="email" placeholder="Email Address">
                                        </div>

                                        <div class="form-group flex_box">
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
            <div class="col-md-3"></div>
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