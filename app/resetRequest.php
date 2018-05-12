<?php

session_start();

if (isset($_POST['submit']))
{
    include 'dbc.php';
    $email = mysqli_real_escape_string($conn,$_POST['email']);

    // check if inputs are empty
    if (empty($email))
    {
        $_SESSION['empty_error'] = ' Provide an Email! '.'<br><br>';
        header("Location: forgotPassword.php?error=empty");
        exit();
    }
    else {
        $sql_user = "Select * from users where email='$email'";
        if ($result_active_user = @mysqli_query($conn, $sql_user))
        {
        $emailcheck = mysqli_num_rows($result_active_user);
        $row = mysqli_fetch_assoc($result_active_user);

        if ($emailcheck < 1) {
            $_SESSION['not_found'] = ' Email "' . $email . '" isn\'t associated with any account!';
            header("Location: forgotPassword.php?error=not-found");
            exit();
        } elseif ($row['activated'] < 1 && !empty($row['token'])) {
            $_SESSION['verify_error'] = ' Your Account Hasn\'t Been Verified Yet!' . '<br><br>';
            header("Location: forgotPassword.php?error=verify");
            exit();
        } elseif ($row['activated'] < 1 && $row['token'] == "") {
            $_SESSION['deleted-account'] = 'Account Not Found!' . '<br>';
            header("Location: forgotPassword.php?account=deleted");
            exit();
        } else {
            //getting token
            $user_id = $row['id'];
            $token = 'qwertyuiopasdfghjklzxcvbnmQWERTYUIOPASDFGHJKLZXCVBNM0123456789!+-$';
            $token = str_shuffle($token);
            $token = substr($token, 0, 10);
            //inserting user into the database
            $date = date('m-d-Y h:i:s', time());

            $sql = "Insert into password_reset (user_id,email,token,updated_at)
                               values('$user_id','$email','$token','$date')";

            if ($result = @mysqli_query($conn, $sql)) {
                //sending an email to confirm e-mail address
                require '../vendor/autoload.php';
                require '../vendor/phpmailer/phpmailer/src/SMTP.php';

                $mail = new \PHPMailer\PHPMailer\PHPMailer(true);                              // Passing `true` enables exceptions
                try {
                    //Server settings
//                $mail->SMTPDebug=4;
                    $mail->isSMTP();                                      // Set mailer to use SMTP
//                $mail->SMTPOptions = array(
//                    'ssl' => array(
//                        'verify_peer' => false,
//                        'verify_peer_name' => false,
//                        'allow_self_signed' => true
//                    )
//                );
                    $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
                    $mail->SMTPAuth = true;                               // Enable SMTP authentication
                    $mail->Username = 'challengeleague1@gmail.com';                 // SMTP username
                    $mail->Password = 'Team684S';                           // SMTP password
                    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
                    $mail->Port = 587;                                    // TCP port to connect to

                    //Recipients
                    $mail->setFrom('challengeleague1@gmail.com', 'Challenge League');
                    $mail->addAddress($email, $row['firstname'] . ' ' . $row['lastname']);     // Add a recipient

                    //Content
                    $mail->isHTML(true);                                  // Set email format to HTML
                    $mail->Subject = 'Password Update Request';
                    $mail->Body = "
                               Please click on the link below to reset your password:<br><br>
                                <a href='http://localhost:8080/challenge-league/app/resetPassword.php?email=$email&token=$token'>Click Here</a>
                                ";


                    $mail->send();
//----------------------------------------------------------------------------------------------------------------

                    $success_msg = 'Please check your email to get the link for recovery!';
                    $_SESSION['email_success'] = $success_msg;
                    header('Location: forgotPassword.php?reset=email-success');
                    exit();
                } catch (Exception $e) {
                    $fail_msg = 'Something wrong happened! Message could not be sent.Please try again! ';
//                echo $mail->ErrorInfo;
                    $_SESSION['email_fail'] = $fail_msg;
                    header('Location: forgotPassword.php?reset=email-fail');
                    exit();
                }
            } else {
                echo 'Insertion Failed!';
            }
        }
    }
else
    {
        echo '<span style="font-size: 26px;">Couldn\'t make connection to the database!</span>';
    }
    }
    mysqli_close($conn);
}
else
{
    header("Location: forgotPassword.php?error=submit");
    exit();
}
?>