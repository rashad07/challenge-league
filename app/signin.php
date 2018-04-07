<?php

session_start();

if (isset($_POST['sub']))
{
    include 'dbc.php';
    $uid = mysqli_real_escape_string($conn,$_POST['username']);
    $pwd = mysqli_real_escape_string($conn,$_POST['passwd']);
    $sql_a = "Select * from users where (username='$uid' or email='$uid') and activated=1";
    $activated = mysqli_query($conn, $sql_a);
//    mysqli_num_rows($activated);
//    exit();
    // check if inputs are empty
    if (empty($uid) || empty($pwd))
    {
        $_SESSION['empty_error'] = ' Your need to fill in both fields! '.'<br><br>';
        header("Location: login.php?login=empty");
        exit();
    }
    else {
        $sql = "Select * from users where username='$uid' or email='$uid'";
        $result = mysqli_query($conn, $sql);
        $usernamecheck = mysqli_num_rows($result);
        if ($usernamecheck < 1) {
            $_SESSION['login_error'] = ' Username "' . $uid . '" doesn\'t exist';
            header("Location: login.php?error=login_error");
            exit();
        }
        elseif (mysqli_num_rows($activated)<1)
        {
            $_SESSION['empty_error'] = ' Your Account Hasn\'t Been Verified Yet!'.'<br><br>';
            header("Location: login.php?login=empty");
            exit();
        }
        else {
            if ($row = mysqli_fetch_assoc($result))
            {
                //De-hashing the password
                $hashedPwdCheck = password_verify($pwd, $row['password']);
                if ($hashedPwdCheck == false)
                {
                    $_SESSION['incorrect_password'] = ' The Password you typed doesn\'t match';
                    header("Location: login.php?error=incorrect_password");
                    exit();
                }
                elseif ($hashedPwdCheck == true)
                {
                    if (isset($_POST['rememberme']))
                    {
                        setcookie('username',$uid,time()+60*60*24*31);
                        //this should be taken into account
                        //setcookie('password',$pwd,time()+60*60*24*10,"","",true,true);
                        setcookie('password',$pwd,time()+60*60*24*31);
                    }
                    $_SESSION['u_id'] = $row['id'];
                    $_SESSION['u_fname'] = $row['firstname'];
                    $_SESSION['u_lname'] = $row['lastname'];
                    $_SESSION['u_email'] = $row['email'];
                    $_SESSION['u_gender'] = $row['gender'];
                    $_SESSION['u_bday'] = $row['birthday'];
                    $_SESSION['u_username'] = $row['username'];
                    $_SESSION['login_success'] = 'You Have Successfully Logged In' . '<br><br>';
                    header("Location: index-2.php?login=login_success");
                    exit();
                }
            }
            else{
                echo 'olmadi';
            }
        }
    }

}
else
    {
        header("Location: login_page.php?login=error");
        exit();
    }
?>