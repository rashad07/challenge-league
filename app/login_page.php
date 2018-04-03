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
if(isset($_SESSION['verification_success']))
{
    echo '<div class="breadcrumb-wrapper" style="background-color: chartreuse" >';
    echo '<h3 class="page-title"><i style="color: white">'.$_SESSION['verification_success'].'</i></h3> ';
    echo '</div>';
    unset($_SESSION['verification_success']);
}
if(isset($_SESSION['signup_success']))
{
    echo '<div class="breadcrumb-wrapper" style="background-color: chartreuse" >';
    echo '<h5><i style="color: white">'.$_SESSION['signup_success'].'</i></h5> ';
    echo '</div>';
    unset($_SESSION['signup_success']);
}
if(isset($_SESSION['signup_fail']))
{
    echo '<div class="breadcrumb-wrapper" style="background-color: red" >';
    echo '<h7><i style="color: white">'.$_SESSION['signup_fail'].'</i></h7> ';
    echo '</div>';
    unset($_SESSION['signup_fail']);
}
if(isset($_SESSION['login_success']))
{
    echo '<div class="breadcrumb-wrapper" style="background-color: chartreuse" >';
    echo '<h3 class="page-title"><i style="color: white"></i>You Have Successfully Logged In</h3> ';
    echo '</div>';
    unset($_SESSION['login_success']);

}
?>
<section id="content">
<div class="container">
<div class="row">
<div style="background-color: green" class="col-md-6">
<h2 class="medium-title">Login</h2>
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
    elseif (isset($_COOKIE['username']))
    {
        echo '<input style="color: blue" class="form-control" name="username" id="username" type="text" value='.$_COOKIE['username'].' >';
    }
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
    elseif (isset($_COOKIE['password']))
    {
        echo '<input style="color: blue" class="form-control" name="passwd" id="passwd" type="password" value='.$_COOKIE['password'].' >';
    }
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
<button type="submit" id="sub" name="sub" class="btn btn-common">Login</button>
</form>
</div>
<div style="background-color: #0a6ebd" class="col-md-6">
<h2 class="medium-title">Register</h2>

<form action="signup.php" method="POST">
<div class="col-md-6">
 <label style="color: white" for="fname">First Name<span style="color: #cb171e" class="required">*</span></label>
 <input style="color: black" class="form-control" name="fname" id="fname" type="text">
</div>
    <div class="col-md-6">
 <label style="color: white" for="lname">Last Name<span style="color: #cb171e" class="required">*</span></label>
 <input style="color: black" class="form-control" name="lname" id="lname" type="text">
    </div>
    <div class="col-md-6">
    <label style="color: white" for="gender">Gender<span style="color: #cb171e" class="required">*</span></label>
    <select class="form-control" style="float: right; color: black" name="gender" id="gender" >
        <div>
            <option disabled selected value="Choose one">Choose one</option>
            <option value="male">Male</option>
            <option value="female">Female</option>
        </div>
    </select>
    </div>
    <div class="col-md-6">
    <label style="color: white" for="birthday">Birthday<span style="color: #cb171e" class="required">*</span></label><br>
        <select class="form-control col-md-2" name='day' id='day' style="width: 75px; color: black">
        <option disabled selected value="Day">Day</option>
        <option value='1'>1</option>
        <option value='2'>2</option>
        <option value='3'>3</option>
        <option value='4'>4</option>
        <option value='5'>5</option>
        <option value='6'>6</option>
        <option value='7'>7</option>
        <option value='8'>8</option>
        <option value='9'>9</option>
        <option value='10'>10</option>
        <option value='11'>11</option>
        <option value='12'>12</option>
        <option value='13'>13</option>
        <option value='14'>14</option>
        <option value='15'>15</option>
        <option value='16'>16</option>
        <option value='17'>17</option>
        <option value='18'>18</option>
        <option value='19'>19</option>
        <option value='20'>20</option>
        <option value='21'>21</option>
        <option value='22'>22</option>
        <option value='23'>23</option>
        <option value='24'>24</option>
        <option value='25'>25</option>
        <option value='26'>26</option>
        <option value='27'>27</option>
        <option value='28'>28</option>
        <option value='29'>29</option>
        <option value='30'>30</option>
        <option value='31'>31</option>
    </select>
    <select class="form-control col-md-2" name='month' id='month' style="width: 90px; color: black">
        <option disabled selected value="Month">Month</option>
        <option value='1'>1</option>
        <option value='2'>2</option>
        <option value='3'>3</option>
        <option value='4'>4</option>
        <option value='5'>5</option>
        <option value='6'>6</option>
        <option value='7'>7</option>
        <option value='8'>8</option>
        <option value='9'>9</option>
        <option value='10'>10</option>
        <option value='11'>11</option>
        <option value='12'>12</option>
    </select>
    <select class="form-control col-md-2" name='year' id='year' style="width: 80px; color: black">
        <option disabled selected value="Year">Year</option>
        <option value='1946'>1946</option>
        <option value='1947'>1947</option>
        <option value='1948'>1948</option>
        <option value='1949'>1949</option>
        <option value='1950'>1950</option>
        <option value='1951'>1951</option>
        <option value='1952'>1952</option>
        <option value='1953'>1953</option>
        <option value='1954'>1954</option>
        <option value='1955'>1955</option>
        <option value='1956'>1956</option>
        <option value='1957'>1957</option>
        <option value='1958'>1958</option>
        <option value='1959'>1959</option>
        <option value='1960'>1960</option>
        <option value='1961'>1961</option>
        <option value='1962'>1962</option>
        <option value='1963'>1963</option>
        <option value='1964'>1964</option>
        <option value='1965'>1965</option>
        <option value='1966'>1966</option>
        <option value='1967'>1967</option>
        <option value='1968'>1968</option>
        <option value='1969'>1969</option>
        <option value='1970'>1970</option>
        <option value='1971'>1971</option>
        <option value='1972'>1972</option>
        <option value='1973'>1973</option>
        <option value='1974'>1974</option>
        <option value='1975'>1975</option>
        <option value='1976'>1976</option>
        <option value='1977'>1977</option>
        <option value='1978'>1978</option>
        <option value='1979'>1979</option>
        <option value='1980'>1980</option>
        <option value='1981'>1981</option>
        <option value='1982'>1982</option>
        <option value='1983'>1983</option>
        <option value='1984'>1984</option>
        <option value='1985'>1985</option>
        <option value='1986'>1986</option>
        <option value='1987'>1987</option>
        <option value='1988'>1988</option>
        <option value='1989'>1989</option>
        <option value='1990'>1990</option>
        <option value='1991'>1991</option>
        <option value='1992'>1992</option>
        <option value='1993'>1993</option>
        <option value='1993'>1994</option>
        <option value='1993'>1995</option>
        <option value='1993'>1996</option>
        <option value='1993'>1997</option>
        <option value='1993'>1998</option>
        <option value='1993'>1999</option>
        <option value='1993'>2000</option>
        <option value='1993'>2001</option>
        <option value='1993'>2002</option>
        <option value='1993'>2003</option>
    </select>
    </div>

    <div class="col-md-12">
 <label style="color: white" for="uname">Username</label>
    <?php
    if (isset($_SESSION['exist_username'])) {
        echo "\xe2\x9d\x8c"."<i style='color: red; background-color: white'>" . $_SESSION['exist_username'] ."</i>";
        unset($_SESSION['exist_username']);
    }
    ?>
    <input style="color: black" class="form-control" name="uname" id="uname" type="text">
    </div>
    <div class="col-md-12">
    <label style="color: white" for="email">Email address<span style="color: #cb171e" class="required">*</span></label>
        <?php
        if (isset($_SESSION['exist_email'])) {
            echo "\xe2\x9d\x8c"."<i style='color: red; background-color: white'>" . $_SESSION['exist_email'] ."</i>";
            unset($_SESSION['exist_email']);
        }
        ?>
    <input style="color: black" class="form-control" name="email" id="email" type="text">
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
        <p style="color: white">At least 8 chars,a uppercase,a lower case and a number or punctuation !!!</p>

    </div>

    <div class="col-md-8">
        <label style="color: white" for="password">Confirm Password <span style="color: #cb171e" class="required">*</span></label>
        <?php
        if (isset($_SESSION['password_match']))
        {
            echo "\xe2\x9d\x8c"."<i style='color: red; background-color: white'>" . $_SESSION['password_match'] . "</i>";
            unset($_SESSION['password_match']);
        }
        ?>
        <input style="color: black" class="form-control input-sm" name="c_password" id="c_password" type="password">

        </div>
    <div class="col-md-4">
        <input type="button" class="form-control" onclick="myFunction()" style="background-color: inherit;border-color: #cb171e;color: yellow; height: 78px" value="Show Password">
        <!--        <label class="container" style="color: white">Show Password-->
        <!--            <input type="checkbox" onclick="myFunction()">-->
        <!--            <span class="checkmark"></span>-->
        <!--        </label>-->
        <!--        <link rel="stylesheet" href="assets/css/checkbox.css">-->
    </div>

    <script>
        function myFunction() {
            var x = document.getElementById("password");
            var y = document.getElementById("c_password");
            if (x.type === "password" || y.type === "password") {
                x.type = "text";
                y.type = "text";
            } else {
                x.type = "password";
                y.type = "password";
            }
        }
    </script>
<div>
    <center><button style=" background-color: green" type="submit" name="submit" id="submit" class="btn btn-common">Register</button></center>
</div>
</form>
</div>
</div>
</div>
</section>


<div class="cta">
<div class="container">
<div class="row">
<div class="col-md-8 col-sm-8">
<h3>Learning Management System</h3>
</div>
<div class="col-md-4 col-sm-4">
<a href="#" class="btn btn-border">Creat Account</a>
</div>
</div>
</div>
</div>


<?php
include 'footer.html';
?>

