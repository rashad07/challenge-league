<?php
include "header.php";

if  ((isset($_GET['id']) && isset($_SESSION['u_username']) && $_GET['id']==$_SESSION['u_username'])
        ||
    (isset($_GET['media']) || isset($_GET['media-delete']))
    )
    {
        include "dbc.php";
    }
else{
    echo '<script>window.location.href = "index-2.php?error=click_profile";</script>';
//    header("Location: index-2.php?error=click_profile");
//    exit();
}
?>

<html>
<body>
<section id="content">
<div class="container">
    <div class="row">
        <div class="col-md-12" style="background-color: lightgrey; border: inset">
            <form enctype="multipart/form-data" action="media.php" method="post">
            <div class="col-md-2 text-center" style="background-color: grey">
                <?php
                $username = $_SESSION['u_username'];
                if (file_exists("images/users/$username/profile-photo"))
                {
                    echo
                        '
                    <div class="courses-wrap">
                    <div class="thumb" style="color: white">
                    <center><img class="form-control" style="width: 200px; height: 200px;border-color: blue;" src="images/users/'.$username.'/profile-photo"></center>
                    <div class="courses-price">
                    <label style="color: white; background-color: blue;opacity:0.5;" class="fa fa-upload form-control" id="upload">Upload Picture<br>
                    <input type="file" class="hidden" name="profile_image" id="profile_image">
                    <i style="color: #e6db74">No more than 2MB</i>
                    </label>
                    </div>
                    </div>
                    </div>
                    <div style="position: relative;bottom: 55px;right: 0px;">
                    <a href="delete-media.php">
                    <u style="color: white;background-color: red">Delete Photo</u>
                    </a>
                    </div>';
                }
                elseif($_SESSION['u_gender']=='male')
                    {
                        echo '
                        <div class="courses-wrap">
                        <div class="thumb" style="color: white">
                        <center><img class="form-control" style="width: 200px; height: 200px;border-color: blue" src="images/temporary/male.jpg"></center>
                        <div class="courses-price">
                        <label style="color: white; background-color: blue;opacity: 0.5" class="fa fa-upload form-control" id="upload">Upload Picture<br>
                        <input type="file" class="hidden" name="profile_image" id="profile_image">
                        <i style="color: #e6db74">No more than 2MB</i>
                        </label>
                        </div>
                        </div>
                        </div>
                        <i id="arrow" style="position: relative;bottom: 60px;right: -55px;transform: rotate(-135deg);">
                        </i>
                        <style>
                            i[id="arrow"] {
                              border: solid black;
                              border-width: 0 7px 7px 0;
                              display: inline-block;
                              padding: 3px;
                            }
                        </style>
                        ';
                    }
                elseif($_SESSION['u_gender']=='female')
                {
                    echo '
                        <div class="courses-wrap">
                        <div class="thumb" style="color: white">
                        <center><img class="form-control" style="width: 200px; height: 200px;border-color: blue" src="images/temporary/female.jpg"></center>
                        <div class="courses-price">
                        <label style="color: white; background-color: blue;" class="fa fa-upload form-control" id="upload">Upload Picture<br>
                        <input type="file" class="hidden" name="profile_image" id="profile_image">
                        <i style="color: #e6db74">No more than 2MB</i>
                        </label>
                        </div>
                        </div>
                        </div>
                        <i style="position: relative;bottom: 60px;right: -55px;transform: rotate(-135deg);">
                        </i>
                        <style>
                            i {
                              border: solid black;
                              border-width: 0 3px 3px 0;
                              display: inline-block;
                              padding: 3px;
                            }
                        </style>
                        ';
                }
                ?>
                <input class="fa fa-save text-center" type="submit" value="Save" name="submit" style="color: white;background-color: green;width: 100px;height: 40px">
                <br>
                <br>
                <br>
                <pre><a href="delete-account.php" class="fa fa-trash" style="color: red"> Delete My Account</a></pre>
            </div>
                <div class="col-md-2">

                </div>
            </form>
            <div class="col-md-10">
                <h3 style="background-color: grey"><?php echo $_SESSION['u_fname'];?>-Profile

                </h3>
                <div class="col-md-6" style="background-color: grey;">
                    <label style="color: white;">User Account Data</label>
                    <?php echo '<b><pre>First Name  :   <input disabled type="text" name="firstname" id="firstname" value='.$_SESSION['u_fname'].' size="25px"></pre></b>';?>
                    <?php echo '<b><pre>Last Name   :   <input disabled type="text" name="lastname" id="lastname" value='.$_SESSION['u_lname'].' size="25px"></pre></b>';?>
                    <?php echo '<b><pre>Email       :   <input disabled type="text" name="email" id="email" value='.$_SESSION['u_email'].' size="25px"></pre></b>';?>
                    <?php echo '<b><pre>Username    :   <input disabled type="text" name="username" id="username" value='.$_SESSION['u_username'].' size="25px"></pre></b>';?>
                    <?php echo '<b><pre>Gender      :   <input disabled type="text" name="gender" id="gender" value='.$_SESSION['u_gender'].' size="25px"></pre></b>';?>
                    <?php echo '<b><pre>Birthday    :   <input disabled type="text" name="birthday" id="birthday" value='.$_SESSION['u_bday'].' size="25px"></pre></b>';?>
                </div>
                <div class="col-md-6" style="background-color: grey">
                    <label style="color: white;">Change Password</label>
                    <?php echo '<b><pre>Current Password     :   <input disabled type="password" name="curr_pass" id="curr_pass"></pre></b>';?>
                    <?php echo '<b><pre>New Passord          :   <input disabled type="password" name="new_pass" id="new_pass"></pre></b>';?>
                    <?php echo '<b><pre>Confirm New Password :   <input disabled type="password" name="confirm_pass" id="confirm_pass"></pre></b>';?>

                    <div>
                        <button class="fa fa-edit btn btn-block" type="button" style=" background-color: #00a8ff;color: white;height: 30px" onclick="Edit()"> Edit Profile Details</button>
                    </div>
                    <br>
                    <br>
                    <br>
                    <br>
                    <button disabled class="fa fa-save btn btn-primary" type="submit" name="submit" id="submit" style=" background-color: blue;float: right;height: 32px;"> Save</button>

                </div>

            </div>

        </div>
    </div>
</div>

</section>
</body>
</html>

    <script>
        function Edit() {
            var firstname=document.getElementById("firstname");
            var lastname=document.getElementById("lastname");
            var email=document.getElementById("email");
            var username=document.getElementById("username");
            var gender=document.getElementById("gender");
            var birthday=document.getElementById("birthday");
            var curr_pass=document.getElementById("curr_pass");
            var new_pass=document.getElementById("new_pass");
            var confirm_pass=document.getElementById("confirm_pass");
            var submit=document.getElementById("submit");

            if (firstname.disabled || lastname.disabled || email.disabled || username.disabled || gender.disabled || birthday.disabled || curr_pass.disabled || new_pass.disabled || confirm_pass.disabled)
            {
                firstname.disabled="";
                lastname.disabled="";
                email.disabled="";
                username.disabled="";
                gender.disabled="";
                birthday.disabled="";
                curr_pass.disabled="";
                new_pass.disabled="";
                confirm_pass.disabled="";
                submit.disabled="";

            }
            else
                {
                    firstname.disabled="disabled";
                    lastname.disabled="disabled";
                    email.disabled="disabled";
                    username.disabled="disabled";
                    gender.disabled="disabled";
                    birthday.disabled="disabled";
                    curr_pass.disabled="disabled";
                    new_pass.disabled="disabled";
                    confirm_pass.disabled="disabled";
                    submit.disabled="disabled"
                }
        }

//        function CheckImage() {
//            alert("Image loaded: " + document.getElementById("file").complete);
//        }

//        function PopImageUp(url) {
//            newwindow=window.open(url,'name','height=500,width=500');
//            if (window.focus) {newwindow.focus()}
//            return false;
//        }

    </script>

<?php

include "footer.html";
?>