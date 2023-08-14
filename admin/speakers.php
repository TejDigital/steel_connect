<?php
include('authentication.php');
require('includes/header.php');
require('includes/topbar.php');
require('includes/sidebar.php');
require('config/dbcon.php');
?>
<div class="content-wrapper" style="overflow-x: hidden;">
    <div class="modal fade" id="addSpeakersmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Speaker</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="speakers_code.php" method="POST" enctype="multipart/form-data">
                    <div class="card-body">
                            <label for="">Choose Image</label>
                            <br>
                            <input class="form-control p-0 m-0" name="img_upl" type="file" style="width:100%;">
                            <label for="">Name</label>
                            <input type="text" name="name" class="form-control  m-0" placeholder="Enter Full name">

                            <label for="">Position</label>
                            <input type="text" name="position" class="form-control  m-0" placeholder="Enter Position">
                            <label for="">Status</label>
                            <select class="form-control" name="status" id="" class="py-2">
                                <option value="1">active</option>
                                <option value="0">inactive</option>
                            </select>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <!-- <button type="submit" name="adduser" class="btn btn-primary">Save</button> -->
                        <button type="submit" class="btn btn-info " name="add">Add</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
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
                    <h1 class="m-0 text-dark">Speakers</h1>
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

    <div class="modal fade" id="delete_speaker_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Delete speakers</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="speakers_code.php" method="POST">
                    <div class="modal-body">
                        <input type="hidden" name="delete_speaker_id" class="delete_speaker_id">
                        <p>Are you sure , you want to delete this data ?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" name="delete_speaker" class="btn btn-danger">Yes,Delete.!</button>
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
                            echo "<script>alert('" . $_SESSION['steel_msg'] . "')</script>";
                            unset($_SESSION['steel_msg']);
                        }
                        ?>
                         <div class="card-header">
                        <h3 class="card-title">Speakers</h3>
                        <a href="#" class="btn btn-primary btn-sm float-right" data-toggle="modal" data-target="#addSpeakersmodal">Add Speakers</a>
                    </div>
                        <div class="card-body ">
                            <table id="example1" class="  table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>S.No.</th>
                                        <th>Speakers Image</th>
                                        <th>Name</th>
                                        <th>Position</th>
                                        <th>Status</th>
                                        <!-- <th>File</th> -->
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $query = "SELECT * FROM speakers_tbl ORDER BY created_at DESC";
                                    $db_query_connect = mysqli_query($con, $query);
                                    $count = 1;
                                    if (mysqli_num_rows($db_query_connect) > 0) {
                                        foreach ($db_query_connect as $filds) {
                                    ?>
                                            </tr>
                                            <td><?= $count++ ?></td>
                                            <td><?= $filds['s_img'] ?></td>
                                            <td><?= $filds['s_name'] ?></td>
                                            <td><?= $filds['s_position'] ?></td>
                                            <td>
                                                <?php
                                                if ($filds['s_status'] == "1") {
                                                    echo "Active";
                                                } elseif ($filds['s_status'] == "0") {
                                                    echo "inactive";
                                                } else {
                                                    echo "invailid";
                                                }
                                                ?>
                                            </td>
                                            <td class="text-center">
                                                <a href=speakers_edit.php?id=<?php echo $filds['s_id']; ?> class='btn btn-info btn-sm '><i class="fa-solid fa-pen-to-square"></i></a>
                                                <button type='button' value=<?php echo $filds['s_id']; ?> class='btn btn-danger delete_speaker_btn btn-sm my-1'><i class="fa-solid fa-trash"></i></button>
                                                <a href=speakers_view.php?cus_id=<?php echo $filds['s_id']; ?> class='btn btn-success btn-sm'><i class="fa-regular fa-eye"></i></a>
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
        $('.delete_speaker_btn').click(function(e) {
            e.preventDefault();
            var img_id = $(this).val();
            // console.log(user_id);
            $('.delete_speaker_id').val(img_id);
            $('#delete_speaker_modal').modal('show');
        });
    });
</script>
<?php require('includes/footer.php'); ?>