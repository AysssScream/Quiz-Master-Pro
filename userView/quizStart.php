<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz Start</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="./CSS/QuizStart.css">
</head>

<body>
        <div class="content-container">
        <img src="MainPics/t14.png" alt="QuizMaster Pro Logo" style="max-height: 250px; margin-top: 0;">

        <?php
        include_once "./config/mysql_connect.php";
        $q_id = @$_GET['q_id'];
        $sn = @$_GET['n'];
        $total = @$_GET['t'];

        $q = mysqli_query($conn, "SELECT * FROM questions WHERE q_id='$q_id' AND sn='$sn' ");
        while ($row = mysqli_fetch_array($q)) {
            $qns = $row['qns'];
            $qnid = $row['qnid'];
            echo '<div class="question-container"><b>Question &nbsp;' . $sn . '&nbsp;: ' . $qns . '</b><br /><br /></div>';
        }
        $q = mysqli_query($conn, "SELECT * FROM options WHERE qnid='$qnid' ");
        echo '<form action="udash.php?view=checkQuiz&q_id=' . $q_id . '&n=' . $sn . '&t=' . $total . '&qnid=' . $qnid . '" method="POST">';
        while ($row = mysqli_fetch_array($q)) {
            $option = $row['option'];
            $optionid = $row['optionid'];
            echo '<label class="option-container">';
            echo '<input type="radio" name="ans" value="' . $optionid . '" id="option-' . $optionid . '">';
            echo '<span class="custom-radio"></span>'; // This is the stylized part of the radio button
            echo '<span class="option-text">' . $option . '</span>'; // Text of the option
            echo '</label><br />';
        }
        echo '<br/><button type="submit" class="btn btn-primary"><i class="fas fa-lock"></i>&nbsp;Submit</button></form></div>';
        ?>
    </div>    

</body>

</html>
