<?php
if (isset($_GET['examid'])) {
    include_once 'header.php';
}
else
    {
        header("Location: it-main.php?error=choose-exam");
        exit();
    }
?>
<html lang="en">

<body>

<div class="container-fluid">
  <div class="row content">
    <div class="col-sm-3 sidenav " style="border: inset; background-color: darkblue;min-height: 470px">
        <?php
        include 'dbc.php';
        $exam_id = mysqli_real_escape_string($conn,$_GET['examid']);
        $sql_exam = "Select * from pr_prog_exams where id='$exam_id'";
        $result_exam = mysqli_query($conn,$sql_exam);
        $exam = mysqli_fetch_assoc($result_exam);
        echo '<h4 style="color: white">'.$exam["exam_name"].'</h4>';

        $sql_topics = "Select * from pr_topics where id IN (SELECT topic_id from pr_exam_topics where exam_id='$exam_id')";
        $result_topics = mysqli_query($conn,$sql_topics);
        mysqli_close($conn);
        ?>
        <span style="font-size: 20px;color: white">Sections</span>
        <hr>
      <ul class="nav nav-pills nav-stacked">
          <?php
          while($topics = mysqli_fetch_assoc($result_topics)) {
              $id = $topics['id'];
//              $_SESSION['topicid']=$id;
              echo '
                    <li><a onclick="showHideSubmit()" id="url'.$id.'" href="#'.$id.'">'.$topics['topic_name'].'</a></li>
                    <style>
                    a{
                    color: white;
                    border-radius: 15px
                    }
                   a:hover{
                   color: black;
                   border-radius: 15px;
                   font-weight: bold;
                   }
                   </style>
                   ';
              echo '
              <script type="text/javascript" src="assets/js/jquery.min.js"></script>
              <script type="text/javascript">
               $(document).ready(function () {
                   var topic_id = '.$id.';
                   var loading =$("#loading");
                   $("#url'.$id.'").click(function () {
                   loading.show();
                   setTimeout(function() {
                       $("#questions").load("load-questions.php",{
                           topicid: topic_id
                       });
                       loading.hide();
                       document.getElementById("exam_form").action = "result.php?topicid='.$id.'";
                       document.getElementById("topicname").innerHTML = "'.$topics['topic_name'].'";
                       }, 500);
                   })
                   });
           </script>
              ';
          }
          ?>
      </ul><br>
      
    </div>





  <div class="col-sm-9">
<div style="background-color: darkblue; color: white">
    <h4><small style="color: white">Questions</small></h4>
      <span id="topicname"></span>
</div>
<br>
       <div>
           <form action="" method="post" id="exam_form" onsubmit="target_popup(this)">
               <div class="col-md-9">
                   <span id="loading" style="display:none;font-size: 26px;">Loading...</span>
                   <div id="questions"></div>
               </div>
               <div class="col-md-12" style="height: 45px;background-color: #4e5b6c;visibility: hidden;" id="finish_bar">
                   <label id="confirmation1" style="color: white;position: relative;top: 10px" for="confirmation2">
                       <input style="transform: scale(1.5);" id="confirmation2"  type="checkbox"> Confirm your answers
                   </label>
               <button id="submit" style="border-radius: 10px;float: right;position: relative;top: 1px;" disabled="disabled" class="btn btn-primary" name="submit">Check Result</button>
               </div>

                   <script>
                   var submit = document.getElementById("submit");
                   var confirmation1 =document.getElementById("confirmation1");
                   var confirmation2 =document.getElementById("confirmation2");
                   var questions =document.getElementById("questions");
                   var finish_bar = document.getElementById("finish_bar");
                   function showHideSubmit() {
//                       confirmation1.style.visibility ="";
                       confirmation2.checked = false;
//                       confirmation2.style.visibility ="";
//                       submit.style.visibility = "";
                       submit.disabled = "disabled";
                       finish_bar.style.visibility = "";
                   }

                   function target_popup(form) {
                       window.open('', 'formpopup', 'width=1000,height=600,top=40,left=200,resizeable,scrollbars');
                       form.target = 'formpopup';
                   }

                   $('#confirmation2').click(function() {
                           var form;
                           if(this.checked){
                               form = $("#exam_form");
                               form.find("input[name='answer']").each(function () {
                                   $(this).attr('name', $(this).attr('id'));
                               });
                               $(':input:not(:checked)').prop('disabled', true);
                               if (submit.disabled) {
                                   submit.disabled = "";
                               }

                           }
                           else {
                               form = $("#exam_form");
                               form.find("input[type='radio']").each(function () {
                                   $(this).attr('name',"answer");
                               });
                               $(':input:not(:checked)').prop('disabled', false);
                               if (!submit.disabled) {
                                   submit.disabled = "disabled";
                               }
                           }

                   });

               </script>

          </form>

      </div>

    </div>
  </div>
    <br>
</div>

<?php
include 'footer.html';
?>
</body>

<!-- Mirrored from demo.graygrids.com/themes/bright/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 20 Mar 2018 19:58:16 GMT -->
</html>