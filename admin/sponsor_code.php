<!-- **********************category upload*************************** -->
<?php
include('authentication.php');
require('config/dbcon.php');

if(isset($_POST['add'])){
    $cat_name = $_POST['cat_name'];
    $status = $_POST['status'];

    $sql = "INSERT INTO sponsor_category (cat_name,cat_status)values('$cat_name','$status')";
    $query = mysqli_query($con,$sql);
    if($query){
        $_SESSION['steel_msg'] = "Category added";
        header('location:sponsor_category.php');
    }
    else{
        $_SESSION['steel_msg'] = "Something went wrong";
        header('location:sponsor_category.php');
    }
}


// -----------------delete------------------------
if (isset($_POST['delete_cat'])) {

    $id = $_POST['delete_cat_id'];

    $query_delete = " DELETE FROM sponsor_category WHERE  cat_id ='$id'";

    $query_delete_run = mysqli_query($con, $query_delete);

    if ($query_delete_run) {

        $_SESSION['steel_msg'] = "Category deleted";
        header('location:sponsor_category.php');
    } else {
        $_SESSION['steel_msg'] = "Category deletion failed";
        header('location:sponsor_category.php');
    }
}



if(isset($_POST['update_cat'])){
    $id = $_POST['id'];
    $cat_name = $_POST['cat_name'];
    $status = $_POST['status'];

    $sql = "UPDATE sponsor_category SET cat_name = '$cat_name',cat_status = '$status' WHERE cat_id = '$id'";
    $query = mysqli_query($con,$sql);
    if($query){
        $_SESSION['steel_msg'] = "Category Updated";
        header('location:sponsor_category.php');
    }
    else{
        $_SESSION['steel_msg'] = "Something went wrong";
        header('location:sponsor_category_edit.php');
    }
}



// ***************************************************************************************************
// *******************************************Sponsors**************************************************


if (isset($_POST['spo_add'])) {

    $img = $_FILES['img_upl']['name'];
    $status = $_POST['status'];
    $spo_category = $_POST['spo_category'];


    if ($_FILES['img_upl']["size"] > 500000) {
        $_SESSION['steel_msg'] = " image size is to Big";
        header('location:sponsors.php');
    }
    echo $_FILES['img_upl']["size"];
    $img_ext = ['png', 'jpg','svg', 'jpeg'];

    $file_ext = pathinfo($img, PATHINFO_EXTENSION);

    // $img_name = $img ;

    if (!in_array($file_ext, $img_ext)) {

        $_SESSION['steel_msg'] = "img only in jpg ,svg,png or jpeg ext";
        header('location:sponsors.php');
    } else {

        $sql = "INSERT INTO sponsors_tbl(spo_img,spo_status,spo_cat_id) VALUES('$img','$status','$spo_category')";

        $connect_db = mysqli_query($con, $sql);

        if ($connect_db) {
            move_uploaded_file($_FILES['img_upl']['tmp_name'], 'sponsor_images/' . $img);

            $_SESSION['steel_msg'] = "image uploaded  Successfully.";
            header('location:sponsors.php');
        } else {

            $_SESSION['steel_msg'] = "Something went wrong";
            header('location:sponsors.php');
        }
    }
};



// --------------------------------------------delete-images---------------------------------

if (isset($_POST['delete_spo'])) {

    $user_id = $_POST['delete_spo_id'];

    $query_delete = " DELETE FROM sponsors_tbl WHERE  spo_id ='$user_id'";

    $query_delete_run = mysqli_query($con, $query_delete);

    if ($query_delete_run) {

        $_SESSION['steel_msg'] = "Sponsor deleted";
        header('location:sponsors.php');
    } else {
        $_SESSION['steel_msg'] = "Sponsors deletion failed";
        header('location:sponsors.php');
    }
}





if (isset($_POST['update_spo'])) {

    $id = $_POST['id'];
    $new_img = $_FILES['new_img']['name'];
    $img = $_FILES['img_upl']['name'];
    $status = $_POST['status'];
    $spo_category = $_POST['spo_category'];  
    $old_img = $_POST['img_old'];


    if ($new_img != '') {
        if ($_FILES['new_img']["size"] > 500000) {
            $_SESSION['steel_msg'] = " image size is to Big";
            header('location:sponsor_edit.php');
        }
        $img_ext = ['png', 'jpg','svg', 'jpeg'];

        $file_ext = pathinfo($new_img, PATHINFO_EXTENSION);

        $img_name = time() . '.' . $file_ext;

        if (!in_array($file_ext, $img_ext)) {
            $_SESSION['steel_msg'] = "img only in jpg ,png ,svg or jpeg ext";
            header('location:sponsor_edit.php');
        }

        $updated_img = $new_img;
    } else {
        $updated_img = $old_img;
    }
    $sql = "UPDATE sponsors_tbl SET spo_status='$status',spo_img='$updated_img',spo_cat_id ='$spo_category' WHERE spo_id='$id'";

    $connect_db = mysqli_query($con, $sql);

    if ($connect_db) {
        if ($_FILES['new_img']['name'] != "") {
            move_uploaded_file($_FILES['new_img']['tmp_name'], 'sponsor_images/' . $_FILES['new_img']['name']);
            unlink("sponsor_images/" . $old_img);
        }
        $_SESSION['steel_msg'] = "image uploaded  Successfully.";
        header('location:sponsors.php');
    } else {
        $_SESSION['steel_msg'] = "Somthing went wrong";
        header('location:sponsor_edit.php');
    }
};
?>