<?php
if (isset($_POST['submit'])) {
    include_once 'dbc.php';

    $topicId = mysqli_real_escape_string($conn, $_GET['topicid']);
    $topicname = mysqli_fetch_assoc(mysqli_query($conn,"Select * from pr_topics where id='$topicId'"));
    $sql_quests = "Select * from pr_questions where exam_topic_id='$topicId'";
    if ($result_quests = @mysqli_query($conn, $sql_quests))
    {
        $totalScore = 0;
        $questIndex = 1;
        echo '<br>
                <link rel="stylesheet" href="assets/css/main.css">
                <span style="font-size: 26px;font-weight: bold;background-color: lightgrey;color: black;border-radius: 5px">Your Results </span>
                <span style="font-size: 20px;font-weight: bold;">&</span>
                <span style="font-size: 26px;font-weight: bold;background-color: greenyellow;color: black;border-radius: 5px">Answers </span><br>
                <hr style="height: 5px;background-color: black">
                <span style="font-size: 26px;font-weight: bold;color: #1d78cb">'.$topicname['topic_name'].'</span><br><br>
                <div class="questions">
                ';
        while ($questions = mysqli_fetch_assoc($result_quests)) {
            $questId = $questions['id'];
            $sql_answs = "Select * from pr_answers where question_id='$questId'";
            if ($result_answs = @mysqli_query($conn, $sql_answs))
            {
                echo '
            
            <div class="question" style="font-weight: bold;color: black">
            <span style="font-weight: bold">' . $questIndex . ') ' . $questions['question'] . '</span>    
            </div>
            <div class="answers" style="color: black">
            <br>';
            $questIndex++;
            $true = 0;
            $false = 0;
            while ($answers = mysqli_fetch_assoc($result_answs)) {
                $sql_true_answs = "Select * from pr_question_answers where question_id='$questId'";
                if ($result_true_answs = @mysqli_query($conn, $sql_true_answs))
                {
                $count_trues = mysqli_num_rows($result_true_answs);
                if (isset($_POST['answer' . $answers['id']])) {
                    $user_answer_id = $answers['id'];
                    $true_answ_array = array();
                    while ($true_answers = mysqli_fetch_assoc($result_true_answs)) {
                        $answer_id = $true_answers['answer_id'];
                        $true_answ_array[] = $answer_id;
                    }
                    if (in_array($user_answer_id, $true_answ_array)) {
                        echo '<span style="background-color: lightgrey">' . "\xe2\x9d\xaf " . $answers['answer'] . " \xe2\x9c\x85" . '</span><br>';
                        if ($false < 1) {
                            $true++;
                        }
                    } else {
                        echo '<span style="background-color: lightgrey">' . "\xe2\x9d\xaf " . $answers['answer'] . " \xe2\x9d\x8c" . '</span><br>';
                        if ($true > 1) {
                            $false++;
                        }

                    }

                } else {
                    $true_answ_array = array();
                    while ($true_answers = mysqli_fetch_assoc($result_true_answs)) {
                        $answer_id = $true_answers['answer_id'];
                        $true_answ_array[] = $answer_id;
                    }

                    if (in_array($answers['id'], $true_answ_array)) {
                        echo '<span>' . "\xe2\x9d\xaf " . $answers['answer'] . " \xe2\x9c\x85" . '</span><br>';
                    } else {
                        echo '<span>' . "\xe2\x9d\xaf " . $answers['answer'] . '</span><br>';
                    }
                }
            }
                else
                {
                    echo '<span style="font-size: 26px;color: red">Couldn\'t load true answers!Try again!</span>';
                    exit();
                }

            }
            echo '</div>';
            $true = $true / $count_trues - $false / $count_trues;
            //        echo 'Score: '.round($true,1).'<br>';
            echo '<br>';
            $totalScore += round($true, 1);
        }
            else
            {
                echo '<span style="font-size: 26px;color: red">Couldn\'t load answers!Try again!</span>';
                exit();
            }
        }
        echo '</div>';
        mysqli_close($conn);
}
    else
    {
        echo '<span style="font-size: 26px;color: red">Couldn\'t load questions!Try again!</span>';
        exit();
    }
    $totalScore = $totalScore*100/mysqli_num_rows($result_quests);

    echo '
            <div style="background-color: #4e5b6c;height: 50px;border-radius: 5px">
            <span style="position: relative;top: 10px;font-size:20px;background-color: #cb171e;color: white;border-radius: 5px">Total Score: '.$totalScore.'% out of 100%</span>
            <input style="position: relative;top: 5px;left: 500px;border-radius: 5px" class="btn btn-common" type="submit" id="submit" value="Save Result" name="submit">
            </div>
            ';
}