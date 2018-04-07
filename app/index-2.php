<?php
include 'dbc.php';
include 'header.php';
if(isset($_SESSION['login_success']))
{
    echo '<div class="breadcrumb-wrapper" style="background-color: chartreuse" >';
    echo '<h3 class="page-title"><i style="color: white">You Have Successfully Logged In</i></h3> ';
    echo '</div>';
    unset($_SESSION['login_success']);

}
?>

<html lang="en">


<body>

<div id="carousel-area">
<div id="carousel-slider" class="carousel slide" data-interval="3000">

<ol class="carousel-indicators">
<li data-target="#carousel-slider" data-slide-to="0" class="active">
</li>
<li data-target="#carousel-slider" data-slide-to="1">
</li>
<li data-target="#carousel-slider" data-slide-to="2">
</li>
</ol>
<div class="carousel-inner">
<div class="item active" style="background-image: url(assets/img/slider/bg-1.jpg);">
<div class="carousel-caption">
<p>Bright - Bootstrap HTML5 Education Template</p>
<h1>Excellent and Friendly<br> Faculty Members</h1>
<a class="btn btn-lg btn-common" href="single-teacher.html">
<i class="fa fa-arrow-circle-right">
</i>
Learn More
</a>
</div>
</div>
<div class="item" style="background-image: url(assets/img/slider/bg-2.jpg);">
<div class="carousel-caption">
<p>Ready to Launch - School, College, University or Course Website</p>
<h1>Innovation paradise<br> for Students</h1>
<a class="btn btn-lg btn-common" href="contact.php">
<i class="fa fa-check">
</i>
Read More
</a>
<a class="btn btn-lg btn-border" href="courses-grid.html">
<i class="fa fa-envelope-open">
</i>
Contact Us
</a>
</div>
</div>
<div class="item" style="background-image: url(assets/img/slider/bg-3.jpg);">
<div class="carousel-caption">
<p>50+ Built-in Pages to Create any Kind of Education Site</p>
<h1>Your ideas will be <br>heard & supported</h1>
<a class="btn btn-lg btn-border" href="event-grid.html">
<i class="fa fa-calendar">
</i>
Upcoming Events
</a>
</div>
</div>
</div>
<a class="left carousel-control" href="#carousel-slider" role="button" data-slide="prev">
</a>
<a class="right carousel-control" href="#carousel-slider" role="button" data-slide="next">
</a>
</div>
</div>






<section class="courses section">

	<div class="container">
		<div class="row">

			<h2 class="section-title">Newest</h2>


				<div class="col-md-4 col-sm-6 col-xs-12">
					<div class="courses-wrap">
						<div class="thumb">
							<img src="assets/img/courses/img-1.jpg" alt="">
								<div class="courses-price">
									<p class="years">C++</p>

								</div>
						</div>
							<div class="course-detail-wrap">

								<div class="teacher-wrap">

									
								</div>
									<div class="course-content">
										<h3><a href="#">C++ programing language</a></h3>
										<p>Reade more about C++</p>
										<a href="#" class="btn btn-common btn-sm">Reade More</a>
									</div>
							</div>
		</div>		
	</div>


<div class="col-md-4 col-sm-6 col-xs-12">
<div class="courses-wrap">
<div class="thumb">
<img src="assets/img/courses/img-2.jpg" alt="">
<div class="courses-price">
<p class="years">DataBase</p>

 </div>
</div>
<div class="course-detail-wrap">
<div class="teacher-wrap">


</div>
<div class="course-content">
<h3><a href="#">DataBase</a></h3>
<p>Reade more about DataBase</p>
<a href="#" class="btn btn-common btn-sm">Read More</a>
</div>
</div>
</div>
</div>

<div class="col-md-4 col-sm-6 col-xs-12">
<div class="courses-wrap">
<div class="thumb">
<img src="assets/img/courses/img-3.jpg" alt="">
<div class="courses-price">
<p class="years">Melumat yaz</p>

</div>
</div>
<div class="course-detail-wrap">
<div class="teacher-wrap">

</div>
<div class="course-content">
<h3><a href="#">Kateqoriya yaz</a></h3>
<p>Reade more about</p>
<a href="#" class="btn btn-common btn-sm">Read More</a>
</div>
</div>
</div>
</div>
<div class="col-md-4 col-sm-6 col-xs-12">
<div class="courses-wrap">
<div class="thumb">
<img src="assets/img/courses/img-4.jpg" alt="">
<div class="courses-price">
<p class="years">Melumat yaz</p>

</div>
</div>
<div class="course-detail-wrap">
<div class="teacher-wrap">

</div>
<div class="course-content">
<h3><a href="#">Kateqoriya yaz</a></h3>
<p>Reade more about</p>
<a href="#" class="btn btn-common btn-sm">Read More</a>
</div>
</div>
</div>
</div>
<div class="col-md-4 col-sm-6 col-xs-12">
<div class="courses-wrap">
<div class="thumb">
<img src="assets/img/courses/img-5.jpg" alt="">
 <div class="courses-price">
<p class="years">Melumat yaz</p>

</div>
</div>
<div class="course-detail-wrap">
<div class="teacher-wrap">

</div>
<div class="course-content">
<h3><a href="#">Diving into Big Data</a></h3>
<p>Reade more about</p>
<a href="#" class="btn btn-common btn-sm">Read More</a>
</div>
</div>
</div>
</div>
<div class="col-md-4 col-sm-6 col-xs-12">
<div class="courses-wrap">
<div class="thumb">
<img src="assets/img/courses/img-6.jpg" alt="">
<div class="courses-price">
<p class="years">Melumat yaz</p>

</div>
</div>
<div class="course-detail-wrap">
<div class="teacher-wrap">

</div>
<div class="course-content">
<h3><a href="#"> Java</a></h3>
<p>Reade more about</p>
<a href="#" class="btn btn-common btn-sm">Read More</a>
</div>
</div>
</div>
</div>
</div>
<a href="courses-list.html">More Courses <i class="fa fa-arrow-right" aria-hidden="true"></i></a>
</div>
</section>
</body>
</html>
<?php
include 'footer.html';
?>

