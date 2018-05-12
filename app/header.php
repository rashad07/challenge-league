<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from demo.graygrids.com/themes/app/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 20 Mar 2018 19:58:16 GMT -->
<head>
    <style>
        a:hover{
            border-radius: 15px;
        }
    </style>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="app">

    <title>Challenge-League</title>

    <link rel="stylesheet" href="assets/css/bootstrap.min.css">

    <link rel="stylesheet" href="assets/css/main.css">

    <link rel="stylesheet" href="assets/css/normalize.css">

    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">

    <link rel="stylesheet" href="assets/css/color-switcher.css" type="text/css">

    <link rel="stylesheet" href="assets/extras/animate.css" type="text/css">

    <link rel="stylesheet" href="assets/extras/owl.carousel.css" type="text/css">
    <link rel="stylesheet" href="assets/extras/owl.theme.css" type="text/css">

    <link rel="stylesheet" href="assets/extras/settings.css" type="text/css">

    <link rel="stylesheet" href="assets/extras/nivo-lightbox.css" type="text/css">

    <link rel="stylesheet" href="assets/css/slicknav.css" type="text/css">

    <link rel="stylesheet" href="assets/css/responsive.css">

    <link rel="stylesheet" type="text/css" href="assets/css/colors/sky.css" media="screen" />

    <link rel="stylesheet" href="assets/css/exam.css" type="text/css">


</head>


<body>

<header id="header-wrap">

<!--    <div id="roof" class="hidden-xs" style="background-color: #4e5b6c">-->
<!--        <div class="container">-->
<!--            <div class="pull-left">-->
<!--            </div>-->
<!--            <div class="quick-contacts pull-right">-->
<!--                <span><i class="fa fa-phone"></i> +994 51 413 88 49</span>-->
<!--                <span><i class="fa fa-envelope"></i><a href="#">challengeleague1@gmail.com</a> </span>-->
<!--                <span><i class="fa fa-envelope"></i><a href="#"><span class="__cf_email__" data-cfemail="e189848d8d8ea1839388868995948f8897849392889598cf848594">[email&#160;protected]</span></a></span>-->
<!--                --><?php
//                    if (isset($_SESSION['u_id']))
//                    {
//                        $u_id = $_SESSION['u_id'];
//                        include_once 'dbc.php';
//                        $sql = "Select * from users where id='$u_id'";
//                        $result = mysqli_query($conn,$sql);
//                        $row = mysqli_fetch_assoc($result);
//                        echo '<span><a href="signout.php?logout"><i style="color: deepskyblue" class="fa fa-sign-out"> Logout</i></a> <a href="profile.php?id='.$row['username'].'"><i class="fa fa-user"> ' .$row['firstname'].'</i></a></span>';
//                    }
//                    else
//                        {
//                            echo '<span><a style="color: deepskyblue" href="login.php"><i class="fa fa-sign-in"></i> Login</a> / <a style="color: deepskyblue" href="register.php">Register</a></span>';
//                        }
//                    ?>
<!--            </div>-->
<!---->
<!--        </div>-->
<!--    </div>-->


    <nav class="navbar navbar-default main-navigation" role="navigation" data-spy="affix" data-offset-top="50" >
        <div class="container">

            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" style="position: relative;top: 5px" href="index-2.php"><img src="assets/img/logo.png" alt=""></a>
                <form class="form-inline" action="searchResult.php" method="post" style="float: left;position: relative;top: 10px;left: 20px">
                        <input style="border-radius:15px;visibility:hidden;width: 250px;" class="form-control" type="text" name="search" id="search" placeholder="Search">
                        <a href="#" onclick="showSearch()" id="open-search" style="position:relative;left: -125px;top: -15px;background:deepskyblue;color:#fff;border-radius:50px;display:inline-block;height:36px;cursor:pointer;line-height:35px;text-align:center;width:36px">
                            <i class="fa fa-search"></i>
                        </a>
                    <a id="close-search" onclick="clearSearch()" class="close-search" style="visibility:hidden">
                        <span class="fa fa-times" style="position:relative;left: -90px;top: -15px;background:red;color:#fff;border-radius:50px;display:inline-block;height:36px;cursor:pointer;line-height:35px;text-align:center;width:36px">
                        </span>
                    </a>
                </form>
            </div>

            <script>
                function showSearch() {
                    document.getElementById("open-search").style.visibility= "hidden";
                    document.getElementById("search").style.visibility = "visible";
                    document.getElementById("close-search").style.visibility = "visible";
                }
                function clearSearch() {
//                    document.getElementById("close-search").style.visibility = "hidden";
//                    document.getElementById("open-search").style.visibility= "visible";
                    document.getElementById("search").value = "hidden";

                }
            </script>

            <div class="collapse navbar-collapse" id="navbar" style="position: absolute;right: 20px;">
                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown dropdown-toggle">
                        <a class="active" href="index-2.php"><i class="fa fa-home" style="margin-top: -3px;font-size: 24px"></i></a>
                        <ul class="dropdown-menu">

                        </ul>
                    </li>
                    <li class="dropdown dropdown-toggle">
                        <a href="#" data-toggle="dropdown">Bachelor <i class="fa fa-angle-down"></i></a>
                        <ul class="dropdown-menu">
                            <li><a href="#">I Group</a></li>
                            <li><a href="#">II Group</a></li>
                            <li><a href="#">III Group</a></li>
                            <li><a href="#">IV Group</a></li>
                        </ul>
                    </li>

                    <li class="dropdown dropdown-toggle">
                        <a href="#" data-toggle="dropdown">Master <i class="fa fa-angle-down"></i></a>
                        <ul class="dropdown-menu">
                            <li><a href="#">I tur</a></li>
                            <li><a href="#">II tur</a></li>
                        </ul>
                    </li>

                    <li class="dropdown dropdown-toggle">
                        <a href="#" data-toggle="dropdown">Others <i class="fa fa-angle-down"></i></a>
                        <ul class="dropdown-menu">
                            <li><a href="it-main.php">IT</a></li>
                            <li><a href="language-main.php">Language</a></li>

                        </ul>
                    </li>








                    <li class="dropdown dropdown-toggle">
                        <a class="" href="#" data-toggle="dropdown">Info <i class="fa fa-angle-down"></i></a>
                        <ul class="dropdown-menu">
                            <li><a class="" href="about.php">About Page</a></li>
                            <li><a href="about-our-team.php"> About Us</a></li>


                        </ul>
                    </li>

                    <li><a href="contact-page.php">Contact</a></li>
                    <?php
                    if (isset($_SESSION['u_id']))
                    {
                        $u_id = $_SESSION['u_id'];
                        include_once 'dbc.php';
                        //retrieve user
                        $sql = "Select * from users where id='$u_id'";
                        $result = mysqli_query($conn,$sql);
                        $row = mysqli_fetch_assoc($result);

                        echo '
                        <li class="dropdown dropdown-toggle" style="padding-top: 14px">
                        <a style="cursor:pointer;border-radius: 50px;height: 20px;padding-top: 10px;width: 135px;line-height:20px;text-align: center;background-color:black;color: deepskyblue">
                        ';
                        ?>
                        <?php
                        //retrieve media
                        $sql_media = "Select * from media where user_id ='$u_id' order by uploaded_at desc";
                        if ($result_media =@mysqli_query($conn,$sql_media))
                        {
                            mysqli_close($conn);
                            $row_media = mysqli_fetch_assoc($result_media);
                            $imagename = $row_media['name'];
                            echo '
                            <img style="width: 20px; height: 20px;border-radius: 3px;" src="images/users/' . $row['username'] . '/' . $imagename . '"> ' .$row['firstname'].'
                            ';
                        }
                        ?>
                    <?php
                    echo '
                        <i class="fa fa-angle-down"></i></a>
                        <ul class="dropdown-menu" style="position:absolute;width: 10px;background-color: black;border-radius: 10px;min-width: 150px">
                            <li><a href="profile.php?id='.$row['username'].'"><i style="color: white" class="fa fa-user"> Profile</i></a></li> 
                            <li><a id="asdf" href="signout.php?logout"><i style="color: white" class="fa fa-sign-out"> Logout</i></a></li>
                            <style>
                            a["asdf"]:active{color:red}
                            </style>
                        </ul>
                        </li>
                        ';
                    }
                    else
                    {
                        echo '<li class="dropdown dropdown-toggle" style="padding-top: 14px">
                                <a style="border-radius: 50px;height: 20px;padding-top: 10px;width: 100px;line-height:20px;text-align: center;background-color:black;color: deepskyblue" href="login.php"><i class="fa fa-sign-in"></i> Login</a>
                                </li>
                                <li class="dropdown dropdown-toggle" style="padding-top: 14px">
                                <a style="border-radius: 50px;height: 20px;padding-top: 10px;width: 100px;line-height:20px;text-align: center;background-color:black;color: deepskyblue" href="register.php">Register</a>
                                </li>
                             ';
                    }
                    ?>
                </ul>
            </div>

            <ul class="wpb-mobile-menu">
                <li>
                    <a class="active" href="index-2.php">Home</a>
                    <ul>
                        <li><a class="active" href="index-2.php">Home Page 1</a></li>
                        <li><a href="index-1.html">Home Page 2</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#">Bachelor</a>
                    <ul>
                        <li><a href="courses-list.html">Courses List</a></li>
                        <li><a href="courses-grid.html">Courses Grid</a></li>
                        <li><a href="courses-single.html">Single Course</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#">Pages</a>
                    <ul>
                        <li><a href="about.php">About Page</a></li>
                        <li><a href="gallery.html">Image Gallery</a></li>
                        <li><a href="faq.html">FAQ</a></li>
                        <li><a href="login.php">Login Page</a></li>
                        <li><a href="single-teacher.html">Single Teacher</a></li>
                        <li><a href="registration.html">Registration Form</a></li>
                        <li><a href="contact-page.php">Contacts</a></li>
                        <li><a href="404.html">404</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#">Events</a>
                    <ul>
                        <li><a href="event-grid.html">Events Grid</a></li>
                        <li><a href="event.html">Single Event</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#">Blog</a>
                    <ul>
                        <li><a href="blog.html">Blog - Right Sidebar</a></li>
                        <li><a href="blog-left-sidebar.html">Blog - Left Sidebar</a></li>
                        <li><a href="blog-full-width.html">Blog - Full Width</a></li>
                        <li><a href="single-post.html">Blog Single Post</a></li>
                    </ul>
                </li>
                <li><a href="contact-page.php">Contact</a></li>
            </ul>

        </div>
    </nav>

</header>

</body>
</html>