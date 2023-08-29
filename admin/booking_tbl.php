<?php
include('authentication.php');
require('includes/header.php');
require('includes/topbar.php');
require('includes/sidebar.php');
require('config/dbcon.php');
?>
<div class="content-wrapper" style="overflow-x: hidden;">
    <?php
    if (isset($_SESSION['alert_msg'])) {
    ?>
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Hey!</strong> <?php echo $_SESSION['alert_msg'] ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php
        unset($_SESSION['alert_msg']);
    }
    ?>
    <?php
    if (isset($_SESSION['auth_msg'])) {
    ?>
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Hey!</strong> <?php echo $_SESSION['auth_msg'] ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php
        unset($_SESSION['auth_msg']);
    }
    ?>
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Booking Detail</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item active">Steel Connect</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="delete_book_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Booking Customer</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="ticket_booking.php" method="POST">
                    <div class="modal-body">
                        <input type="hidden" name="delete_book_id" class="delete_book_id">
                        <p>Are you sure , you want to delete this data ?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" name="delete_book" class="btn btn-danger">Yes,Delete.!</button>
                    </div>
                </form>
            </div>
        </div>
    </div>



    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <?php
                        if (isset($_SESSION['steel_msg'])) {
                            echo "<script>alert('".$_SESSION['steel_msg'] ."')</script>";
                            unset($_SESSION['steel_msg']);
                        }
                        ?>
                        <div class="card-header">
                            <h3 class="card-title"></h3>
                            <!-- <input type="search" class="float-right input-group-text mx-2" placeholder="Search By Name"> -->
                        </div>
                        <div class="card-body ">
                            <table id="example1" class="  table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>S.No.</th>
                                        <th>Name</th>
                                        <th>Phone</th>
                                        <th>Email</th>
                                        <th>Ticket number</th>
                                        <th>Ticket Price</th>
                                        <th colspan="2" class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $query = "SELECT * FROM confirm_ticket_tbl ORDER BY created_at DESC";
                                    $db_query_connect = mysqli_query($con, $query);
                                    $count = 1;
                                    if (mysqli_num_rows($db_query_connect) > 0) {
                                        foreach ($db_query_connect as $filds) {
                                    ?>
                                            </tr>
                                            <td><?= $count ++ ?></td>
                                            <td><?= $filds['name']?></td>
                                            <td><?= $filds['mobile']?></td>
                                            <td><?= $filds['email']?></td>
                                            <td><?= $filds['tic_number']?></td>
                                            <td><?= $filds['tic_price']?></td>
                                            <td class="text-center">
                                                <!-- <a href=delegate_edit.php?img_id=<?php echo $filds['id']; ?> class='btn btn-info btn-sm '>Edit</a> -->
                                                <!-- <a href=booking_details.php?cus_id=<?php echo $filds['id']; ?> class='btn btn-info btn-sm text-center'> View</a> -->
                                                <button type='button' value=<?php echo $filds['id']; ?> class='btn btn-danger delete_book_btn btn-sm my-1'><i class="fa-solid fa-trash"></i></button>
                                            </td>
                                            </tr>
                                    <?php
                                        }
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<?php require('includes/script.php'); ?>
<script>
    // -----------------------delete------------------------
    $(document).ready(function() {
        $('.delete_book_btn').click(function(e) {
            e.preventDefault();
            var img_id = $(this).val();
            // console.log(user_id);
            $('.delete_book_id').val(img_id);
            $('#delete_book_modal').modal('show');
        });
    });
</script>
<?php require('includes/footer.php'); ?>