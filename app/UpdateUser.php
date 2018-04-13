<?php
session_start();
$u_id = $_SESSION['u_id'];
if (isset($_POST['submit']))
{
    if (isset($_POST['firstname']) || isset($_POST['lastname']) || isset($_POST['gender']) || isset($_POST['birthday']))
    {
        include_once 'dbc.php';
        $firstname = mysqli_real_escape_string($conn, $_POST['firstname']);
        $lastname = mysqli_real_escape_string($conn, $_POST['lastname']);
//        $username = mysqli_real_escape_string($conn, $_POST['username']);
//        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $gender = mysqli_real_escape_string($conn, $_POST['gender']);
        $birthday = explode('-', mysqli_real_escape_string($conn, $_POST['birthday']));
        $day = $birthday[2];
        $month = $birthday[1];
        $year = $birthday[0];
        $birthday = $birthday[2] . '-' . $birthday[1] . '-' . $birthday[0];
        if (empty($firstname) || empty($lastname) || empty($gender) || empty($birthday) || $birthday=="--")
        {
            $_SESSION['inputs']="empty";
            header("Location: profile.php?inputs=empty");
            exit();
        }
        else {
            $sql = "Update users Set  firstname = '$firstname',
                                      lastname='$lastname' ,
                                      gender = '$gender',
                                      birthday = '$birthday'
                                      Where id = '$u_id' ";
            if($result = mysqli_query($conn,$sql))
            {
                $_SESSION['update']="success";
                header("Location: profile.php?update=success");
                exit();
            }
            else
                {
                    $_SESSION['update']="fail";
                    header("Location: profile.php?update=fail");
                }
        }
    }
    elseif (isset($_POST['change_password']))
    {
        include_once 'dbc.php';
        $curr_pass = mysqli_real_escape_string($conn,$_POST['curr_pass']);
        $new_pass = mysqli_real_escape_string($conn,$_POST['new_pass']);
        $confirm_pass = mysqli_real_escape_string($conn,$_POST['confirm_pass']);
        $hashed_password = password_hash($new_pass,PASSWORD_DEFAULT);
        if (empty($curr_pass) || empty($new_pass) || empty($confirm_pass))
        {
            $_SESSION['pass_inputs']="empty";
            header("Location: profile.php?pass_inputs=empty");
            exit();
        }
        else
            {
                if (strlen($new_pass)<8 or ctype_lower($new_pass) or ctype_upper($new_pass) or ctype_alpha($new_pass) or ctype_digit($new_pass))
                {
                    $_SESSION['pass_error'] = 'rule_break';
                    header("Location: profile.php?pass_error=rule_break");
                }
                else
                    {

                        $sql = "Select * from users where id='$u_id'";
                        $result = mysqli_query($conn, $sql);

                        if($row = mysqli_fetch_assoc($result))
                        {
                            $hashedPwdCheck = password_verify($curr_pass, $row['password']);
                            if ($hashedPwdCheck == false)
                            {
                                $_SESSION['pass_error'] = 'incorrect_password';
                                header("Location: profile.php?pass_error=incorrect_password");
                                exit();
                            }
                            elseif ($hashedPwdCheck == true)
                            {
                                if ($new_pass===$confirm_pass)
                                {
                                    $sql = "Update users Set password='$hashed_password' where id='$u_id' ";
                                    if($result = mysqli_query($conn, $sql))
                                    {
                                        header("Location: signout.php?password-update=success");
                                        exit();
                                    }
                                    else{
                                        $_SESSION['password-update'] = 'fail';
                                        header("Location: profile.php?password-update=fail");
                                        exit();
                                    }
                                }
                                else
                                    {
                                        $_SESSION['confirmation_error'] = 'confirm_password';
                                        header("Location: profile.php?confirmation_error=confirm_password");
                                        exit();
                                    }
                            }
                        }
                    }
            }
    }
    else
        {
            $_SESSION['pass_inputs']="notset";
            header("Location: profile.php?pass_inputs=notset");
            exit();
        }

}