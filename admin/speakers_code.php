<!-- **********************upload*************************** -->
<?php
include('authentication.php');
require('config/dbcon.php');

if (isset($_POST['add'])) {
    $name = $_POST['name'];
    $position = $_POST['position'];
    $img = $_FILES['img_upl']['name'];
    $status = $_POST['status'];


    if ($_FILES['img_upl']["size"] > 500000) {
        $_SESSION['steel_msg'] = " image size is to Big";
        header('location:speakers.php');
    }
    echo $_FILES['img_upl']["size"];
    $img_ext = ['png', 'jpg', 'jpeg'];

    $file_ext = pathinfo($img, PATHINFO_EXTENSION);

    // $img_name = $img ;

    if (!in_array($file_ext, $img_ext)) {

        $_SESSION['steel_msg'] = "img only in jpg  or jpeg ext";
        header('location:speakers.php');
    } else {

        $sql = "INSERT INTO speakers_tbl(s_img,s_status,s_name,s_position) VALUES('$img','$status','$name','$position')";

        $connect_db = mysqli_query($con, $sql);

        if ($connect_db) {
            move_uploaded_file($_FILES['img_upl']['tmp_name'], 'speakers_images/' . $img);

            $_SESSION['steel_msg'] = "Speaker added  Successfully.";
            header('location:speakers.php');
        } else {

            $_SESSION['steel_msg'] = "Something went wrong";
            header('location:speakers.php');
        }
    }
};
// ----------------------------delete---------------
if (isset($_POST['delete_speaker'])) {

    $user_id = $_POST['delete_speaker_id'];

    $query_delete = " DELETE FROM speakers_tbl WHERE  s_id ='$user_id'";

    $query_delete_run = mysqli_query($con, $query_delete);

    if ($query_delete_run) {

        $_SESSION['steel_msg'] = "Speaker deleted";
        header('location:speakers.php');
    } else {
        $_SESSION['steel_msg'] = "Speaker deletion failed";
        header('location:speakers.php');
    }
}


// ----------------------update--------------------

if (isset($_POST['update'])) {

    $id = $_POST['id'];
    $new_img = $_FILES['new_img']['name'];
    $name = $_POST['name'];
    $position = $_POST['position'];
    $img = $_FILES['img_upl']['name'];
    $status = $_POST['status'];
    $old_img = $_POST['img_old'];


    if ($new_img != '') {
        if ($_FILES['new_img']["size"] > 500000) {
            $_SESSION['steel_msg'] = " image size is to Big";
            header('location:speakers_edit.php');
        }
        $img_ext = ['png', 'jpg', 'jpeg'];

        $file_ext = pathinfo($new_img, PATHINFO_EXTENSION);


        if (!in_array($file_ext, $img_ext)) {
            $_SESSION['steel_msg'] = "img only in jpg ,png or jpeg ext";
            header('location:speakers_edit.php');
        }

        $updated_img = $new_img;
    } else {
        $updated_img = $old_img;
    }
    $sql = "UPDATE speakers_tbl SET s_name='$name',s_position='$position', s_status='$status', s_img='$updated_img' WHERE s_id='$id'";

    $connect_db = mysqli_query($con, $sql);

    if ($connect_db) {
        if ($_FILES['new_img']['name'] != "") {
            move_uploaded_file($_FILES['new_img']['tmp_name'], 'speakers_images/' . $_FILES['new_img']['name']);
            unlink("speakers_images/" . $old_img);
        }
        $_SESSION['steel_msg'] = "speakers updated Successfully.";
        header('location:speakers.php');
    } else {
        $_SESSION['steel_msg'] = "Something went wrong";
        header('location:speakers_edit.php');
    }
};