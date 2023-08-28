<?php
include('authentication.php');
require('includes/header.php');
require('includes/topbar.php');
require('includes/sidebar.php');
require('config/dbcon.php');

$ids = $_GET['cus_id'];

$sql = "SELECT * from  confirm_ticket_tbl where id ='$ids'";

$result = mysqli_query($con, $sql);

$data1 = mysqli_fetch_assoc($result);

?>

<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                       
                        <div class="card-header " id="back_btn">
                            Person Detail
                            <a href="booking_tbl.php" id="back_btn" class="btn btn-danger float-right">Back</a>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-2">
                                <label for="">Name</label>
                                    <h6><?php echo $data1['name'] ?></h6>
                                </div>
                                <div class="col-md-2">
                                <label for="">Phone</label>
                                    <h6><?php echo $data1['mobile'] ?></h6>
                                </div>
                                <div class="col-md-2">
                                <label for="">Email</label>
                                    <h6><?php echo $data1['email'] ?></h6>
                                </div>
                                <div class="col-md-2">
                                <label for="">Ticket Price</label>
                                    <h6><?php echo $data1['tic_price'] ?></h6>
                                </div>
                                <div class="col-md-2">
                                    <label for="">Ticket Number</label>
                                    <h6><?php echo $data1['tic_number'] ?></h6>
                                </div>
                                <!-- <div class="col-md-6">
                                    <label for="">Messages</label>
                                    <h6><?php echo $data1['message'] ?></h6>
                                </div> -->
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