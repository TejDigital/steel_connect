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
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                                <?php
                                if(isset($_GET['id'])){
                                    $id = $_GET['id'];
                                    $sql = "SELECT * FROM sponsor_category WHERE cat_id = '$id'";
                                    $query = mysqli_query($con,$sql);
                                    if(mysqli_num_rows($query)){
                                        foreach($query as $data){

                              
                                ?>
                            <form action="sponsor_code.php" method="post">
                                <input type="hidden" name="id" value="<?=$data['cat_id']?>">
                                <label for="">Add Category Name</label>
                                <input class="form-control  m-0" type="text" name="cat_name"  value="<?=$data['cat_name']?>" placeholder="enter category">
                                <label for="">Status</label>
                                <select class="form-control" name="status" class="py-2" >
                                    <option <?php ($data['cat_status']==1)?"Selected":""; ?> value="1">Active</option>
                                    <option <?php ($data['cat_status']==0)?"Selected":""; ?> value="0">inactive</option>
                                </select>

                                <button type="submit" class="btn btn-info my-2 w-100 " name="update_cat" >Add</button>
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