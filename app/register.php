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
            <div style="background-color: #0a6ebd;left: 25%" class="col-md-6">
                <center><h2 class="medium-title">Register</h2></center>

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
                            ?>
                            <option value='01'>01</option>
                            <option value='02'>02</option>
                            <option value='03'>03</option>
                            <option value='04'>04</option>
                            <option value='05'>05</option>
                            <option value='06'>06</option>
                            <option value='07'>07</option>
                            <option value='08'>08</option>
                            <option value='09'>09</option>
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

                            <?php
                            if (isset($_SESSION['month']))
                            {
                                echo '<option>'.$_SESSION['month'].'</option>';
                            }
                            else
                            {
                                echo '<option disabled selected value="Month">Month</option>';
                            }
                            ?>
                            <option value='01'>01</option>
                            <option value='02'>02</option>
                            <option value='03'>03</option>
                            <option value='04'>04</option>
                            <option value='05'>05</option>
                            <option value='06'>06</option>
                            <option value='07'>07</option>
                            <option value='08'>08</option>
                            <option value='09'>09</option>
                            <option value='10'>10</option>
                            <option value='11'>11</option>
                            <option value='12'>12</option>
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
                            ?>
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
                            <option value='1994'>1994</option>
                            <option value='1995'>1995</option>
                            <option value='1996'>1996</option>
                            <option value='1997'>1997</option>
                            <option value='1998'>1998</option>
                            <option value='1999'>1999</option>
                            <option value='2000'>2000</option>
                            <option value='2001'>2001</option>
                            <option value='2002'>2002</option>
                            <option value='2003'>2003</option>
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