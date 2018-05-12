<?php
if (isset($_GET['fieldid'])) {
    include 'header.php';
}
else
    {
        header("Location: it-main.php?error=choose-exam");
    }
?>
<html lang="en">

<body>

<div class="container-fluid bg-3 text-center">
    <?php
    include 'dbc.php';
    $fiel_id = mysqli_real_escape_string($conn,$_GET['fieldid']);

    $sql_fields = "Select * from pr_fields where id='$fiel_id'";
    if($result_fields = @mysqli_query($conn,$sql_fields)) {
    $field = mysqli_fetch_assoc($result_fields);

    $fieldname = $field["name"];

    echo '<h3>Exams of ' . $fieldname . ' </h3><br>';

    $sql_main_exams = "Select * from pr_exams where field_id ='$fiel_id'";
    if($result_main_exams = @mysqli_query($conn, $sql_main_exams))
    {
    ?>
    <div class="row">

        <!--    <div class="col-sm-3" style="border: inset" >-->
        <!--      <p>Some text..</p>-->
        <!--      <img src="https://placehold.it/150x80?text=IMAGE" class="img-responsive" style="width:100%" alt="Image">-->
        <!--      <h4>Oracles</h4>-->
        <!--        <hr>-->
        <!--      <li class="dropdown dropdown-toggle">-->
        <!--      <ul class="nav nav-pills nav-stacked dropdown-menu" >-->
        <!--        <li><a href="#section1">Oracle and Structured Query Language (SQL)</a></li>-->
        <!--        <li><a href="#section2">Using DDL Statements to Create and Manage Tables</a></li>-->
        <!--        <li><a href="#section3">Manipulating Data</a></li>-->
        <!--        <li><a href="#section3">Restricting and Sorting Data</a></li>-->
        <!--        <li><a href="#section1">Oracle and Structured Query Language (SQL)</a></li> -->
        <!--        <li><a href="#section2">Using DDL Statements to Create and Manage Tables</a></li>-->
        <!--        <li><a href="#section3">Manipulating Data</a></li>-->
        <!--        <li><a href="#section3">Restricting and Sorting Data</a></li>-->
        <!--        <li><a href="#section1">Oracle and Structured Query Language (SQL)</a></li>-->
        <!--        <li><a href="#section2">Using DDL Statements to Create and Manage Tables</a></li>-->
        <!--        <li><a href="#section3">Manipulating Data</a></li>-->
        <!--        <li><a href="#section3">Restricting and Sorting Data</a></li>-->
        <!--        <li><a href="#section1">Oracle and Structured Query Language (SQL)</a></li>-->
        <!--        <li><a href="#section2">Using DDL Statements to Create and Manage Tables</a></li>-->
        <!--        <li><a href="#section3">Manipulating Data</a></li>-->
        <!--        <li><a href="#section3">Restricting and Sorting Data</a></li>-->
        <!--        <li><a href="#section1">Oracle and Structured Query Language (SQL)</a></li>-->
        <!--        <li><a href="#section2">Using DDL Statements to Create and Manage Tables</a></li>-->
        <!--        <li><a href="#section3">Manipulating Data</a></li>-->
        <!--        <li><a href="#section3">Restricting and Sorting Data</a></li>-->
        <!---->
        <!--      </ul>-->
        <!--      </li>-->
        <!--    </div>-->

        <?php
        while ($main_exams = mysqli_fetch_assoc($result_main_exams)) {
            $main_exam_id = $main_exams['id'];
            $sql_exams = "Select * from pr_prog_exams where main_exam_id = '$main_exam_id'";
            if($result_exams = @mysqli_query($conn, $sql_exams)) {
                echo '
    <div class="col-sm-3" style="border: inset"> 
      <img src="https://placehold.it/150x80?text=IMAGE" class="img-responsive" style="width:100%;border-radius: 10px" alt="Image">
      <h4>' . $main_exams["exam_name"] . '</h4>
      <hr>
      <ul class="nav nav-pills nav-stacked">
      ';
                while ($exams = mysqli_fetch_assoc($result_exams)) {
                    echo '
        <li><a href="exam.php?examid=' . $exams['id'] . '">' . $exams['exam_name'] . '</a></li>
      ';
                }
                echo '
      </ul>
    </div>
    ';
            }
            else
                {
                    echo '<span style="font-size: 26px;">Couldn\'t make connection to the database!</span>';
            }
        }
        mysqli_close($conn);
        }
        else
        {
            echo '<span style="font-size: 26px;">Couldn\'t make connection to the database!</span>';
        }
        }
        else
        {
            echo '<span style="font-size: 26px;">Couldn\'t make connection to the database!</span>';
        }

?>
  </div>
</div>
<br><br>

<!---->
<!--<div class="dropdown">-->
<!--  <button onclick="myFunction()" class="dropbtn">Dropdown</button>-->
<!--  <div id="myDropdown" class="dropdown-content">-->
<!--    <a href="#">Link 1</a>-->
<!--    <a href="#">Link 2</a>-->
<!--    <a href="#">Link 3</a>-->
<!--  </div>-->
<!--</div>-->

<?php
include 'footer.html';
?>
</body>

</html>