<?php
session_start();

$username=$_SESSION['u_username'];
$u_id = $_SESSION['u_id'];

if ((isset($_GET['id']) || isset($username)) && $_GET['id']== $username)
{
    include 'dbc.php';
    $sql = "Delete from users where id='$u_id'";
    $result = mysqli_query($conn,$sql);

    if ($result)
    {
        unlink("images/users/$username/profile-photo");
        rmdir("images/users/$username");
        echo '<script>window.location.href = "signout.php?delete-account";</script>';
    }
    else
        {
            header("Location: profile.php?delete-account=fail");
            exit();
        }
}