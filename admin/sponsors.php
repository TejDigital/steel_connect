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
                    <h1 class="m-0 text-dark">Sponsors</h1>
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

    <div class="modal fade" id="delete_spo_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Delete Sponsor</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="sponsor_code.php" method="POST">
                    <div class="modal-body">
                        <input type="hidden" name="delete_spo_id" class="delete_spo_id">
                        <p>Are you sure , you want to delete this data ?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" name="delete_spo" class="btn btn-danger">Yes,Delete.!</button>
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
                                        <th>Sponsor Image</th>
                                        <th>Status</th>
                                        <th>Category</th>
                                        <!-- <th>Message</th> -->
                                        <!-- <th>File</th> -->
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $query = "SELECT * FROM sponsors_tbl left join sponsor_category ON sponsors_tbl.spo_cat_id =  sponsor_category.cat_id ORDER BY spo_created_at DESC";
                                    $db_query_connect = mysqli_query($con, $query);
                                    $count = 1;
                                    if (mysqli_num_rows($db_query_connect) > 0) {
                                        foreach ($db_query_connect as $filds) {
                                    ?>
                                            </tr>
                                            <td><?= $count++ ?></td>
                                            <td><?= $filds['spo_img'] ?></td>
                                            <td>
                                                <?php
                                                if ($filds['spo_status'] == "1") {
                                                    echo "Active";
                                                } elseif ($filds['spo_status'] == "0") {
                                                    echo "inactive";
                                                } else {
                                                    echo "invailid";
                                                }
                                                ?>
                                            </td>
                                            <td><?= $filds['cat_name'] ?></td>
                                            <td>
                                                <a href=sponsor_edit.php?id=<?php echo $filds['spo_id']; ?> class='btn btn-info btn-sm '>Edit</a>
                                                <button type='button' value=<?php echo $filds['spo_id']; ?> class='btn btn-danger delete_spo_btn btn-sm my-1'>Delete</button>
                                                <!-- <a href=cus_details.php?cus_id=<?php echo $filds['spo_id']; ?> class='btn btn-info btn-sm'> View</a> -->
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
                        <?php
                        $sql2 = "SELECT * FROM sponsor_category";
                        $query2 = mysqli_query($con,$sql2);

                        ?>
                        <div class="card-body">
                            <h4 class="text-dark">Upload Sponsor Image</h4>
                            <form action="sponsor_code.php" method="post" enctype="multipart/form-data">
                                <label for="">Choose Image</label>
                                <br>
                                <input class="form-control p-0 m-0" name="img_upl" type="file" style="width:100%;">
                                <label for="">Category</label>
                                <select class="form-control" name="spo_category" id="" class="py-2">
                                    <option value="">Select Here</option>
                                    <?php
                                    if(mysqli_num_rows($query2)){
                                        while($data=mysqli_fetch_assoc($query2)){

                                     
                                    ?>
                                    <option  value="<?=$data['cat_id']?>"><?=$data['cat_name']?></option>
                                    <?php
                                       }
                                    }
                                    ?>
                                </select>
                                <label for="">Status</label>
                                <select class="form-control" name="status" id="" class="py-2">
                                    <option value="1">active</option>
                                    <option value="0">inactive</option>
                                </select>
                                <button type="submit" class="btn btn-info my-2 w-100 " name="spo_add">Upload</button>
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
        $('.delete_spo_btn').click(function(e) {
            e.preventDefault();
            var img_id = $(this).val();
            // console.log(user_id);
            $('.delete_spo_id').val(img_id);
            $('#delete_spo_modal').modal('show');
        });
    });
</script>
<?php require('includes/footer.php'); ?>