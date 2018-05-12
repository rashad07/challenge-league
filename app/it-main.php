<?php
include 'header.php';
?>
<html lang="en">

<body>


<div class="page-header" style="background: url(assets/img/banner1.jpg);">
<div class="container">
<div class="row">
<div class="col-md-12">
<div class="breadcrumb-wrapper">
<h2 class="page-title">Information Tecnology / IT</h2>
</div>
</div>
</div>
</div>
</div>


<section class="courses section">
	<div class="container">
	<div class="row">

<?php
include 'dbc.php';
$sql = "Select * from pr_fields";
if($result = @mysqli_query($conn,$sql)) {
    mysqli_close($conn);
    while ($field = mysqli_fetch_assoc($result)) {
        echo '
    <div class="col-md-4 col-sm-6 col-xs-12">
    <div class="courses-wrap" style="border-radius: 10px">
    <div class="thumb" style="border-radius: 5px">
    <img src="assets/img/IT/img-' . $field["name"] . '.jpg" alt="">
    <div class="courses-price">
    <p class="years">' . $field["name"] . '</p>
    </div>
    </div>
    <div class="course-detail-wrap">
    <div class="teacher-wrap">
    </div>
    <div class="course-content">
    <h3>' . strtoupper($field["name"]) . '</h3>
    <a style="border-radius: 5px" href="pre-exam.php?fieldid=' . $field["id"] . '" class="btn btn-common btn-sm">Open</a>
    </div>
    </div>
    </div>
    </div>
    ';
    }
}
else
{
    echo '<span style="font-size: 26px;">Couldn\'t make connection to the database!</span>';
}
?>



</div>
</div>
</section>


<?php
include 'footer.html';
?>
</body>

<!-- Mirrored from demo.graygrids.com/themes/bright/courses-grid.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 20 Mar 2018 19:58:17 GMT -->
</html>