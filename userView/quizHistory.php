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
    <img src="./MainPics/h9.png" alt="QuizMaster" style="width: 96%; display: block; margin-left: 28px;">
        <table class="table ">
            <thead>
                <tr>
                    <th class="text-center">S.N.</th>
                    <th class="text-center">Quiz Title</th>
                    <th class="text-center">Question Solved</th>
                    <th class="text-center">Right</th>
                    <th class="text-center">Wrong</th>
                    <th class="text-center">Score</th>
                </tr>
            </thead>
            <?php
            include "./config/mysql_connect.php";
            $username = $_SESSION['username'];
            $sql = "SELECT * FROM history where username='$username' order by date desc";
            $result = mysqli_query($conn, $sql);
            $count = 0;

            while ($row = mysqli_fetch_array($result)) {
                $q_id = $row['q_id'];
                $s = max(0, $row['score']); // Ensure score is not less than zero
                $w = $row['wrong'];
                $r = $row['correct'];
                $qa = $row['level'];

                $q23 = mysqli_query($conn, "SELECT title FROM quiz WHERE  q_id='$q_id' ") or die('Error208');
                while ($row = mysqli_fetch_array($q23)) {
                    $title = $row['title'];
                }
                $count++;
                echo '<tr><td>' . $count . '</td><td>' . $title . '</td><td>' . $qa . '</td><td>' . $r . '</td><td>' . $w . '</td><td>' . $s . '</td></tr>';
            }
            ?>
        </table>
    </div>
</body>

</html>