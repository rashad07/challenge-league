<?php

session_start();

?>
<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from demo.graygrids.com/themes/app/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 20 Mar 2018 19:58:16 GMT -->
<head>

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

</head>


<body>

<header id="header-wrap">

    <div id="roof" class="hidden-xs">
        <div class="container">

            <div class="pull-left">
            </div>


            <div class="quick-contacts pull-right">
                <span><i class="fa fa-phone"></i> +994 50 200 00 00</span>
                <span><i class="fa fa-envelope"></i><a href="#"><span class="__cf_email__" data-cfemail="e189848d8d8ea1839388868995948f8897849392889598cf848594">[email&#160;protected]</span></a></span>
                <?php
                    if (isset($_SESSION['u_id']))
                    {
                        echo '<span><a href="signout.php?logout"><i class="fa fa-sign-out"> Logout</i></a> <a href="profile.php?click_profile"><i class="fa fa-user"> ' .$_SESSION['u_fname'].'</i></a></span>';
                    }
                    else
                        {
                            echo '<span><a href="login_page.php"><i class="fa fa-user"></i> Login</a> / <a href="login_page.php">Register</a></span>';
                        }
                    ?>
            </div>

        </div>
    </div>


    <nav class="navbar navbar-default main-navigation" role="navigation" data-spy="affix" data-offset-top="50">
        <div class="container">

            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index-2.php"><img src="assets/img/logo.png" alt=""></a>
            </div>


            <div class="header-search pull-right">
                <a class="open-search">
                    <i class="fa fa-search"></i>
                </a>
            </div>






            <div class="collapse navbar-collapse" id="navbar">
                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown dropdown-toggle">
                        <a class="active" href="index-2.php">Home</a>
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
                            <li><a href="Language-main.php">Language</a></li>

                        </ul>
                    </li>








                    <li class="dropdown dropdown-toggle">
                        <a class="active" href="#" data-toggle="dropdown">Info <i class="fa fa-angle-down"></i></a>
                        <ul class="dropdown-menu">
                            <li><a class="active" href="about.html">About Page</a></li>
                            <li><a href="about-our-team.php"> About Our Team</a></li>


                        </ul>
                    </li>



                    </li>
                    <li><a href="contact.php">Contact</a></li>
                </ul>
            </div>

            <form class="full-search">
                <div class="container">
                    <div class="row">
                        <input class="form-control" type="text" placeholder="Search">
                        <a class="close-search">
<span class="fa fa-times">
</span>
                        </a>
                    </div>
                </div>
            </form>
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
                        <li><a href="about.html">About Page</a></li>
                        <li><a href="gallery.html">Image Gallery</a></li>
                        <li><a href="faq.html">FAQ</a></li>
                        <li><a href="login_page.php">Login Page</a></li>
                        <li><a href="single-teacher.html">Single Teacher</a></li>
                        <li><a href="registration.html">Registration Form</a></li>
                        <li><a href="contact.php">Contacts</a></li>
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
                <li><a href="contact.php">Contact</a></li>
            </ul>

        </div>
    </nav>

</header>

</body>
</html>