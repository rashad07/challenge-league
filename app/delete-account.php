<?php
session_start();

$username=$_SESSION['u_username'];
$u_id = $_SESSION['u_id'];

if ((isset($_GET['id']) || isset($username)) && $_GET['id']== $username)
{
    include_once 'dbc.php';
    $sql = "Update users Set activated=0 where id='$u_id'";

    if ($result = mysqli_query($conn,$sql))
    {
//        rmdir("images/users/$username");
        echo '<script>window.location.href = "signout.php?delete-account";</script>';
    }
    else
        {
            $_SESSION['delete-account']="fail";
            header("Location: profile.php?delete-account=fail");
            exit();
        }
        mysqli_close($conn);
}