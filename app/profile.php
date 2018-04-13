<?php
include "header.php";

if  ((isset($_GET['id']) && isset($_SESSION['u_username']) && $_GET['id']==$_SESSION['u_username'])
        ||
    (isset($_GET['media']) || isset($_GET['media-delete']) || isset($_GET['update']) || isset($_GET['inputs'])
        || isset($_GET['pass_inputs']) || isset($_GET['pass_error']) || isset($_GET['password-update'])
        || isset($_GET['confirmation_error']))
    )
    {
        include "dbc.php";
        $u_id = $_SESSION['u_id'];
        $sql = "Select * from users where id= '$u_id'";
        $result = mysqli_query($conn,$sql);
        $row = mysqli_fetch_assoc($result);
    }
else{
    echo '<script>window.location.href = "index-2.php?error=click_profile";</script>';
//    header("Location: index-2.php?error=click_profile");
//    exit();
}
?>

<html>
<body>
<?php
if (isset($_SESSION['update']) && $_SESSION['update']=="success")
{
    echo '<div class="breadcrumb-wrapper" style="background-color: chartreuse;height: 45px">';
    echo '<h3 class="page-title"><i style="color: white">Profile details was successfully updated!</i></h3> ';
    echo '</div>';
    unset($_SESSION['update']);
}
elseif(isset($_SESSION['update']) && $_SESSION['update']=="fail")
{
    echo '<div class="breadcrumb-wrapper" style="background-color: red;height: 45px">';
    echo '<h3 class="page-title"><i style="color: white">Profile details could\'t be updated!</i></h3> ';
    echo '</div>';
    unset($_SESSION['update']);
}
elseif(isset($_SESSION['password-update']) && $_SESSION['password-update']=="fail")
{
    echo '<div class="breadcrumb-wrapper" style="background-color: red;height: 45px">';
    echo '<h3 class="page-title"><i style="color: white">The Password Was Not Updated! PLease Try Again!</i></h3> ';
    echo '</div>';
    unset($_SESSION['password-update']);
}
?>
<section id="content">
<div class="container">
    <div class="row">
        <div class="col-md-12" style="background-color: lightgrey; border: inset">
            <form enctype="multipart/form-data" action="media.php" method="post">
            <div class="col-md-2 text-center" style="background-color: grey">
                <?php
                $username = $_SESSION['u_username'];
                $photo = $username.'-profile-photo';

                if (file_exists("images/users/$username/$username-profile-photo"))
                {
                    echo
                        '
                    <div class="courses-wrap">
                    <div class="thumb" style="color: white">
                    <center><img class="form-control" style="width: 200px; height: 200px;border-color: blue;" src="images/users/'.$username.'/'.$photo.'"></center>
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
                elseif($row['gender']=='male')
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
                elseif($row['gender']=='female')
                {
                    echo '
                        <div class="courses-wrap">
                        <div class="thumb" style="color: white">
                        <center><img class="form-control" style="width: 200px; height: 200px;border-color: blue" src="images/temporary/female.jpg"></center>
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
                ?>
                <input class="fa fa-save text-center" type="submit" value="Upload" name="submit" style="color: white;background-color: green;width: 100px;height: 40px">
                <br>
                <br>
                <br>
                <br>
                <pre><a href="delete-account.php?id=<?php echo $_SESSION['u_username']?>" class="fa fa-trash" onclick="return confirm('Are you sure to delete your Account?');" style="color: red"> Delete My Account</a></pre>
            </div>
                <div class="col-md-2">

                </div>
            </form>
            <form action="UpdateUser.php" method="post">
            <div class="col-md-10">
                <h3 style="background-color: grey"><?php echo $row['firstname'];?>-Profile</h3>
                <div class="col-md-6" style="background-color: grey;">
                    <?php
                    if (isset($_SESSION['inputs']) && $_SESSION['inputs']=="empty")
                    {
                        echo "\xe2\x9d\x8c".'<i style="color: #cb171e; background-color: white">You shouldn\'t keep empty field!</i>';
                        unset($_SESSION['inputs']);
                    }
                    ?>
                    <button class="fa fa-edit btn btn-block" type="button" style=" background-color: #00a8ff;color: white;height: 30px" onclick="EditData()"> Edit Profile Details</button>
                    <?php echo '<b><pre>First Name  :   <input disabled="disabled" type="text" name="firstname" id="firstname" value='.$row['firstname'].' size="25px"></pre></b>';?>
                    <?php echo '<b><pre>Last Name   :   <input disabled="disabled" type="text" name="lastname" id="lastname" value='.$row['lastname'].' size="25px"></pre></b>';?>
                    <?php echo '<b><pre>Email       :   <input disabled="disabled" type="text" name="email" id="email" value='.$row['email'].' size="25px"></pre></b>';?>
                    <?php echo '<b><pre>Username    :   <input disabled="disabled" type="text" name="username" id="username" value='.$row['username'].' size="25px"></pre></b>';?>
                    <?php echo '<b><pre>Gender      :   <input disabled="disabled" type="text" name="gender" id="gender" value='.$row['gender'].' size="25px"></pre></b>';?>
                    <?php echo '<b><pre style="height: 44px">Birthday    :   <input readonly disabled type="text" name="birthday" id="birthday" value='.$row['birthday'].' size="25px"> <input type="checkbox" onclick="EditBirth()" class="fa fa-edit"></pre></b>';?>
<!--                    <label style="color: white;" id="change_pass">Change Password <input type="checkbox" onclick="show_hide()"></label>-->
                </div>
                <div class="col-md-6" style=" background-color: grey;" id="password_form">
                    <input name="change_password" type="checkbox" onclick="EditPass()" style="transform: scale(1.5)"> <label style="color: white;">Change Password</label>
                    <?php
                    if (isset($_SESSION['pass_inputs']) && $_SESSION['pass_inputs']=="empty")
                    {
                        echo "\xe2\x9d\x8c".'<i style="color: #cb171e; background-color: white">You shouldn\'t keep empty field!</i>';
                        unset($_SESSION['pass_inputs']);
                    }

                    echo '<b><pre>Current Password     :   <input disabled type="password" name="curr_pass" id="curr_pass"></pre></b>';
                    if (isset($_SESSION['pass_error']) && $_SESSION['pass_error']=="incorrect_password")
                    {
                        echo "\xe2\x9d\x8c".'<i style="color: #cb171e; background-color: white">The Password you typed isn\'t correct!</i>';
                        unset($_SESSION['pass_error']);
                        echo '
                                <script>
                                    var curr_pass = document.getElementById("curr_pass");
                                    curr_pass.style.borderColor = "red";
                                </script>
                              ';
                    }

                    echo '<b><pre>New Passord          :   <input disabled type="password" name="new_pass" id="new_pass"></pre></b>';
                    if (isset($_SESSION['pass_error']) && $_SESSION['pass_error']=="rule_break")
                    {
                        echo "\xe2\x9d\x8c".'<i style="color: #cb171e; background-color: white">Password must be as follow!</i>';
                        unset($_SESSION['pass_error']);
                        echo '
                                <script>
                                    var new_pass = document.getElementById("new_pass");
                                    new_pass.style.borderColor = "red";
                                </script>
                              ';
                    }

                    echo '<b><pre>Confirm New Password :   <input disabled type="password" name="confirm_pass" id="confirm_pass"></pre></b>';
                        if (isset($_SESSION['confirmation_error']) && $_SESSION['confirmation_error']=="confirm_password")
                    {
                        echo "\xe2\x9d\x8c".'<i style="color: #cb171e; background-color: white">Confirm password correctly!</i>';
                        unset($_SESSION['confirmation_error']);
                        echo '
                                <script>
                                    var confirm_pass = document.getElementById("confirm_pass");
                                    confirm_pass.style.borderColor = "red";
                                </script>
                              ';
                    }

                    ?>

                    <p style="color: white">At least 8 chars,a uppercase,a lower case and a number or punctuation !!!</p>
                    <br>
                    <br>
                    <br>
                    <button disabled="disabled" class="fa fa-save btn btn-primary" type="submit" name="submit" id="submit" style=" background-color: blue;float: right;height: 35px;"> Save</button>

                </div>

            </div>
            </form>
        </div>
    </div>
</div>

</section>
</body>
</html>

    <script>

        function EditData() {
            var firstname=document.getElementById("firstname");
            var lastname=document.getElementById("lastname");
            var gender=document.getElementById("gender");
            var birthday = document.getElementById("birthday");
            var submit=document.getElementById("submit");

            if (firstname.disabled || lastname.disabled || gender.disabled || birthday.disabled)
            {
                firstname.disabled="";
                lastname.disabled="";
                gender.disabled="";
                submit.disabled="";
                birthday.disabled = "";
            }
        }

        function EditPass() {
            var curr_pass=document.getElementById("curr_pass");
            var new_pass=document.getElementById("new_pass");
            var confirm_pass=document.getElementById("confirm_pass");
            var submit=document.getElementById("submit");

            if (curr_pass.disabled || new_pass.disabled || confirm_pass.disabled)
            {
                curr_pass.disabled="";
                new_pass.disabled="";
                confirm_pass.disabled="";
                submit.disabled="";
            }
            else
                {
                    curr_pass.disabled="disabled";
                    new_pass.disabled="disabled";
                    confirm_pass.disabled="disabled";
                }
            }
            function EditBirth() {
                var birthday = document.getElementById("birthday");
                if(birthday.type==="text" || birthday.readOnly)
                {
                    birthday.type="date";
                    birthday.readOnly="";
                }
                else
                    {
                        birthday.type="text";
                        birthday.value = "<?php echo $row['birthday'];?>";
                        birthday.readOnly="readonly";
                    }
            }
//            function show_hide() {
//                var password_form = document.getElementById("password_form");
//                var change_pass = document.getElementById("change_pass");
//
//                password_form.style.visibility="visible";
//                change_pass.style.visibility ="hidden";
//            }
    </script>

<?php

include "footer.html";
?>