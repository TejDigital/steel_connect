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
                    <h1 class="m-0 text-dark">Update Categories</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item active">Sponsor</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>


    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <form action="sponsor_code.php" method="POST" enctype="multipart/form-data">
                        <div class="modal-body">
                            <?php
                            if (isset($_GET['id'])) {
                                $id = $_GET['id'];
                                $query = "SELECT * FROM sponsors_tbl WHERE spo_id ='$id'LIMIT 1";
                                $qurey_run = mysqli_query($con, $query);
                                if (mysqli_num_rows($qurey_run) > 0) {
                                    foreach ($qurey_run as $row) {
                            ?>
                                        <input type="hidden" name="id" value=" <?php echo $row['spo_id'] ?>">
                                        <div class="form-group">
                                            <label for="">Current Image</label> <br>
                                            <img src="sponsor_images/<?php echo $row['spo_img'] ?>" alt="" width="150px" height="150px" style="background-color: #e0e0e0; padding:1rem;">
                                        </div>

                                        <div class="form-group">
                                            <label for="">New Image</label>
                                            <input type="file" name="new_img" class="form-control">
                                            <input type="hidden" name="img_old" value="<?= $row['spo_img'] ?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Category</label>
                                            <select class="form-control" name="spo_category" id="" class="py-2">
                                                <?php
                                                $sql3 = "SELECT * FROM sponsor_category";
                                                $query3 = mysqli_query($con, $sql3);
                                                if (mysqli_num_rows($query3)) {
                                                    while ($data = mysqli_fetch_assoc($query3)) {
                                                ?>
                                                        <option  value="<?= $data['cat_id'] ?>" <?php if($row['spo_cat_id'] == $data['cat_id']){
                                                            echo"Selected";
                                                        }?>>
                                                        <?= $data['cat_name'] ?>
                                                    </option>
                                                <?php
                                                    }
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Status</label>
                                            <select name="status" class="form-control" required>
                                                <option value="1" <?php
                                                                    if ($row['spo_status'] == 1) {
                                                                        echo "selected";
                                                                    }
                                                                    ?>>Active</option>
                                                <option value="0" <?php
                                                                    if ($row['spo_status'] == 0) {
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
                        <button type="submit" name="update_spo" class="btn btn-primary">Update</button>

                    </form>
                </div>

            </div>
        </div>
    </div>
</div>
<?php require('includes/script.php'); ?>
<?php require('includes/footer.php'); ?>