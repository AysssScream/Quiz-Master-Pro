<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>See Quizzes</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="./CSS/ViewQuiz.css">
</head>

<body>
    <div class="content-container">
    <img src="./MainPics/h8.png" alt="QuizMaster" style="width: 96%; display: block; margin-left: 30px;">
        <table class="table ">
            <thead>
                <tr>
                    <th class="text-center">S.N.</th>
                    <th class="text-center">Quiz Title</th>
                    <th class="text-center">Total Question</th>
                    <th class="text-center">Marks</th>
                    <th class="text-center">Time Limit</th>
                    <th class="text-center">Action</th>
                </tr>
            </thead>
            <?php
            include "./config/mysql_connect.php";
            $username = $_SESSION['username'];
            $sql = "SELECT * FROM quiz ";
            $result = mysqli_query($conn, $sql);
            $c = 1;
            while ($row = mysqli_fetch_array($result)) {
                $qid = $row['q_id'];
                $title = $row['title'];
                $total = $row['total'];
                $correct = $row['correct'];
                $time = $row['time'];

                $q12 = mysqli_query($conn, "SELECT score FROM history WHERE q_id='$qid' AND username='$username'") or die('Error98');
                $rowcount = mysqli_num_rows($q12);
                if ($rowcount == 0) {
                    echo '<tr>
                    <td>' . $c++ . '</td>
                    <td>' . $title . '</td>
                    <td>' . $total . '</td>
                    <td>' . $correct * $total . '</td>
                    <td>' . $time . '&nbsp;min</td>
	                <td>
                    <b><a href="udash.php?view=quizStart&q_id=' . $qid . '&n=1&t=' . $total . '
                    "class="pull-right btn sub1" style="margin:0px;background:#99cc32">
                    <span class="glyphicon glyphicon-new-window" aria-hidden="true"></span>
                    &nbsp;<span class="title1"><b>Start</b></span></a></b>
                    </td>
                    </tr>';
                } else {
                    echo '<tr>
                    <td>' . $c++ . '</td>
                    <td>' . $title . '&nbsp;<span title="This quiz is already solve by you" class="glyphicon glyphicon-ok" aria-hidden="true"></span></td>
                    <td>' . $total . '</td>
                    <td>' . $correct * $total . '</td>
                    <td>' . $time . '&nbsp;min</td>
	                <td>
                    <b><a href="udash.php?view=quizRestart&q_id=' . $qid . '&n=1&t=' . $total . '
                    "class="pull-right btn sub1" style="margin:0px;background:red">
                    <span class="glyphicon glyphicon-repeat" aria-hidden="true"></span>
                    &nbsp;<span class="title1"><b>Restart</b></span></a></b>
                    </td>
                    </tr>';
                }
            } ?>
        </table>
    </div>
</body>

</html>