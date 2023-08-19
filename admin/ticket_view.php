<?php
include('authentication.php');
require('includes/header.php');
require('includes/topbar.php');
require('includes/sidebar.php');
require('config/dbcon.php');

$ids = $_GET['id'];

$sql = "SELECT * from  ticket_tbl where tic_id ='$ids'";

$result = mysqli_query($con, $sql);

$data1 = mysqli_fetch_assoc($result);

?>

<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <!-- <div class="card-header" id="Hotel_bill" style="display:none;">
                        <h1 style="text-align:center; font-size:2rem; " >Hotel Bill</h1>
                        </div> -->
                        <div class="card-header " id="back_btn">
                            Ticket Detail
                            <a href="ticket.php" id="back_btn" class="btn btn-danger float-right">Back</a>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-3">
                                <label for="">Name</label>
                                    <h6><?php echo $data1['tic_name'] ?></h6>
                                </div>
                                <div class="col-md-3">
                                <label for="">Price</label>
                                    <h6><?php echo $data1['tic_price'] ?></h6>
                                </div>
                                <div class="col-md-3">
                                <label for="">GST</label>
                                    <h6><?php echo $data1['tic_gst'] ?></h6>
                                </div>
                                <div class="col-md-3">
                                <label for="">Color</label>
                                    <h6><?php echo $data1['tic_color'] ?></h6>
                                </div>
                                <div class="col-md-12">
                                    <label for="">Description</label>
                                    <h6><?php echo $data1['tic_text'] ?></h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<!-- <script>
    function pri(){
        document.getElementById('back_btn').style.display ="none";
        document.getElementById('footer').style.display ="none";
        document.getElementById('Hotel_bill').style.display ="block";
        document.getElementById('print_btn').style.display ="none";
        window.print();
    }
</script> -->
<?php require('includes/script.php'); ?>
<?php require('includes/footer.php'); ?>