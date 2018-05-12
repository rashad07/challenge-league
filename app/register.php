<?php
include 'header.php';
?>

<div class="page-header" style="background: url(assets/img/banner1.jpg);">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="breadcrumb-wrapper">
                    <h2 class="page-title">My Account</h2>
                    <a href="index-2.php">Home</a>
                    <span>/</span>
                    <span class="current">My Account</span>
                </div>
            </div>
        </div>
    </div>
</div>
<?php

if(isset($_SESSION['signup_fail']))
{
    echo '<div class="breadcrumb-wrapper" style="background-color: red" >';
    echo '<h7><i style="color: white">'.$_SESSION['signup_fail'].'</i></h7> ';
    echo '</div>';
    unset($_SESSION['signup_fail']);
}
?>
<section id="content">
    <div class="container">
        <div class="row">
            <div style="background-color: #0a6ebd;left: 25%;border-radius: 30px" class="col-md-6">
                <center><h2 class="medium-title">Registration</h2></center>

                <form action="signup.php" method="POST">
                    <div class="col-md-6">
                        <label style="color: white" for="fname">First Name<span style="color: #cb171e" class="required">*</span></label>
                        <?php
                        if (isset($_SESSION['firstname']))
                        {
                            echo '<input style="color: black" value="'.$_SESSION['firstname'].'" class="form-control" name="fname" id="fname" type="text">';
                        }
                        else
                            {
                                echo '<input style="color: black" class="form-control" name="fname" id="fname" type="text">';
                            }
                        ?>
                    </div>
                    <div class="col-md-6">
                        <label style="color: white" for="lname">Last Name<span style="color: #cb171e" class="required">*</span></label>
                        <?php
                        if (isset($_SESSION['lastname']))
                        {
                            echo '<input style="color: black" value="'.$_SESSION['lastname'].'" class="form-control" name="lname" id="lname" type="text">';
                        }
                        else
                        {
                            echo '<input style="color: black" class="form-control" name="lname" id="lname" type="text">';
                        }
                        ?>
                    </div>
                    <div class="col-md-6">
                        <label style="color: white" for="gender">Gender<span style="color: #cb171e" class="required">*</span></label>
                        <select class="form-control" style="float: right; color: black" name="gender" id="gender" >
                            <div>

                                <?php
                                if (isset($_SESSION['gender']))
                                {
                                    echo '<option>'.$_SESSION['gender'].'</option>';
                                }
                                else
                                {
                                    echo '<option disabled selected value="Choose one">Choose one</option>';
                                }
                                ?>

                                <option value="male">Male</option>
                                <option value="female">Female</option>
                            </div>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label style="color: white" for="birthday">Birthday<span style="color: #cb171e" class="required">*</span></label><br>
                        <select class="form-control col-md-2" name='day' id='day' style="width: 75px; color: black">

                            <?php
                            if (isset($_SESSION['day']))
                            {
                                echo '<option>'.$_SESSION['day'].'</option>';
                            }
                            else
                            {
                                echo '<option disabled selected value="Day">Day</option>';
                            }
                            for ($day=1;$day<=31;$day++)
                            {
                                echo '<option value="'.$day.'">'.$day.'</option>';
                            }
                            ?>

                        </select>
                        <select class="form-control col-md-2" name='month' id='month' style="width: 90px; color: black">

                            <?php
                            if (isset($_SESSION['month']))
                            {
                                echo '<option>'.$_SESSION['month'].'</option>';
                            }
                            else
                            {
                                echo '<option disabled selected value="Month">Month</option>';
                            }
                            for ($month=1;$month<=12;$month++)
                            {
                                echo '<option value="'.$month.'">'.$month.'</option>';
                            }
                            ?>
                        </select>
                        <select class="form-control col-md-2" name='year' id='year' style="width: 80px; color: black">

                            <?php
                            if (isset($_SESSION['year']))
                            {
                                echo '<option>'.$_SESSION['year'].'</option>';
                            }
                            else
                            {
                                echo '<option disabled selected value="Year">Year</option>';
                            }
                            for ($year=2003;$year>=1946;$year--)
                            {
                                echo '<option value="'.$year.'">'.$year.'</option>';
                            }
                            ?>

                        </select>
                    </div>

                    <div class="col-md-12">
                        <label style="color: white" for="uname">Username</label>
                        <?php
                        if (isset($_SESSION['exist_username'])) {
                            echo "\xe2\x9d\x8c"."<i style='color: red; background-color: white'>" . $_SESSION['exist_username'] ."</i>";
                            unset($_SESSION['exist_username']);
                        }

                        if (isset($_SESSION['register_username']))
                        {
                            echo '<input style="color: black" value="'.$_SESSION['register_username'].'" class="form-control" name="uname" id="uname" type="text">';
                        }
                        else
                        {
                            echo '<input style="color: black" class="form-control" name="uname" id="uname" type="text">';
                        }
                        ?>

                    </div>
                    <div class="col-md-12">
                        <label style="color: white" for="email">Email address<span style="color: #cb171e" class="required">*</span></label>
                        <?php
                        if (isset($_SESSION['exist_email'])) {
                            echo "\xe2\x9d\x8c"."<i style='color: red; background-color: white'>" . $_SESSION['exist_email'] ."</i>";
                            unset($_SESSION['exist_email']);
                        }
                        if (isset($_SESSION['email']))
                        {
                            echo '<input style="color: black" value="'.$_SESSION['email'].'" class="form-control" name="email" id="email" type="text">';
                        }
                        else
                        {
                            echo '<input style="color: black" class="form-control" name="email" id="email" type="text">';
                        }
                        ?>
                    </div>
                    <div class="col-md-12">
                        <label style="color: white" for="password">Set Password <span style="color: #cb171e" class="required">*</span></label>
                        <?php
                        if (isset($_SESSION['pass_error']))
                        {
                            echo "\xe2\x9d\x8c"."<i style='color: red; background-color: white'>" . $_SESSION['pass_error'] . "</i>";
                            unset($_SESSION['pass_error']);
                        }
                        ?>
                        <input style="color: black; margin-bottom: 0" class="form-control" name="password" id="password" type="password">
                        <span toggle="#password-field" style="cursor:pointer;transform: scale(1.5);float: right;margin-right: 15px; margin-top: -30px; position: relative; z-index: 2;color: red" class="fa fa-fw fa-eye field-icon toggle-password1"></span>
                        <p style="color: white">At least 8 chars including an uppercase,a lower case and a number or punctuation !!!</p>

                    </div>

                    <div class="col-md-12">
                        <label style="color: white" for="password">Confirm Password <span style="color: #cb171e" class="required">*</span></label>
                        <?php
                        if (isset($_SESSION['password_match']))
                        {
                            echo "\xe2\x9d\x8c"."<i style='color: red; background-color: white'>" . $_SESSION['password_match'] . "</i>";
                            unset($_SESSION['password_match']);
                        }
                        ?>
                        <input style="color: black" class="form-control input-sm" name="c_password" id="c_password" type="password">
                        <span toggle="#password-field" style="transform: scale(1.5);float: right;margin-right: 15px; margin-top: -60px; position: relative; z-index: 2;color: red" class="fa fa-fw fa-eye field-icon toggle-password2"></span>
                    </div>
                    <script type="text/javascript" src="assets/js/jquery.min.js"></script>
                    <script>

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
                    <div>
                        <center><button style="border-radius: 5px;background-color: green" type="submit" name="submit" id="submit" class="btn btn-common">Sign Up</button><br>
                            <a href="login.php" style="color: white;text-decoration: underline">Already have an account?</a>
                        </center>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<!---->
<!--<div class="cta">-->
<!--<div class="container">-->
<!--<div class="row">-->
<!--<div class="col-md-8 col-sm-8">-->
<!--<h3>Learning Management System</h3>-->
<!--</div>-->
<!--<div class="col-md-4 col-sm-4">-->
<!--<a href="#" class="btn btn-border">Creat Account</a>-->
<!--</div>-->
<!--</div>-->
<!--</div>-->
<!--</div>-->
<?php
include 'footer.html';
?>