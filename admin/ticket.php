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
                    <h1 class="m-0 text-dark">Tickets</h1>
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

    <div class="modal fade" id="delete_tic_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Delete Sponsor</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="ticket_code.php" method="POST">
                    <div class="modal-body">
                        <input type="hidden" name="delete_tic_id" class="delete_tic_id">
                        <p>Are you sure , you want to delete this data ?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" name="delete_tic" class="btn btn-danger">Yes,Delete.!</button>
                    </div>
                </form>
            </div>
        </div>
    </div>



    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    <div class="card">
                        <?php
                        if (isset($_SESSION['steel_msg'])) {
                            echo "<script>alert('" . $_SESSION['steel_msg'] . "')</script>";
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
                                        <th>Ticket name</th>
                                        <th>Ticket Price</th>
                                        <th>Ticket GST</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $query = "SELECT * FROM ticket_tbl  ORDER BY tic_created_at DESC";
                                    $db_query_connect = mysqli_query($con, $query);
                                    $count = 1;
                                    if (mysqli_num_rows($db_query_connect) > 0) {
                                        foreach ($db_query_connect as $filds) {
                                    ?>
                                            </tr>
                                            <td><?= $count++ ?></td>
                                            <td><?= $filds['tic_name'] ?></td>
                                            <td><?= $filds['tic_price'] ?></td>
                                            <td><?= $filds['tic_gst'] ?></td>
                                            <td>
                                                <?php
                                                if ($filds['tic_status'] == "1") {
                                                    echo "Active";
                                                } elseif ($filds['tic_status'] == "0") {
                                                    echo "inactive";
                                                } else {
                                                    echo "invailid";
                                                }
                                                ?>
                                            </td>

                                            <td>
                                                <a href=ticket_edit.php?id=<?php echo $filds['tic_id']; ?> class='btn btn-info btn-sm '><i class="fa-solid fa-pen-to-square"></i></a>
                                                <button type='button' value=<?php echo $filds['tic_id']; ?> class='btn btn-danger delete_tic_btn btn-sm my-1'><i class="fa-solid fa-trash"></i></button>
                                                <a href=ticket_view.php?id=<?php echo $filds['tic_id']; ?> class='btn btn-info btn-sm'><i class="fa-regular fa-eye"></i></a>
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
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="text-dark">Upload Tickets</h4>
                            <form action="ticket_code.php" method="post">

                                <label for="">Ticket name</label>
                                <input type="text" name="name" class="form-control" placeholder="Ticket name">

                                <label for="">Ticket Price</label>
                                <input type="number" name="price" class="form-control" placeholder="Ticket price">

                                <label for="">Ticket GST</label>
                                <input type="number" name="gst" class="form-control" placeholder="Ticket GST">

                                <label for="">Ticket COlor</label>
                                <input type="text" name="color" class="form-control" placeholder="Ticket Color">

                                <label for="">Ticket Des</label>
                                <input type="text" name="des" class="form-control" placeholder="Ticket Des">

                                <label for="">Ticket Status</label>
                                <select class="form-control" name="status" id="" class="py-2">
                                    <option value="1">active</option>
                                    <option value="0">inactive</option>
                                </select>

                                <button type="submit" class="btn btn-info my-2 w-100 " name="tic_add">ADD</button>
                            </form>
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
        $('.delete_tic_btn').click(function(e) {
            e.preventDefault();
            var img_id = $(this).val();
            // console.log(user_id);
            $('.delete_tic_id').val(img_id);
            $('#delete_tic_modal').modal('show');
        });
    });
</script>
<?php require('includes/footer.php'); ?>