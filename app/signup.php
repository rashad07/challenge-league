<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
session_start();
if (isset($_POST['submit']))
{
    include_once 'dbc.php';
    $firstname = mysqli_real_escape_string($conn, $_POST['fname']);
    $lastname = mysqli_real_escape_string($conn, $_POST['lname']);
    $username = mysqli_real_escape_string($conn, $_POST['uname']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $gender = mysqli_real_escape_string($conn, $_POST['gender']);
    $birthday = $_POST['day'].'.'.$_POST['month'].'.'.$_POST['year'];
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $c_password = mysqli_real_escape_string($conn, $_POST['c_password']);

    if(empty($firstname) || empty($lastname) || empty($password) || empty($email) || empty($gender) || (empty($_POST['day']) && empty($_POST['month']) && empty($_POST['year']))){
        header("Location: login_page.php?inputs=empty");
        exit();
    }
    elseif ($c_password != $password)
    {
        $_SESSION['password_match'] = ' Password doesn\'t match';
        header("Location: login_page.php?error=password_match");
        exit();
    }
    else {
        //if username is empty
        if (empty($username))
        {
            $username = substr($email,0,strpos($email,'@'));
        }
        // check for unique username
        $sql_u = "Select username from users where username='$username'";
        $result = mysqli_query($conn,$sql_u);
        $usernamecheck = mysqli_num_rows($result);
        if($usernamecheck > 0){
            $_SESSION['exist_username'] = ' Username "'.$username.'" already exists'.'<br><br>';
            header("Location: login_page.php?error=exist_username");
            exit();
        }
        // check for unique username
        $sql_e = "Select email from users where email='$email'";
        $result_e = mysqli_query($conn,$sql_e);
        $emailcheck = mysqli_num_rows($result_e);
        if($emailcheck > 0){
            $_SESSION['exist_email'] = ' Email "'.$email.'" already exists'.'<br><br>';
            header("Location: login_page.php?error=exist_email");
            exit();
        }
        // check for correct password form
        if (strlen($password)<8 or ctype_lower($password) or ctype_upper($password) or ctype_alpha($password) or ctype_digit($password))
        {
            $_SESSION['pass_error'] = ' Password must be as follow!';
            header("Location: login_page.php?error=pass_error");
        }


        else {
            //getting token
            $token = 'qwertyuiopasdfghjklzxcvbnmQWERTYUIOPASDFGHJKLZXCVBNM0123456789!/()$*';
            $token = str_shuffle($token);
            $token = substr($token,0,10);
            //hashing the password
            $hashed_password = password_hash($password,PASSWORD_DEFAULT);

            //sending an email to confirm e-mail address
            require '../vendor/autoload.php';
            require '../vendor/phpmailer/phpmailer/src/SMTP.php';

            $mail = new PHPMailer(true);                              // Passing `true` enables exceptions
            try {
                //Server settings
                $mail->SMTPDebug=2;
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
                $mail->Username = 'rshdmhdyv@gmail.com';                 // SMTP username
                $mail->Password = 'resad3007';                           // SMTP password
//                $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
                $mail->Port = 587;                                    // TCP port to connect to

                //Recipients
                $mail->setFrom('rshdmhdyv@gmail.com', 'Rashad Mehdiyev');
                $mail->addAddress($email, $firstname.' '.$lastname);     // Add a recipient

                //Content
                $mail->isHTML(true);                                  // Set email format to HTML
                $mail->Subject = 'Verify Your Email!';
                $mail->Body    = "
                               Please click on the link below to verify your email:<br><br>
                                <a href='http://localhost/challenge-league/app/confirmation.php?email=$email&token=$token'>Click Here</a>
                                ";


                $mail->send();


                //inserting user into the database
                $sql = "Insert into users (firstname,lastname,username,email,gender,birthday,password,activated,token)
                               values('$firstname','$lastname','$username','$email','$gender','$birthday','$hashed_password',0,'$token')";
                $result = mysqli_query($conn,$sql);
                $success_msg= 'You have been registered! Please check your email to verify account!';
                $_SESSION['signup_success'] = $success_msg;
                header('Location: login_page.php?signup=signup_success');
            }
            catch (Exception $e)
            {
                $fail_msg='Something wrong happened! Message could not be sent.Please try again! ';
                echo $mail->ErrorInfo;
                $_SESSION['signup_fail'] = $fail_msg;
                header('Location: login_page.php?signup=signup_fail');
                exit();
            }

            $_SESSION['username'] = $username;
            $_SESSION['password'] = $password;
            header('Location: login_page.php?signup=signup_info');
            exit();
        }

    }
}
else
    {
        header('Location: login_page.php');
        exit();
    }

?>