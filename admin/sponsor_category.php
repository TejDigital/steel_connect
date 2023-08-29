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
                    <h1 class="m-0 text-dark">Categories</h1>
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



    <div class="modal fade" id="delete_cat_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Delete Sponsor Category</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="sponsor_code.php" method="POST">
                    <div class="modal-body">
                        <input type="hidden" name="delete_cat_id" class="delete_cat_id">
                        <p>Are you sure , you want to delete this data ?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" name="delete_cat" class="btn btn-danger">Yes,Delete.!</button>
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
                            echo "<script>alert('".$_SESSION['steel_msg'] ."')</script>";
                            unset($_SESSION['steel_msg']);
                        }
                        ?>
                        <div class="card-header">
                            <h3 class="card-title">Categories</h3>
                        </div>
                        <div class="card-body ">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Categories</th>
                                        <th>Status</th>
                                        <th colspan="2" class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $query = "SELECT * FROM sponsor_category";
                                    $db_query_connect = mysqli_query($con, $query);
                                    $count = 0;
                                    if ($row = mysqli_num_rows($db_query_connect) > 0) {
                                        while ($row = mysqli_fetch_assoc($db_query_connect)) {
                                    ?>
                                            </tr>
                                            <td><?= ++$count ?></td>
                                            <td><?= $row['cat_name'] ?></td>
                                            <td>
                                                <?php
                                                if ($row['cat_status'] == "1") {
                                                    echo "Active";
                                                } elseif ($row['cat_status'] == "0") {
                                                    echo "inactive";
                                                } else {
                                                    echo "invailid";
                                                }
                                                ?>
                                            </td>
                                            <td>
                                                <a href=sponsor_category_edit.php?id=<?php echo $row['cat_id']; ?> class='btn btn-primary btn-sm '><i class="fa-solid fa-pen-to-square"></i></a>
                                            </td>
                                            <td>
                                                <button type='button' value=<?php echo $row['cat_id']; ?> class='btn btn-danger delete_cat btn-sm my-1'><i class="fa-solid fa-trash"></i></button>
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
                            <!-- <h4 class="text-dark">Upload Category</h4> -->
                            <form action="sponsor_code.php" method="post">
                                <label for="">Add Category Name</label>
                                <input class="form-control  m-0" type="text" name="cat_name" placeholder="enter category">
                                <label for="">Status</label>
                                <select class="form-control" name="status" class="py-2" >
                                    <option value="1">Active</option>
                                    <option value="0">inactive</option>
                                </select>

                                <button type="submit" class="btn btn-info my-2 w-100 " name="add" >Add</button>
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