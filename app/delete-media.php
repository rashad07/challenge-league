<?php
session_start();

$username=$_SESSION['u_username'];

if (unlink("images/users/$username/$username-profile-photo"))
{
    header("Location: profile.php?media-delete=success");
    exit();
}
else
    {
        echo "Something wrong happened!Media can not be Deleted!";
    }

?>