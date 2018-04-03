<?php
session_start();
if (!isset($_GET['email']) || !isset($_GET['token']))
{
    header("Location: login_page.php");
    exit();
}
else
    {
        include 'dbc.php';

        $email = mysqli_real_escape_string($conn,$_GET['email']);
        $token = mysqli_real_escape_string($conn,$_GET['token']);

        $sql = $conn->query("Select id from users where email='$email' and token='$token' and activated=0");
        if (mysqli_num_rows($sql)>0)
        {
            $conn->query("Update users Set activated=1, token='' where email='$email'");

            $_SESSION['verification_success']='Your Email Has Been Verified! You Can Log In now!';
            header("Location: login_page.php?msg=verification_success");
            exit();
        }
        else
            {
                header("Location: login_page.php");
                exit();
            }

    }
?>