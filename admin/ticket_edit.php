<?php
include('authentication.php');
require('includes/header.php');
require('includes/topbar.php');
require('includes/sidebar.php');
require('config/dbcon.php');
?>
<div class="content-wrapper">


    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Update Tickets</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item active">Tickets</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>


    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <form action="ticket_code.php" method="POST" >
                        <div class="modal-body">
                            <?php
                            if (isset($_GET['id'])) {
                                $id = $_GET['id'];
                                $query = "SELECT * FROM ticket_tbl WHERE tic_id ='$id' LIMIT 1";
                                $qurey_run = mysqli_query($con, $query);
                                if (mysqli_num_rows($qurey_run) > 0) {
                                    foreach ($qurey_run as $row) {
                            ?>
                                        <input type="hidden" name="id" value=" <?php echo $row['tic_id'] ?>">

                                        <div class="form-group">
                                            <label for="">Ticket Name</label>
                                            <input type="text" name="name" value="<?= $row['tic_name'] ?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Ticket Price</label>
                                            <input type="text" name="price" value="<?= $row['tic_price'] ?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Ticket GST</label>
                                            <input type="text" name="gst" value="<?= $row['tic_gst'] ?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Status</label>
                                            <select name="status" class="form-control" required>
                                                <option value="1" <?php
                                                                    if ($row['tic_status'] == 1) {
                                                                        echo "selected";
                                                                    }
                                                                    ?>>Active</option>
                                                <option value="0" <?php
                                                                    if ($row['tic_status'] == 0) {
                                                                        echo "selected";
                                                                    }
                                                                    ?>>Inactive</option>
                                            </select>
                                        </div>
                            <?php
                                    }
                                } else {
                                    echo "No Record Found";
                                }
                            }
                            ?>
                        </div>
                        <button type="submit" name="update_tic" class="btn btn-primary">Update</button>

                    </form>
                </div>

            </div>
        </div>
    </div>
</div>
<?php require('includes/script.php'); ?>
<?php require('includes/footer.php'); ?>