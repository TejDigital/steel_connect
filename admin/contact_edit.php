<?php
include('authentication.php');
require('includes/header.php');
require('includes/topbar.php');
require('includes/sidebar.php');
require('config/dbcon.php');
?>
<div class="content-wrapper">
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
                    <h1 class="m-0 text-dark">Contact Us</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item active">Contact</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>



    <div class="modal fade" id="delete_msg_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Delete Category</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="category_code.php" method="POST">
                    <div class="modal-body">
                        <input type="hidden" name="delete_msg_id" class="delete_msg_id">
                        <p>Are you sure , you want to delete this data ?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" name="delete_msg" class="btn btn-danger">Yes,Delete.!</button>
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
                            <h3 class="card-title">Messages</h3>
                        </div>
                        <div class="card-body ">
                        <form action="connect.php" method="post">
                            <?php
                            if(isset($_GET['cus_id'])){
                            $id = $_GET['cus_id'];
                            $sql = "SELECT * FROM contact_tbl WHERE id='$id'";
                            $query = mysqli_query($con,$sql);
                            $row = mysqli_fetch_assoc($query);
                            ?>
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12 col-lg-12">
                                                <input type="hidden" name="cus_id" value="<?= $row['id']?>">
                                                <input name="name" class="form-control mb-1" value="<?=$row['name']?>"  type="text" placeholder="Your Name...">
                                            </div>
                                            <div class="col-md-12 col-sm-12 col-lg-12">
                                                <input name="email" class="form-control mb-1" value="<?=$row['email']?>"  type="email" placeholder="Email Address">
                                            </div>
                                            <div class="col-md-12 col-sm-12 col-lg-12">
                                                <input name="subject" class="form-control mb-1" value="<?=$row['subject']?>" type="text" placeholder="Add Subject Here..." readonly>
                                            </div>
                                            <div class="col-md-12 col-sm-12 col-lg-12">
                                                <textarea name="message" class="form-control mb-1" placeholder="Your Message Goes Here"><?=$row['messages']?></textarea>
                                            </div>
                                            <div class="col-md-12 col-sm-12 col-lg-12">
                                                <button type="submit" class="btn btn-primary" name="update_cus" class="theme-btn brd-rd5">Submit Now</button>
                                            </div>
                                        </div>
                                        <?php
                                        }
                                        ?>
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
        $('.delete_cat').click(function(e) {
            e.preventDefault();
            var user_id = $(this).val();
            // console.log(user_id);
            $('.delete_cat_id').val(user_id);
            $('#delete_cat_modal').modal('show');
        });
    });
</script>
<?php require('includes/footer.php'); ?>