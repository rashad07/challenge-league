<?php
session_start();

if (isset($_POST['submit']) && isset($_FILES['profile_image']))
{
    //deleting image
    $username=$_SESSION['u_username'];
    if (file_exists("images/users/$username/profile-photo") && isset($_POST['profile_image']))
    {
        unlink("images/users/$username/$username-profile-photo");
    }

    //---------------------------------------------------------------------------------------------
    $uploaddir = 'C:\xampp\htdocs\challenge-league\app\images\users\\';
    $uploadfile = $uploaddir .$username.'\\'.$username."-profile-photo";

//    $_SESSION['image_name']="profile-photo";

    if (move_uploaded_file($_FILES['profile_image']['tmp_name'], $uploadfile)) {
        header("Location: profile.php?media=upload-success");
        exit();
    } else {
        header("Location: profile.php?media=upload-fail2");
        exit();
    }
}
else
    {
        header("Location: profile.php?media=upload-fail");
        exit();
    }

?>