<?php
include "header.php";

if (isset($_SESSION['u_id'])) {
    if ((isset($_GET['id']) && isset($_SESSION['u_username']) && $_GET['id'] == $_SESSION['u_username'])
        ||
        (isset($_GET['upload_media']) || isset($_GET['media-delete']) || isset($_GET['update']) || isset($_GET['inputs'])
            || isset($_GET['pass_inputs']) || isset($_GET['pass_error']) || isset($_GET['password-update'])
            || isset($_GET['confirmation_error']) || isset($_SESSION['delete-account']))
    ) {
        include "dbc.php";
        $u_id = $_SESSION['u_id'];
        $sql = "Select * from users where id= '$u_id'";
        if($result = @mysqli_query($conn, $sql))
        {
        $row = mysqli_fetch_assoc($result);
            mysqli_close($conn);
        }
        else{
            echo '<br><span style="font-size: 26px;">Couldn\'t make connection to the database!</span><br><br>';
            include 'footer.html';
            exit();
        }
    } else {
        echo '<script>window.location.href = "index-2.php?error=click_profile";</script>';
//    header("Location: index-2.php?error=click_profile");
//    exit();
    }
}
else{
    echo '<br><br><center>
            <span style="font-size: 26px;">There isn\'t any user in the session!</span><br>
            <a href="login.php" style="text-decoration: underline">Log In Now</a>
            </center><br><br>';
    include 'footer.html';
    exit();

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
elseif(isset($_SESSION['delete-account']) && $_SESSION['delete-account']=="fail")
{
    echo '<div class="breadcrumb-wrapper" style="background-color: red;height: 45px">';
    echo '<h3 class="page-title"><i style="color: white">Account couldn\'t be deleted! Please try again!</i></h3> ';
    echo '</div>';
    unset($_SESSION['delete-account']);
}
?>
<section id="content">
<div class="container">
    <div class="row">
        <div class="col-md-12" style="border-radius: 15px;background-color: #0a6ebd">
            <form enctype="multipart/form-data" action="upload.php" method="post">
            <div class="col-md-2 text-center" style="background-color: #67ae73">
                <?php
                $username = $_SESSION['u_username'];
                include "dbc.php";
                $sql_media = "Select * from media where user_id ='$u_id' order by uploaded_at desc";
                if($result_media =@mysqli_query($conn,$sql_media))
                {
                if (mysqli_num_rows($result_media)>0) {
                    $row_media = mysqli_fetch_assoc($result_media);
                    $imagename = $row_media['name'];
                    $imagepath = "images/users/$username/$imagename";
                    if (file_exists("images/users/$username/$imagename")) {
                        echo
                            '
                    <div class="courses-wrap" style="border-radius: 10px;">
                    <div class="thumb" style="color: white">
                    <center><img class="form-control" style="width: 200px; height: 200px;border-color: blue;" src="'.$imagepath.'"></center>
                    <div class="courses-price">
                    <label style="cursor:pointer;color: white; background-color: blue;opacity:0.5;position:relative;bottom: 20px" class="fa fa-upload form-control" id="upload">Upload Picture<br>
                    <input type="file" class="hidden" name="profile_image" onchange="getData(this.value)" id="profile_image">  
                    <i style="color: #e6db74">No more than 2MB</i>
                    </label>
                    <a onclick="target_popup(this)" style="cursor:pointer;color: black;opacity:0.5;position: relative;bottom: 50px" class="form-control" >View Image</a>
                    </div>
                    </div>
                    </div>
                    <div style="position: relative;bottom: 55px;right: 0px;">
                    <a href="delete-media.php">
                    <u style="color: white;background-color: red">Delete Photo</u>
                    </a><br>
                    
                    </div>
                    <script>
                    function target_popup(form) {
                        var imagepath = "'.$imagepath.'";
                       window.open(imagepath, "formpopup", "width=1000,height=600,top=40,left=200,resizeable,scrollbars");
                       form.target = "formpopup";
                                       }
                    </script>
                    ';
                    }
                }
                elseif($row['gender']=='male')
                    {
                        echo '
                        <div class="courses-wrap" style="border-radius: 10px;">
                        <div class="thumb" style="color: white;">
                        <center><img class="form-control" style="width: 200px; height: 200px;border-color: blue" src="images/temporary/male.jpg"></center>
                        <div class="courses-price">
                        <label style="color: white; background-color: blue;opacity: 0.5" class="fa fa-upload form-control" id="upload">Upload Picture<br>
                        <input type="file" class="hidden" name="profile_image" onchange="getData(this.value)" id="profile_image">
                        <i style="color: #e6db74;text-decoration: underline">No more than 2MB</i>
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
                        <div class="courses-wrap" style="border-radius: 10px;">
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
                    mysqli_close($conn);
                }
                else{
                    echo '<br><span style="font-size: 26px;color: white">Couldn\'t make connection to the database uploading photo!</span>';
                }
                ?>

                <input disabled="disabled" class="btn-common text-center" type="submit" value="Upload" id="submit_media" name="submit" style="border-radius: 5px;color: white;background-color: blue;width: 100px;height: 40px"><br>
                <span style="color: white" id="imagename"></span>
                <script>
                    function getData(val) {
                        var separator = ["\\"];
                        var parts = val.split(separator[0]);
                        var imagename = parts[parts.length - 1]; // Or parts.pop();
                        document.getElementById("imagename").innerHTML = imagename;
                        var upload = document.getElementById("submit_media");
                        if (upload.disabled)
                        {
                            upload.disabled="";
                        }
                    }
                </script>
                <br>
                <br>
                <br>
                <pre><a href="delete-account.php?id=<?php echo $_SESSION['u_username']?>" class="fa fa-trash" onclick="return confirm('Are you sure to delete your Account?');" style="color: red"> Delete My Account</a></pre>
            </div>
                <div class="col-md-2">

                </div>
            </form>
            <form action="updateUser.php" method="post">
            <div class="col-md-10" style="font-style: italic">
                <h3 style="background-color: ;color: white;"><?php echo $row['firstname'];?>-Profile</h3>
                <div class="col-md-6" >
                    <?php
                    if (isset($_SESSION['inputs']) && $_SESSION['inputs']=="empty")
                    {
                        echo "\xe2\x9d\x8c".'<i style="color: #cb171e; background-color: white">You shouldn\'t keep empty field!</i>';
                        unset($_SESSION['inputs']);
                    }
                    ?>
                    <button class="fa fa-edit btn btn-block" type="button" style="border-radius: 5px;background-color: #4e5b6c;color: white;height: 30px;font-style: italic" onclick="editData()"> Edit Profile Details</button>
                    <?php echo '<b><pre>First Name  :   <input disabled="disabled" type="text" name="firstname" id="firstname" value='.$row['firstname'].' size="25px"></pre></b>';?>
                    <?php echo '<b><pre>Last Name   :   <input disabled="disabled" type="text" name="lastname" id="lastname" value='.$row['lastname'].' size="25px"></pre></b>';?>
                    <?php echo '<b><pre>Email       :   <input disabled="disabled" type="text" name="email" id="email" value='.$row['email'].' size="25px"></pre></b>';?>
                    <?php echo '<b><pre>Username    :   <input disabled="disabled" type="text" name="username" id="username" value='.$row['username'].' size="25px"></pre></b>';?>
                    <?php echo '<b><pre>Gender      :   <input disabled="disabled" type="text" name="gender" id="gender" value='.$row['gender'].' size="25px"></pre></b>';?>
                    <?php echo '<b><pre style="height: 44px">Birthday    :   <input readonly disabled type="text" name="birthday" id="birthday" value='.$row['birthday'].' size="25px"> <input type="checkbox" onclick="editBirth()" class="fa fa-edit"></pre></b>';?>
<!--                    <label style="color: white;" id="change_pass">Change Password <input type="checkbox" onclick="show_hide()"></label>-->
                </div>
                <div class="col-md-6" style=" background-color: ;" id="password_form">
                    <input name="change_password" type="checkbox" onclick="editPass()" style="transform: scale(1.5)"> <label style="color: white;">Change Password</label>
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
                    if (isset($_SESSION['pass_error']) && $_SESSION['pass_error']=="sameness")
                    {
                        echo "\xe2\x9d\x8c".'<i style="color: #cb171e; background-color: white">Try a new Password!</i>';
                        unset($_SESSION['pass_error']);
                        echo '
                                <script>
                                    var curr_pass = document.getElementById("curr_pass");
                                    var new_pass = document.getElementById("new_pass");
                                    
                                    curr_pass.style.borderColor = "red";
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

                    <p style="color: white">At least 8 chars including an uppercase,a lower case and a number or punctuation !!!</p>
                    <br>
                    <br>
                    <br>
                    <button disabled="disabled" class="fa fa-save btn btn-success" type="submit" name="submit" id="submit" style="border-radius: 5px; background-color:  ;float: right;height: 37px;"> Save</button>

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

        function editData() {
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

        function editPass() {
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
            function editBirth() {
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