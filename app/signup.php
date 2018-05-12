<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
session_start();
if (isset($_POST['submit']))
{
    include_once 'dbc.php';
    echo $firstname = mysqli_real_escape_string($conn, $_POST['fname']);
    echo $lastname = mysqli_real_escape_string($conn, $_POST['lname']);
    echo $username = mysqli_real_escape_string($conn, $_POST['uname']);
    echo $email = mysqli_real_escape_string($conn, $_POST['email']);
    echo $gender = mysqli_real_escape_string($conn, $_POST['gender']);
    echo $birthday = $_POST['day'].'-'.$_POST['month'].'-'.$_POST['year'];
    echo $password = mysqli_real_escape_string($conn, $_POST['password']);
    echo $c_password = mysqli_real_escape_string($conn, $_POST['c_password']);

    $_SESSION['firstname']=$firstname;
    $_SESSION['lastname']=$lastname;
    $_SESSION['register_username']=$username;
    $_SESSION['email']=$email;
    $_SESSION['gender']=$gender;
    $_SESSION['day']=$_POST['day'];
    $_SESSION['month']=$_POST['month'];
    $_SESSION['year']=$_POST['year'];

    if(empty($firstname) || empty($lastname) || empty($password) || empty($email) || empty($gender) || (empty($_POST['day']) && empty($_POST['month']) && empty($_POST['year']))){
        header("Location: register.php?inputs=empty");
        exit();
    }
    elseif ($c_password != $password)
    {
        $_SESSION['password_match'] = ' Password doesn\'t match';
        header("Location: register.php?error=password_match");
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
        if($result = @mysqli_query($conn,$sql_u)) {
            $usernamecheck = mysqli_num_rows($result);
            if ($usernamecheck > 0) {
                $_SESSION['exist_username'] = ' Username "' . $username . '" already exists' . '<br><br>';
                header("Location: register.php?error=exist_username");
                exit();
            }
            // check for unique email
            $sql_e = "Select email from users where email='$email'";
            if($result_e = @mysqli_query($conn, $sql_e))
            {
                $emailcheck = mysqli_num_rows($result_e);
                if ($emailcheck > 0) {
                    $_SESSION['exist_email'] = ' Email "' . $email . '" already exists!' . '<br><br>';
                    header("Location: register.php?error=exist_email");
                    exit();
                }
                // check for correct password form
                if (strlen($password) < 8 or ctype_lower($password) or ctype_upper($password) or ctype_alpha($password) or ctype_digit($password)) {
                    $_SESSION['pass_error'] = ' Password must be as follow!';
                    header("Location: register.php?error=pass_error");
                } else {
                    //getting token
                    $token = 'qwertyuiopasdfghjklzxcvbnmQWERTYUIOPASDFGHJKLZXCVBNM0123456789!/$*';
                    $token = str_shuffle($token);
                    $token = substr($token, 0, 10);
                    //hashing the password
                    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

                    //sending an email to confirm e-mail address
                    require '../vendor/autoload.php';
                    require '../vendor/phpmailer/phpmailer/src/SMTP.php';

                    $mail = new PHPMailer(true);                              // Passing `true` enables exceptions
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
//                $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
                        $mail->Port = 587;                                    // TCP port to connect to

                        //Recipients
                        $mail->setFrom('challengeleague1@gmail.com', 'Challenge League');
                        $mail->addAddress($email, $firstname . ' ' . $lastname);     // Add a recipient

                        //Content
                        $mail->isHTML(true);                                  // Set email format to HTML
                        $mail->Subject = 'Verify Your Email!';
                        $mail->Body = "
                                Hi <span style='font-weight: bold'>$firstname,</span><br><br>

                                Thank you for joining us!<br><br>
                                
                                Your username is: $username<br>
                                To activate your account, please click the link below : <br>
                                
                                <a href='http://localhost:8080/challenge-league/app/confirmation.php?email=$email&token=$token'>Activate</a><br><br>
                                
                                <span style='color: red'>If this wasn't you, please ignore this email.</span><br><br>
                                
                                Sincerely,<br>
                                TestOnline Team.
                                ";

                        $mail->send();


                        //inserting user into the database
                        $sql = "Insert into users (firstname,lastname,username,email,gender,birthday,password,activated,token)
                               values('$firstname','$lastname','$username','$email','$gender','$birthday','$hashed_password',0,'$token')";
                        $result = mysqli_query($conn, $sql);
                        mysqli_close($conn);
                        //making profile picture directory
                        mkdir("images/users/" . $username);
//----------------------------------------------------------------------------------------------------------------

                        $success_msg = 'You have been registered! Please check your email to activate!';
                        $_SESSION['signup_success'] = $success_msg;
                        header('Location: login.php?signup=signup_success');
                        $_SESSION['username'] = $username;
                        $_SESSION['password'] = $password;
                    } catch (Exception $e) {
                        $fail_msg = 'Something wrong happened! Message could not be sent.Please try again! ';
//                echo $mail->ErrorInfo;
                        $_SESSION['signup_fail'] = $fail_msg;
                        header('Location: register.php?signup=signup_fail');
                        exit();
                    }
                }
            }
            else
            {
                echo '<span style="font-size: 26px;color: red">Couldn\'t make connection to the database!</span>';
                exit();
            }
        }
        else
        {
            echo '<span style="font-size: 26px;color: red">Couldn\'t make connection to the database!</span>';
            exit();
        }
    }
}
else
    {
        header('Location: login.php');
        exit();
    }

?>