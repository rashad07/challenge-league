<?php
if (isset($_GET['click_profile'])) {
    include "dbc.php";
    include "header.php";
}
else{
    header("Location: login_page.php?error=must_login");
}
?>

<html>
<body>
<section id="content">
<div class="container">
    <div class="row">
        <div class="col-md-12" style="background-color: lightgrey; border: inset;">
            <form action="media.php" method="post">
            <div class="col-md-2 text-center" style="background-color: grey">
            <img class="form-control" style="width: 200px; height: 200px;" src="assets/img/portfolio/Rashad.jpg">
                <label style="color: white; background-color: red" class="fa fa-upload form-control" id="upload">Upload Picture<br>
                    <input type="file" class="hidden" name="data" id="file">
                    <i style="color: #e6db74">No more than 2MB</i>
                </label>
                <button class="fa fa-save" type="submit" name="submit" style="background-color: green">Save</button>
            </div>
            </form>
            <div class="col-md-10">
                <h3 style="background-color: grey"><?php echo $_SESSION['u_fname'];?>-Profile</h3>
                <div class="col-md-6" style="background-color: grey;"><br>
                    <?php echo '<b><pre>First Name  :   <input disabled type="text" name="firstname" id="firstname" value='.$_SESSION['u_fname'].'></pre></b>';?>
                    <?php echo '<b><pre>Last Name   :   <input disabled type="text" name="lastname" id="lastname" value='.$_SESSION['u_lname'].'></pre></b>';?>
                    <?php echo '<b><pre>Email       :   <input disabled type="text" name="email" id="email" value='.$_SESSION['u_email'].'></pre></b>';?>
                    <?php echo '<b><pre>Username    :   <input disabled type="text" name="username" id="username" value='.$_SESSION['u_username'].'></pre></b>';?>
                    <?php echo '<b><pre>Gender      :   <input disabled type="text" name="gender" id="gender" value='.$_SESSION['u_gender'].'></pre></b>';?>
                    <?php echo '<b><pre>Birthday    :   <input disabled type="text" name="birthday" id="birthday" value='.$_SESSION['u_bday'].'></pre></b>';?>
                </div>
                <div class="col-md-6" style="background-color: grey;"><br>
                    <button class="fa fa-edit" type="button" style="background-color: #00a8ff;color: white" onclick="Edit()"> Edit</button>

                    <?php echo '<b><pre>Current Password     :   <input type="text" name="firstname" id="firstname"></pre></b>';?>
                    <?php echo '<b><pre>New Passord          :   <input type="text" name="lastname" id="lastname"></pre></b>';?>
                    <?php echo '<b><pre>Confirm New Password :   <input type="text" name="email" id="email"></pre></b>';?>
                    </div>
            </div>
            <button class="fa fa-save" type="submit" name="submit" id="submit" style=" background-color: blue;float: right"> Save</button>
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

            if (firstname.disabled || lastname.disabled || email.disabled || username.disabled || gender.disabled || birthday.disabled)
            {
                firstname.disabled="";
                lastname.disabled="";
                email.disabled="";
                username.disabled="";
                gender.disabled="";
                birthday.disabled="";
            }
            else
                {
                    firstname.disabled="disabled";
                    lastname.disabled="disabled";
                    email.disabled="disabled";
                    username.disabled="disabled";
                    gender.disabled="disabled";
                    birthday.disabled="disabled";
                }
        }

//        function CheckImage() {
//            alert("Image loaded: " + document.getElementById("file").complete);
//        }
    </script>

<?php

include "footer.html";
?>