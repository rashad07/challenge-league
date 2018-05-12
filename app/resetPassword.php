<?php

if (!isset($_GET['email']) || !isset($_GET['token']))
{

    header("Location: index-2.php?error=verification");
    exit();
}
else
{
    include_once 'dbc.php';

    $email = mysqli_real_escape_string($conn,$_GET['email']);
    $token = mysqli_real_escape_string($conn,$_GET['token']);

    $sql = "Select * from password_reset where email='$email' and token='$token'";
    if($result = @mysqli_query($conn,$sql)) {
        $row = mysqli_fetch_assoc($result);
        mysqli_close($conn);
    }
    else{
        echo '<span style="font-size: 26px;">Couldn\'t make connection to the database!</span>';
    }
    if (mysqli_num_rows($result)>0)
    {
        include 'header.php';
    }
    else
    {
        header("Location: forgotPassword.php?tokenerror");
        exit();
    }
}
?>
<section id="content">
    <div class="container">
        <div class="row">
            <div style="background-color: #ebebeb;left: 25%" class="col-md-6">
                <center><h2 class="medium-title" style="color: grey">Reset Your Account Password</h2></center>
                <script>
                    function validateForm() {
                        var password = document.getElementById("password");
                        var c_password = document.getElementById("c_password");
                        switch(true) {
                            case password.value==="":
                                password.style.borderColor = "red";
                                return false;
                            case ( password.value.length < 8 || password.value===password.value.toUpperCase()
                            || password.value===password.value.toLowerCase() || alphanumeric(password.value)):
                                password.style.borderColor = "red";
                                password.value = "";
                                c_password.value ="";
                                c_password.placeholder = "";
                                password.placeholder = "Follow Rules!";
                                return false;
                            case c_password.value === "":
                                c_password.style.borderColor = "red";
                                return false;
                            case c_password.value !== password.value:
                                c_password.style.borderColor = "red";
                                c_password.value ="";
                                c_password.placeholder = "Password doesn't match!";
                                return false;
                                break;
                        }
                        function alphanumeric(input)
                        {
                            var letter = /[a-zA-Z]/;
                            var number = /[0-9]/;
                            if (letter.test(input) && number.test(input))
                            {
                                return false;
                            }
                            else
                            {
                                return true;
                            }
                        }
                    }
                </script>
                <form method="POST" onsubmit="return validateForm()" name="myForm" action="updatePassword.php?userid=<?php echo $row['user_id'];?>">
                    <div class="col-md-12">
                        <label style="" for="password">New Password <span style="color: #cb171e" class="required">*</span></label>
                        <input style="color: black; margin-bottom: 0" class="form-control" name="password" id="password" type="password">
                        <span toggle="#password-field" style="cursor:pointer;transform: scale(1.5);float: right;margin-right: 15px; margin-top: -30px; position: relative; z-index: 2;color: red" class="fa fa-fw fa-eye field-icon toggle-password1"></span>
                        <p id="rules" style="">At least 8 chars including an uppercase,a lower case and a number or punctuation !!!</p>
                    </div>
                    <div class="col-md-12">
                        <label style="" for="c_password">Confirm Password <span style="color: #cb171e" class="required">*</span></label>
                        <input style="color: black" class="form-control input-sm" name="c_password" id="c_password" type="password">
                        <span toggle="#password-field" style="cursor:pointer;transform: scale(1.5);float: right;margin-right: 15px; margin-top: -60px; position: relative; z-index: 2;color: red" class="fa fa-fw fa-eye field-icon toggle-password2"></span>
                    </div>
                    <script type="text/javascript" src="assets/js/jquery.min.js"></script>
                    <script>
//
                        $(".toggle-password1").click(function() {
                            var x = document.getElementById("password");

                            $(this).toggleClass("fa-eye fa-eye-slash");

                            if (x.type === "password") {
                                x.type = "text";
                            } else {
                                x.type = "password";
                            }
                        });
                        $(".toggle-password2").click(function() {
                            var y = document.getElementById("c_password");

                            $(this).toggleClass("fa-eye fa-eye-slash");

                            if (y.type === "password") {
                                y.type = "text";
                            } else {
                                y.type = "password";
                            }
                        });
                    </script>
                    <center>
                        <button style="" type="submit" id="submit" name="submit" class="btn btn-primary">RESET PASSWORD</button>
                    </center>
                </form>
            </div>
        </div>
    </div>
</section>

<?php
include 'footer.html';
?>