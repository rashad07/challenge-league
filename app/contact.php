<?php

if (isset($_POST['submit']))
{
    include_once 'dbc.php';
    session_start();
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $message = mysqli_real_escape_string($conn, $_POST['message']);

    if(empty($name) || empty($email) || empty($message) ){
        header("Location: contact-page.php?inputs=empty");
        exit();
    }
    else
        {
                //inserting user into the database
                $sql = "Insert into customer_messages (name,email,message)
                               values('$name','$email','$message')";
                if ($result = mysqli_query($conn,$sql))
                {
                    mysqli_close($conn);
                    $success_msg= 'Thank you for your message! We will get back to you!';
                    $_SESSION['message'] = $success_msg;
                    header('Location: contact-page.php?message=success');
                    exit();
                }
                else
                {
                    $fail_msg='Something wrong happened! Message could not be sent.Please try again! ';
                    $_SESSION['message'] = $fail_msg;
                    header('Location: contact-page.php?message=fail');
                    exit();

                }

        }
}
else
{
    header('Location: contact-page.php');
    exit();
}

?>