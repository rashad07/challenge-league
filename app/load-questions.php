<?php
include_once 'dbc.php';
$topic_id = mysqli_real_escape_string($conn,$_POST['topicid']);

$sql_questions = "Select * from pr_questions where exam_topic_id='$topic_id'";
if ($result_questions = @mysqli_query($conn,$sql_questions))
{
$quest_order=0;
$answ_order=0;
echo '<center><div class="pagination"></div></center>';
while($questions = mysqli_fetch_assoc($result_questions))
{
    $quest_order++;
    $quest_id = $questions['id'];
    $sql_answers = "Select * from pr_answers where question_id = '$quest_id'";
    $result_answers = @mysqli_query($conn,$sql_answers);
    echo '<div class="question">
            <label name="question'.$questions['id'].'" id="question'.$questions['id'].'" style="font-size: 16px;color: black">'.$quest_order.')'.$questions["question"].'</label><br>';

    while ($answers = mysqli_fetch_assoc($result_answers))
    {
        $answ_id = $answers['id'];
        $sql_true_answ = "Select * from pr_question_answers where question_id='$quest_id'";
        $result_true_answ = @mysqli_query($conn,$sql_true_answ);
        if (mysqli_num_rows($result_true_answ)>1)
        {
            echo '
            <div>
            <label for="answer'.$answ_id.'" style="font-size: 14px;">
            <input style="cursor: pointer;margin-bottom: 12px;" type="checkbox" name="answer'.$answ_id.'" id="answer'.$answ_id.'">
            '.$answers['answer'].'</label><br>
            </div>
            ';
        }
        else
            {
                echo '
                <div>
                <label for="answer'.$answ_id.'" style="font-size: 14px;">
                <input style="cursor: pointer; margin-bottom: 12px;" type="radio" name="answer" id="answer'.$answ_id.'">
                '.$answers['answer'].'
                </label><br>
                </div>
                ';
            }
    }
    echo '</div>';
}
}
else
{
    echo '<span style="font-size: 26px;">Couldn\'t make connection to the database!</span>';
}
mysqli_close($conn);
?>
        <center><div class="pagination"></div></center>

<script src="assets/js/jquery/jquery.js"></script>
<script src="assets/js/paginate.js"></script>
<script src="assets/js/custom.js"></script>


        <style>
            .pagination li {
                list-style: none;
                color: black;
                float: left;
                padding: 8px 16px;
                text-decoration: none;
                background-color: dodgerblue;
                cursor: pointer;
                position: relative;
                left: 1px;
                border: 1px solid black;
            }

            .pagination li:hover
            {
                background-color: white;
            }

        </style>