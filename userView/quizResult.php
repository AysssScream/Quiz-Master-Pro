<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Results</title>
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <link rel="stylesheet" href="./CSS/result.css">

</head>

<body>
    <div class="content-container">
        <div class="header">
            <h1><i class="fa fa-trophy"></i> Quiz Result</h1>
        </div>

        <div class="main-container">
            <div class="result-container">
                <img src="MainPics/g8.png" alt="QuizMaster" style="display: block; margin-left: auto; margin-right: auto; width: 70%;">
                <h1><i class="fa fa-chart-bar"></i> Result</h1>
                <?php
                include "./config/mysql_connect.php";
                $username = $_SESSION['username'];
                $q_id = @$_GET['q_id'];
                $q = mysqli_query($conn, "SELECT * FROM history WHERE q_id='$q_id' AND username='$username' ") or die('Error157');

                while ($row = mysqli_fetch_array($q)) {
                    $s = $row['score'];
                    $w = $row['wrong'];
                    $r = $row['correct'];
                    $qa = $row['level'];

                    $s = max(0, $s);
                ?>
                    <div class="result-item">Total Questions<span class="result-value"><?= $qa ?></span></div>

                    <div class="result-item"><span class="green-text"><i class="fa fa-check-circle"></i>Right Answer</span><span class="result-value"><?= $r ?></span></div>
                    <div class="result-item"><span class="red-text"><i class="fa fa-times-circle"></i>Wrong Answer</span><span class="result-value red-text"><?= $w ?></span></div>
                    <div class="result-item"><span class="blue-text"><i class="fa fa-star"></i>Score (Correct - Wrong)</span><span class="result-value blue-text"><?= $s ?></span></div>
                <?php
                }
                ?>
            </div>
        </div>

        <div class="footer">
            <p>&copy; 2023 QuizMaster Pro. All rights reserved.</p>
        </div>
    </div>
</body>

</html>