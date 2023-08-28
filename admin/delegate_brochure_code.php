<!-- **********************for-Images-upload*************************** -->
<?php
include('authentication.php');
require('config/dbcon.php');

if (isset($_POST['add'])) {

    $pdf = $_FILES['pdf_upl']['name'];
    $status = $_POST['status'];


    if ($_FILES['pdf_upl']["size"] > 500000) {
        $_SESSION['steel_msg'] = " image size is to Big";
        header('location:delegate_tbl.php');
    }
    echo $_FILES['pdf_upl']["size"];
    $pdf_ext = ['png', 'jpg', 'jpeg','pdf'];

    $file_ext = pathinfo($pdf, PATHINFO_EXTENSION);

    // $img_name = $img ;

    if (!in_array($file_ext, $pdf_ext)) {

        $_SESSION['steel_msg'] = "file only in jpg, png ,jpeg or PDF ext";
        header('location:delegate_tbl.php');
    } else {

        $sql = "INSERT INTO delegate_tbl(name,status) VALUES('$pdf','$status')";

        $connect_db = mysqli_query($con, $sql);

        if ($connect_db) {
            move_uploaded_file($_FILES['pdf_upl']['tmp_name'], 'delegate/' . $pdf);

            $_SESSION['steel_msg'] = "delegate uploaded  Successfully.";
            header('location:delegate_tbl.php');
        } else {

            $_SESSION['steel_msg'] = "Something went wrong";
            header('location:delegate_tbl.php');
        }
    }
};
// --------------------------------------------delete-images---------------------------------

if (isset($_POST['delete_del'])) {

    $id = $_POST['delete_del_id'];

    $query_delete = " DELETE FROM delegate_tbl WHERE  id ='$id'";

    $query_delete_run = mysqli_query($con, $query_delete);

    if ($query_delete_run) {

        $_SESSION['steel_msg'] = "delegate deleted";
        header('location:delegate_tbl.php');
    } else {
        $_SESSION['steel_msg'] = "Image deletion failed";
        header('location:delegate_tbl.php');
    }
}


// ---------------------Brochure---------------


if (isset($_POST['add_bro'])) {
    
    $pdf = $_FILES['pdf_upl']['name'];
    $status = $_POST['status'];


    if ($_FILES['pdf_upl']["size"] > 113000000) {
        $_SESSION['steel_msg'] = " image size is to Big";
        header('location:brochure_tbl.php');
    }
    echo $_FILES['pdf_upl']["size"];
    $pdf_ext = ['png', 'jpg', 'jpeg','pdf'];

    $file_ext = pathinfo($pdf, PATHINFO_EXTENSION);

    // $img_name = $img ;

    if (!in_array($file_ext, $pdf_ext)) {

        $_SESSION['steel_msg'] = "file only in jpg, png ,jpeg or PDF ext";
        header('location:brochure_tbl.php');
    } else {
        
        $sql = "INSERT INTO brochure_tbl(name,status) VALUES('$pdf','$status')";
        
        $connect_db = mysqli_query($con, $sql);
        
        if ($connect_db) {
            move_uploaded_file($_FILES['pdf_upl']['tmp_name'], 'delegate/' . $pdf);
            
            $_SESSION['steel_msg'] = "brochure uploaded  Successfully.";
            header('location:brochure_tbl.php');
        } else {
            
            $_SESSION['steel_msg'] = "Something went wrong";
            header('location:brochure_tbl.php');
        }
    }
};


if (isset($_POST['delete_bro'])) {

    $user_id = $_POST['delete_bro_id'];

    $query_delete = " DELETE FROM brochure_tbl WHERE  id ='$user_id'";

    $query_delete_run = mysqli_query($con, $query_delete);

    if ($query_delete_run) {

        $_SESSION['steel_msg'] = "brochure deleted";
        header('location:brochure_tbl.php');
    } else {
        $_SESSION['steel_msg'] = "brochure deletion failed";
        header('location:brochure_tbl.php');
    }
}
?>