<?php
session_start();

$username=$_SESSION['u_username'];

if (unlink("images/users/$username/profile-photo"))
{
    header("Location: profile.php?media-delete=deleted");
    exit();
}
else
    {
        echo "Something wrong happened!";
    }

?>