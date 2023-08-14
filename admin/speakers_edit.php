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
                    <h1 class="m-0 text-dark">Speakers Edit</h1>
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




    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <?php
                        if (isset($_SESSION['steel_msg'])) {
                            echo "<script>alert('" . $_SESSION['steel_msg'] . "')</script>";
                            unset($_SESSION['steel_msg']);
                        }




                        ?>
                        <div class="card-header">
                            <h3 class="card-title">Speakers</h3>
                            <!-- <a href="#" class="btn btn-primary btn-sm float-right" data-toggle="modal" data-target="#addSpeakersmodal">ASpeakers</a> -->
                        </div>
                        <div class="card-body ">
                            <?php
                            if (isset($_GET['id'])) {
                                $speakers_id = $_GET['id'];
                                $query = "SELECT * FROM speakers_tbl where s_id = '$speakers_id'";
                                $sql = mysqli_query($con, $query);
                                if (mysqli_num_rows($sql) > 0) {
                                    foreach ($sql as $result) {
                            ?>
                                        <form action="speakers_code.php" method="POST" enctype="multipart/form-data">
                                            <div class="card-body">
                                                <input type="hidden" name="id" value="<?= $result['s_id'] ?>">

                                                <span><B>Old Image : - </B><?= $result['s_img'] ?></span> <br>
                                                <label for="">Choose Image</label>
                                                <br>
                                                <input class="form-control p-0 m-0" name="new_img" type="file" style="width:100%;">
                                                <input class="form-control p-0 m-0" name="img_old" type="hidden" value="<?= $result['s_img'] ?>">

                                                <label for="">Name</label>
                                                <input type="text" name="name" class="form-control  m-0" placeholder="Enter Full name" value="<?= $result['s_name'] ?>">

                                                <label for="">Position</label>
                                                <input type="text" name="position" class="form-control  m-0" placeholder="Enter Position" value="<?= $result['s_position'] ?>">

                                                <label for="">Status</label>
                                                <select class="form-control" name="status" id="" class="py-2">
                                                    <option <?= ($result['s_status'] == 1) ? "Selected" : ""; ?> value="1">active</option>
                                                    <option <?= ($result['s_status'] == 0) ? "Selected" : ""; ?> value="0">inactive</option>
                                                </select>
                                                <button type="submit" class="btn btn-info my-2" name="update">Update</button>
                                            </div>

                                        </form>
                            <?php
                                    }
                                }
                            }
                            ?>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<?php require('includes/script.php'); ?>
<?php require('includes/footer.php'); ?>