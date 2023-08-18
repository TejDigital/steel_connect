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
            << Tickets </p>
    </div>
</section>
<section class="tickets">
    <?php
    // $sql = "SELECT * FROM ticket_tbl where tic_status = '1'";
    // $query = mysqli_query($con, $sql);
    // $data = mysqli_fetch_assoc($query);

    // $query = "SELECT * FROM `ticket_tbl`";
  
  // FETCHING DATA FROM DATABASE
//   $result = $con->query($query);
  
//     if ($result->num_rows > 0) 
//     {
//         // OUTPUT DATA OF EACH ROW
//         while($row = $result->fetch_assoc())
//         {
//             // echo "Roll No: " .
//                 $row["color"]. " red: " .
//                 // $row["Name"]. " | City: " . 
//                 // $row["City"]. " | Age: " . 
//                 // $row["Age"]. "<br>";
//                 // print_r( $row);
//         }
//     } 
    

    // $data[0]['color'] = "red";
    // $data[1]['color'] = "blue";
    // $data[2]['color'] = "green";

    // $data[0]['text'] = "<span> Limited offer:</span>Exclusive Early Arrival Delegate package for the first 50 attendees at a discounted rate, with all event benefits";
    // $data[1]['text'] = " For <span>exhibitors:</span> Choose the Per Exhibition package for dedicated space, branding, and event access.";
    // $data[2]['text'] = "<span>Attendees:</span> Secure your spot with the Per Delegate package for access to sessions, networking, and more";

    // echo "<pre>";
    // print_r( $data['tic_name'] );
    // echo "<pre>";
   
    // $sql1 = "SELECT * FROM ticket_tbl where tic_id = '1'";
    // $query1 = mysqli_query($con, $sql1);
    // $data1 = mysqli_fetch_assoc($query1);

    // $sql2 = "SELECT * FROM ticket_tbl where tic_id = '2'";
    // $query2 = mysqli_query($con, $sql2);
    // $data2 = mysqli_fetch_assoc($query2);

    // $sql3= "SELECT * FROM ticket_tbl where tic_id = '3'";
    // $query3 = mysqli_query($con, $sql3);
    // $data3 = mysqli_fetch_assoc($query3);

    ?>
            <div class="container">
                <div class="text">
                    <h1>Tickets</h1>
                    <b></b>
                    <p>Secure your spot at Steel Connect - the ultimate networking event for the iron and steel industry.</p>
                </div>
                <div class="row">
                    <?php
                 $sql = "SELECT * FROM ticket_tbl where tic_status = '1'";
     $query = mysqli_query($con, $sql);
     if(mysqli_num_rows($query)){
        while($data = mysqli_fetch_assoc($query)){


   
     ?>
                    <!-- <div class="col-md-12 box_area_1 p-1">
                        <div class="box box_1">
                            <div class="head">
                                <div class="img">
                                    <img src="./images/logo_1.svg" alt="">
                                </div>
                                <div class="head_text">
                                    <p class="m-0">PER</p>
                                    <p class="m-0"></p>
                                </div>
                            </div>
                            <div class="body_text">
                                <p>.</p>
                                <div class="pricing">
                                    <div class="price m-0">
                                        <p class="">₹</p>
                                        <p class="">*</p>
                                    </div>
                                    <p class="gdt m-0"> + % GST</p>
                                </div>
                                <div class="foot_text">
                                    <a href="#!">Buy now</a>
                                </div>
                            </div>
                        </div>
                    </div> -->
                    <div class="col-md-6 p-1 box_area_1">
                        <div class="box ">
                            <div class="head" style="background-color:<?=$data['tic_color']?>">
                                <div class="img">
                                    <img src="./images/logo_1.svg" alt="">
                                </div>
                                <div class="head_text">
                                    <p class="m-0">PER</p>
                                    <p class="m-0"><?= $data['tic_name'] ?></p>
                                </div>
                            </div>
                            <div class="body_text">
                                <p>
                                <?= $data['tic_text'] ?>
                                </p>
                                <div class="pricing">
                                    <div class="price m-0">
                                        <p class="">₹</p>
                                        <p class=""><?= $data['tic_price'] ?>*</p>
                                    </div>
                                    <p class="gdt m-0"> + <?= $data['tic_gst'] ?>% GST</p>
                                </div>
                                <div class="foot_text">
                                    <a href="./ticket_detail.php?id=<?=$data['tic_id']?>">Buy now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                      }
                    }
                    ?>
                    <!-- <div class="col-md-6  p-1 box_area_1">
                        <div class="box box_3">
                            <div class="head">
                                <div class="img">
                                    <img src="./images/logo_1.svg" alt="">
                                </div>
                                <div class="head_text">
                                    <p class="m-0">PER</p>
                                    <p class="m-0"></p>
                                </div>
                            </div>
                            <div class="body_text">
                                <p> </p>
                                <div class="pricing">
                                    <div class="price m-0">
                                        <p class="">₹</p>
                                        <p class="">*</p>
                                    </div>
                                    <p class="gdt m-0"> + % GST</p>
                                </div>
                                <div class="foot_text">
                                    <a href="#!">Buy now</a>
                                </div>
                            </div>
                        </div>
                    </div> -->
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
<section class="ticket_end">
    <div class="container">
        <div class="head_text">
            <h1>Exhibitor Benefits</h1>
            <b></b>
            <p>Elevating Your Presence at Steel Connect</p>
        </div>
        <div class="body_text">
            <p class="mb-5">As an exhibitor at Steel Connect, you're at the forefront of the event, and we're dedicated to ensuring that your participation yields exceptional advantages. Here's what you can anticipate as an exhibitor:
            </p>
            <div class="row mb-3">
                <div class="col-md-6">
                    <div class="mini_text">
                        <h3>Strategic Visibility:</h3>
                        <p>Present your brand prominently in a dedicated 6x6 size stall, fully equipped with a table and chairs for 2+3 individuals.</p>
                        <p> Leverage your stall's strategic location for optimal exposure to event attendees.</p>
                    </div>
                    <div class="mini_text">
                        <h3>Product Showcase:</h3>
                        <p>Showcase your products and services in a dedicated space, allowing direct interactions with potential clients and partners.</p>
                        <p>Conduct impactful product demonstrations and presentations to highlight your offerings' unique features.</p>
                    </div>
                    <div class="mini_text">
                        <h3>Comfort and Convenience:</h3>
                        <p>Enjoy the convenience of seamless logistics assistance, ensuring smooth transportation from the airport to the venue.</p>
                        <p>Experience comfortable accommodation on a twin-share basis during the event.</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mini_text">
                        <h3>Engage with Industry Leaders:</h3>
                        <p>Network with a diverse audience of manufacturers, traders, wholesalers, and industry professionals, fostering valuable connections.</p>
                    </div>
                    <div class="mini_text">
                        <h3>Brand Promotion:</h3>
                        <p>Gain recognition through exhibitor listings on event signage and materials, further amplifying your brand's presence.
                        </p>
                        <p>Utilize complimentary ad space in the event's E-Book to maximize your brand's visibility</p>
                    </div>
                    <div class="mini_text">
                        <h3>Access to Attendee Data:</h3>
                        <p>Obtain insights by accessing a complete list of event attendees, facilitating post-event engagement and collaboration.</p>
                    </div>
                    <div class="mini_text">
                        <h3>Early Advantage:</h3>
                        <p>Benefit from the option to secure your spot with the Early Arrival Delegate package at a discounted rate.</p>
                    </div>
                </div>
                <div class="mini_footer_text">
                    <p>
                        Being an exhibitor at Steel Connect empowers you to position your brand prominently, engage with key players, and drive business growth. This is your opportunity to shine in the Iron and Steel sector.
                    </p>
                    <p><span>For more detailed information on our exhibitor packages, please refer to the attached proposal or reach out to us directly.Thank you for considering this enriching opportunity.</span></p>
                </div>
            </div>
        </div>
        <div class="foot_text">
            <a href="./contact.php">Contact Us</a>
        </div>
    </div>
</section>
<?php require('./includes/footer.php') ?>
<?php require('./includes/script.php') ?>