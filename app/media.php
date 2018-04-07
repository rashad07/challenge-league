<?php
session_start();

if (isset($_POST['submit']))
{
    //deleting image
    $username=$_SESSION['u_username'];
    if (file_exists("images/users/$username/profile-photo"))
    {
        unlink("images/users/$username/profile-photo");
    }

    //---------------------------------------------------------------------------------------------
    $uploaddir = 'C:\xampp\htdocs\challenge-league\app\images\users\\';
    $uploadfile = $uploaddir .$username.'\\'."profile-photo";

//    $_SESSION['image_name']="profile-photo";

    if (move_uploaded_file($_FILES['profile_image']['tmp_name'], $uploadfile)) {
        echo "File is valid, and was successfully uploaded.\n";
        header("Location: profile.php?media=upload-success");
        exit();
    } else {
        echo "Upload failed";
        header("Location: profile.php?media=upload-fail");
        exit();
    }
}
else
    {
        header("Location: profile.php");
        exit();
    }

?>