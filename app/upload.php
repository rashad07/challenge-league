<?php
session_start();
include 'dbc.php';
$username=$_SESSION['u_username'];
$u_id = $_SESSION['u_id'];
$imagename = mysqli_real_escape_string($conn,basename($_FILES["profile_image"]["name"]));

$target_dir = "images/users/$username/";
$target_file = $target_dir . basename($_FILES["profile_image"]["name"]);

$uploadOk = 1;

$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
//$image = explode(".","test.file.hhh.kkk.jpg");
//echo end($image);
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["profile_image"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["profile_image"]["size"] > 2000000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" && $imageFileType != "bmp") {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
    header("Location: profile.php?upload_media=fail");
    exit();
} else {

    $sql_old_image = "Select * from media where user_id='$u_id'";
    if($result_old_image = @mysqli_query($conn,$sql_old_image))
    {
    if (mysqli_num_rows($result_old_image)>0)
    {
        $row_old_image = mysqli_fetch_assoc($result_old_image);
        $oldimage = $row_old_image['name'];
        unlink("images/users/$username/$oldimage");
        $sql_delete_old = "delete from media where user_id='$u_id'";
        if($result_delete_old = @mysqli_query($conn,$sql_delete_old))
        {
            mysqli_close($conn);
        }
        else{
            echo '<span style="font-size: 26px;">Couldn\'t make connection to the database!</span>';
        }
    }

        if (move_uploaded_file($_FILES["profile_image"]["tmp_name"], $target_file)) {
        $date = date('m-d-Y h:i:s', time());
        include 'dbc.php';
        $sql_insert_media = "Insert into media (user_id,name,uploaded_at) VALUES ('$u_id','$imagename','$date')";
        if ($result_insert = @mysqli_query($conn,$sql_insert_media))
        {
            header("Location: profile.php?upload_media=success");
            exit();
//        echo "The file ". basename( $_FILES["profile_image"]["name"]). " has been uploaded.";
        }
        else{
            header("Location: profile.php?upload_media=fail");
            exit();
        }
    }
    else {
        echo "Sorry, there was an error uploading your file.";
    }
}
    else{
        echo '<span style="font-size: 26px;">Couldn\'t make connection to the database!</span>';
    }
}
?>