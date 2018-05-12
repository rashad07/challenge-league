<?php

if (isset($_POST['submit']))
{
        include_once 'dbc.php';
        $new_pass = mysqli_real_escape_string($conn,$_POST['password']);
        $confirm_pass = mysqli_real_escape_string($conn,$_POST['c_password']);
        $user_id = mysqli_real_escape_string($conn,$_GET['userid']);
        $hashed_password = password_hash($new_pass,PASSWORD_DEFAULT);

    $sql = "Update users Set password='$hashed_password' where id='$user_id' ";
    if($result = @mysqli_query($conn, $sql))
    {
        mysqli_close($conn);
        $_SESSION['password-update'] = "success";
        header("Location: login.php?password-update=success");
        exit();
    }
    else{
        $_SESSION['password-update']="fail";
        header("Location: login.php?password-update=fail");
        exit();
    }
}