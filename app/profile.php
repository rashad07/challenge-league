<?php

include "dbc.php";
include "header.php";
?>

<html>
<body>
<section id="content">
<div class="container">
    <div class="row">
        <div class="col-md-12" style="background-color: lightgrey; border: inset;">
            <div class="col-md-2" style="background-color: grey"><br>
            <img class="form-control" style="width: 200px; height: 200px;" src="assets/img/portfolio/Rashad.jpg">
            </div>
            <div class="col-md-10">
                <h3 style="background-color: grey"><?php echo $_SESSION['u_fname'];?>-Profile</h3>
                <div class="col-md-5" style="background-color: white;"><br>
                    <?php echo '<b><pre>Full Name   :   '.$_SESSION['u_fname'].' '.$_SESSION['u_lname'].'</pre></b>';?>
                    <?php echo '<b><pre>Email       :   '.$_SESSION['u_email'].'</pre></b>';?>
                    <?php echo '<b><pre>Username    :   '.$_SESSION['u_username'].'</pre></b>';?>
                    <?php echo '<b><pre>Gender      :   '.$_SESSION['u_gender'].'</pre></b>';?>
                    <?php echo '<b><pre>Birthday    :   '.$_SESSION['u_bday'].'</pre></b>';?>
                </div>
                <div class="form-group" style="background-color: white"><br>
                </div>
            </div>
        </div>
    </div>
</div>

</section>
</body>
</html>


<?php

include "footer.html";
?>