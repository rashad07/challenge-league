<?php
include 'dbc.php';
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
if(isset($_SESSION['signup_success']) && !isset($_SESSION['verification_success']))
{
    echo '<div class="breadcrumb-wrapper" style="background-color: chartreuse" >';
    echo '<h5><i style="color: white">'.$_SESSION['signup_success'].'</i></h5> ';
    echo '</div>';
    unset($_SESSION['signup_success']);
}
if(isset($_SESSION['verification_success']))
{
    echo '<div class="breadcrumb-wrapper" style="background-color: chartreuse" >';
    echo '<h3 class="page-title"><i style="color: white">'.$_SESSION['verification_success'].'</i></h3> ';
    echo '</div>';
    unset($_SESSION['verification_success']);
}
if(isset($_SESSION['password-update']) && $_SESSION['password-update']=="success")
{
    echo '<div class="breadcrumb-wrapper" style="background-color: chartreuse" >';
    echo '<h3 class="page-title"><i style="color: white">The Password Was Successfully Updated! PLease Log In Again!</i></h3> ';
    echo '</div>';
    unset($_SESSION['password-update']);
}

?>
<section id="content">
<div class="container">
<div class="row">
<div style="background-color: #0a6ebd;left: 25%" class="col-md-6">
<center><h2 class="medium-title">Login</h2></center>
    <?php
    if (isset($_SESSION['empty_error']))
    {
        echo "\xe2\x9d\x8c".'<i style="color: #cb171e; background-color: white">'.$_SESSION['empty_error'].'</i>';
        unset($_SESSION['empty_error']);
    }
    ?>

<form method="POST" class="login" action="signin.php">
<div class="form-group">
<label style="color: white" for="username">Username or e-mail address</label>
    <?php
    if (isset($_SESSION['login_error']))
    {
        echo "\xe2\x9d\x8c".'<i style="color: #cb171e; background-color: white">'.$_SESSION['login_error'].'</i>';
        unset($_SESSION['login_error']);
    }
    if (isset($_SESSION['username']))
    {
        $value = $_SESSION['username'];
        echo '<input style="color: black" class="form-control" name="username" id="username" type="text" value='.$value.' >';
//        unset($_SESSION['username']);
    }
//    elseif (isset($_COOKIE['username']))
//    {
//        echo '<input style="color: blue" class="form-control" name="username" id="username" type="text" value='.$_COOKIE['username'].' >';
//    }
    else
        {
            echo '<input style="color: black" class="form-control" name="username" id="username" type="text" >';
        }
    ?>
</div>
<div class="form-group">
<label style="color: white" for="passwd">Password</label>
    <?php
    if (isset($_SESSION['incorrect_password']))
    {
        echo "\xe2\x9d\x8c".'<i style="color: #cb171e; background-color: white">'.$_SESSION['incorrect_password'].'</i>';
        unset($_SESSION['incorrect_password']);
    }
    if (isset($_SESSION['password']))
    {
        $value = $_SESSION['password'];
        echo '<input style="color: black" class="form-control" name="passwd" id="passwd" type="password" value='.$value.' >';
        unset($_SESSION['password']);
    }
//    elseif (isset($_COOKIE['password']))
//    {
//        echo '<input style="color: blue" class="form-control" name="passwd" id="passwd" type="password" value='.$_COOKIE['password'].' >';
//    }
    else
        {
            echo '<input style="color: black" class="form-control" name="passwd" id="passwd" type="password">';
        }
    ?>
</div>
<div class="form-group">
<label style="color: white" for="rememberme" class="inline">
<input name="rememberme" id="rememberme" type="checkbox">Remember me</label>
<a style="color: white" href="#">Lost your password?</a>
</div>
<center>
    <button style="background-color: green" type="submit" id="sub" name="sub" class="btn btn-common">Login</button><br>
    <a style="color: white" href="register.php"><u>Create New Account</u></a>
</center>

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

